<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licensed only to registered users of the Cappasity platform.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 * @author    Cappasity Inc <info@cappasity.com>
 * @copyright 2019 Cappasity Inc.
 */

namespace CappasitySDK\Transport;

use CappasitySDK;
use GuzzleHttp;
use Psr\Http\Message\ResponseInterface;

class Guzzle6 implements CappasitySDK\TransportInterface
{
    /**
     * @var GuzzleHttp\ClientInterface
     */
    private $httpClient;

    /**
     * @var array
     */
    private $config;

    /**
     * @var array
     */
    private static $defaultConfig = [
        'timeout' => 5,
    ];

    public function __construct(GuzzleHttp\ClientInterface $httpClient, array $config = [])
    {
        $this->httpClient = $httpClient;
        $this->config = array_replace_recursive(self::$defaultConfig, $config);
    }

    /**
     * @return self
     */
    public static function createDefault()
    {
        return new self(static::createDefaultHttpClient());
    }

    /**
     * @param array $config
     *
     * @return self
     */
    public static function createWithConfig(array $config)
    {
        return new self(static::createDefaultHttpClient(), $config);
    }

    /**
     * @param ResponseInterface $response
     * @return Exception\RequestException
     */
    public static function createExceptionFromErrorResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() < 400) {
            $className = static::class;
            throw new \LogicException("Attempted to create instance of {$className} from a non error response");
        }

        $e = new Exception\RequestException(static::makeErrorMessage($response), $response->getStatusCode());
        $e->setResponse($response);

        return $e;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return array
     *
     * @throws Exception\UnexpectedResponseFormatException
     */
    private static function parseResponseBody(ResponseInterface $response)
    {
        try {
            return GuzzleHttp\json_decode($response->getBody(), true);
        } catch (\InvalidArgumentException $e) {
            throw new Exception\UnexpectedResponseFormatException(
                $e->getMessage(),
                $e->getCode(),
                $e->getPrevious()
            );
        }
    }

    /**
     * TODO move parsing logic to a helper or inject
     *
     * Possible formats are:
     * I.
     * {
     *   "statusCode": 404,
     *   "error": "Not Found",
     *   "message": "job data missing",
     *   "name": "HttpStatusError"
     * }
     *
     * II.
     * {
     *   "meta": {
     *     "id": "d715ee2b-aea5-4f78-94ee-c7ec3bfaad40"
     *   },
     *   "errors": [
     *     {
     *       "status": "HttpStatusError",
     *       "code": 404,
     *       "title": "could not find associated data",
     *       "detail": {}
     *     }
     *   ]
     * }
     *
     * @param ResponseInterface $response
     * @return string
     *
     * @throws Exception\UnexpectedResponseFormatException
     */
    private static function makeErrorMessage(ResponseInterface $response)
    {
        try {
            $parsedResponse = static::parseResponseBody($response);
        } catch (\InvalidArgumentException $e) {
            throw new Exception\UnexpectedResponseFormatException(
                $e->getMessage(),
                $e->getCode(),
                $e->getPrevious()
            );
        }

        $hasValidProcessErrorStructure = array_key_exists('statusCode', $parsedResponse)
            && array_key_exists('error', $parsedResponse)
            && array_key_exists('message', $parsedResponse)
            && array_key_exists('name', $parsedResponse);

        if ($hasValidProcessErrorStructure) {
            $message = $parsedResponse['message'];
            $error = $parsedResponse['error'];
            $statusCode = $parsedResponse['statusCode'];

            return "Server responded with an error [{$statusCode}: {$error}]: {$message}";
        }

        $hasValidFilesErrorStructure = !$hasValidProcessErrorStructure
            && array_key_exists('errors', $parsedResponse)
            && is_array($parsedResponse['errors'])
            && array_reduce($parsedResponse['errors'], function ($isValid, array $errorItem) {
                $isValid = $isValid
                    && array_key_exists('title', $errorItem)
                    && array_key_exists('detail', $errorItem);

                return $isValid;
            }, true);

        if (!$hasValidFilesErrorStructure) {
            $message = json_encode($parsedResponse);
            throw new Exception\UnexpectedResponseFormatException(
                "Unknown error response structure received: ${message}"
            );
        }

        $errorTitlesAndDetails = array_map(
            function (array $error) {
                $details = $error['detail'] ? json_encode($error['detail']) : 'none';
                return "{$error['title']} (detail: {$details})";
            },
            $parsedResponse['errors']
        );
        $message = join('; ', $errorTitlesAndDetails);

        return "Server responded with an error [{$response->getStatusCode()}]: {$message}";
    }


    /**
     * @return GuzzleHttp\Client
     */
    private static function createDefaultHttpClient()
    {
        return new GuzzleHttp\Client();
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     *
     * @return ResponseContainer
     *
     * @throws Exception\RequestException
     */
    public function makeRequest($method, $url, array $options = [])
    {
        $request = $this->createRequest($method, $url, $options);

        try {
            $response = $this->httpClient->send($request, $this->resolveRequestOptions($options));
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
            throw $this->getWrappedException($e);
        }

        if ($response->getStatusCode() >= 400) {
            throw static::createExceptionFromErrorResponse($response);
        }

        return $this->transformResponse($response);
    }

    /**
     * @param $method
     * @param $url
     * @param array $options
     * @return GuzzleHttp\Psr7\Request
     */
    private function createRequest($method, $url, array $options = [])
    {
        $query = isset($options['query']) ? http_build_query($options['query']) : '';
        $url = $query === '' ? $url : "{$url}?{$query}";
        $headers = isset($options['headers']) ? $options['headers'] : [];
        $body = isset($options['data']) ? GuzzleHttp\json_encode($options['data']) : '';

        return new GuzzleHttp\Psr7\Request(
            $method,
            $url,
            $headers,
            $body
        );
    }

    /**
     * @param array $options
     *
     * @return array
     */
    private function resolveRequestOptions(array $options)
    {
        $resolvedOptions = [];
        if (array_key_exists('timeout', $options)) {
            $resolvedOptions['timeout'] = $options['timeout'];
        }

        return $resolvedOptions;
    }

    /**
     * @param GuzzleHttp\Exception\GuzzleException $original
     * @return Exception\RequestException
     */
    private function getWrappedException(GuzzleHttp\Exception\GuzzleException $original)
    {
        $e = new Exception\RequestException($original->getMessage(), $original->getCode(), $original->getPrevious());

        if ($original instanceof GuzzleHttp\Exception\RequestException) {
            $e
                ->setRequest($original->getRequest())
                ->setResponse($original->getResponse());
        }

        return $e;
    }

    /**
     * @param ResponseInterface $response
     * @return ResponseContainer
     */
    private function transformResponse(ResponseInterface $response)
    {
        return new ResponseContainer(
            $response->getStatusCode(),
            $response->getHeaders(),
            static::parseResponseBody($response),
            $response
        );
    }
}
