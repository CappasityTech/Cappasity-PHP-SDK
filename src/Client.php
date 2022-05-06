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

namespace CappasitySDK;

use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;
use CappasitySDK\Client\Validator\Type\Request as RequestType;
use CappasitySDK\Client\Exception\AuthorizationAssertionException;

/**
 * Client provides wrappers for all necessary Cappasity API methods
 */
class Client implements ClientInterface
{
    /**
     * @var string
     */
    private $apiToken;

    /**
     * @var TransportInterface
     */
    private $transport;

    /**
     * @var ValidatorWrapper
     */
    private $validator;

    /**
     * @var ResponseAdapter
     */
    private $responseAdapter;

    /**
     * @var array
     */
    private $config;

    const ENDPOINT_PROCESS_JOBS_REGISTER_SYNC_POST = '/api/cp/jobs/register/sync';
    const ENDPOINT_PROCESS_JOBS_PULL_LIST_GET = '/api/cp/jobs/pull/list';
    const ENDPOINT_PROCESS_JOBS_PULL_RESULT_GET = '/api/cp/jobs/pull/result';
    const ENDPOINT_PROCESS_JOBS_PULL_ACK_POST = '/api/cp/jobs/pull/ack';
    const ENDPOINT_USERS_ME_GET = '/api/users/me';
    const ENDPOINT_FILES_INFO_GET = '/api/files/info/%s/%s';
    const ENDPOINT_FILES_LIST_GET = '/api/files';
    const ENDPOINT_PAYMENTS_PLANS_PLAN_GET = '/api/payments/plans/%s';

    const BASE_URL_API_CAPPASITY = 'https://api.cappasity.com';

    /**
     * @var array
     */
    public static $defaultConfig = [
        'baseUrl' => self::BASE_URL_API_CAPPASITY,
        'timeout' => [
            self::ENDPOINT_PROCESS_JOBS_REGISTER_SYNC_POST => 5,
            self::ENDPOINT_PROCESS_JOBS_PULL_LIST_GET => 5,
            self::ENDPOINT_PROCESS_JOBS_PULL_RESULT_GET => 5,
            self::ENDPOINT_PROCESS_JOBS_PULL_ACK_POST => 5,
            self::ENDPOINT_USERS_ME_GET => 5,
            self::ENDPOINT_FILES_INFO_GET => 5,
            self::ENDPOINT_PAYMENTS_PLANS_PLAN_GET => 5,
            self::ENDPOINT_FILES_LIST_GET => 7,
        ],
    ];

    /**
     * @var array
     */
    private static $allowedEndpoints = [
        self::ENDPOINT_PROCESS_JOBS_REGISTER_SYNC_POST,
        self::ENDPOINT_PROCESS_JOBS_PULL_LIST_GET,
        self::ENDPOINT_PROCESS_JOBS_PULL_RESULT_GET,
        self::ENDPOINT_PROCESS_JOBS_PULL_ACK_POST,
        self::ENDPOINT_USERS_ME_GET,
        self::ENDPOINT_PAYMENTS_PLANS_PLAN_GET,
        self::ENDPOINT_FILES_INFO_GET,
        self::ENDPOINT_FILES_LIST_GET,
    ];

    /**
     * @var array
     */
    private static $allowedBaseUrls = [
        self::BASE_URL_API_CAPPASITY,
    ];

    /**
     * @param TransportInterface $transport
     * @param $apiToken
     * @param ValidatorWrapper $validator
     * @param ResponseAdapter $responseAdapter
     * @param array $config
     */
    public function __construct(
        TransportInterface $transport,
        $apiToken,
        ValidatorWrapper $validator,
        ResponseAdapter $responseAdapter,
        array $config = []
    ) {
        $this->transport = $transport;
        $this->apiToken = $apiToken;
        $this->validator = $validator;
        $this->responseAdapter = $responseAdapter;
        $this->config = array_replace_recursive(self::$defaultConfig, $config);

        $this->validateConfig();
    }

    /**
     * @param Request\Process\JobsRegisterSyncPost $params
     *
     * @return Response\Container
     */
    public function registerSyncJob(Request\Process\JobsRegisterSyncPost $params): Response\Container
    {
        $this->assertAPITokenIsSet();
        $this->assertParams($params, RequestType\Process\JobsRegisterSyncPost::class);

        $requestData = [
            'data' => array_map(function (Request\Process\JobsRegisterSyncPost\SyncItem $item) {
                return $item->serialize();
            }, $params->getItems()),
            'meta' => [
                'type' => $params->getSyncType(),
            ]
        ];

        if ($params->getCallbackUrl()) {
            $requestData['meta']['callback'] = $params->getCallbackUrl();
        }

        $response = $this->makeRequest(
            'POST',
            static::ENDPOINT_PROCESS_JOBS_REGISTER_SYNC_POST,
            [],
            [
                'data' => $requestData,
            ]
        );

        return $this->getResponseAdapter()->transform($response, Response\Process\JobsRegisterSyncPost::class);
    }

    /**
     * @param Request\Process\JobsPullListGet $params
     *
     * @return Response\Container
     */
    public function getPullJobList(Request\Process\JobsPullListGet $params): Response\Container
    {
        $this->assertAPITokenIsSet();
        $this->assertParams($params, RequestType\Process\JobsPullListGet::class);

        $query = [];

        if ($params->getLimit()) {
            $query['limit'] = $params->getLimit();
        }

        if ($params->getCursor()) {
            $query['cursor'] = $params->getCursor();
        }

        $response = $this->makeRequest(
            'GET',
            static::ENDPOINT_PROCESS_JOBS_PULL_LIST_GET,
            [],
            [
                'query' => $query
            ]
        );

        return $this->getResponseAdapter()->transform($response, Response\Process\JobsPullListGet::class);
    }

    /**
     * @param Request\Process\JobsPullAckPost $params
     *
     * @return Response\Container
     */
    public function ackPullJobList(Request\Process\JobsPullAckPost $params): Response\Container
    {
        $this->assertAPITokenIsSet();
        $this->assertParams($params, RequestType\Process\JobsPullAckPost::class);

        $response = $this->makeRequest(
            'POST',
            static::ENDPOINT_PROCESS_JOBS_PULL_ACK_POST,
            [],
            [
                'data' => [
                    'data' => array_map(
                        function ($jobId) {
                            return ['id' => $jobId, 'type' => 'sync'];
                        },
                        $params->getJobIds()
                    ),
                ],
            ]
        );

        return $this->getResponseAdapter()->transform($response, Response\Process\JobsPullAckPost::class);
    }

    /**
     * @param Request\Process\JobsPullResultGet $params
     *
     * @return Response\Container
     */
    public function getPullJobResult(Request\Process\JobsPullResultGet $params): Response\Container
    {
        $this->assertAPITokenIsSet();
        $this->assertParams($params, RequestType\Process\JobsPullResultGet::class);

        $response = $this->makeRequest(
            'GET',
            static::ENDPOINT_PROCESS_JOBS_PULL_RESULT_GET,
            [],
            [
                'query' => [
                    'id' => $params->getJobId(),
                ],
            ]
        );

        return $this->getResponseAdapter()->transform($response, Response\Process\JobsPullResultGet::class);
    }

    /**
     * @param Request\Users\MeGet $params
     *
     * @return Response\Container
     */
    public function getUser(Request\Users\MeGet $params): Response\Container
    {
        $this->assertAPITokenIsSet();

        $this->assertParams($params, RequestType\Users\MeGet::class);

        $response = $this->makeRequest('GET', static::ENDPOINT_USERS_ME_GET);

        return $this->getResponseAdapter()->transform($response, Response\Users\MeGet::class);
    }

    public function getViewList(Request\Files\ListGet $params): Response\Container
    {
        $this->assertAPITokenIsSet();
        $this->assertParams($params, RequestType\Files\ListGet::class);

        $query = [];

        if (!is_null($params->getOffset())) {
            $query['offset'] = $params->getOffset();
        }

        if ($params->getLimit()) {
            $query['limit'] = $params->getLimit();
        }

        if ($params->getCriteria()) {
            $query['criteria'] = $params->getCriteria();
        }

        if ($params->getOrder()) {
            $query['order'] = $params->getOrder();
        }

        if ($params->getFilter()) {
            $query['filter'] = json_encode($params->getFilter());
        }

        if ($params->getTags()) {
            $query['tags'] = json_encode($params->getTags());
        }

        if (!is_null($params->getShallow())) {
            $query['shallow'] = $params->getShallow() === true ? '1' : '0';
        }

        $response = $this->makeRequest(
            'GET',
            static::ENDPOINT_FILES_LIST_GET,
            [],
            ['query' => $query]
        );

        return $this->getResponseAdapter()->transform($response, Response\Files\ListGet::class);
    }

    /**
     * @param Request\Files\ListGet $params
     * @return \Generator|Response\Container Yielded value is Response\Container instance which holds
     * Response\Files\ListGet object as body data
     *
     * @see Response\Files\ListGet
     */
    public function getViewListIterator(Request\Files\ListGet $params): \Generator
    {
        $hasNextPage = true;
        $offset = $params->getOffset();
        $chunkSize = $params->getLimit();

        while ($hasNextPage) {
            $params = new Request\Files\ListGet(
                $chunkSize,
                $offset,
                $params->getCriteria(),
                $params->getOrder(),
                $params->getFilter(),
                $params->getTags(),
                $params->getShallow()
            );
            /** @var Response\Files\ListGet $chunk */
            $chunk = $this->getViewList($params);
            /** @var Response\Files\ListGet\Meta $meta */
            $meta = $chunk->getBodyData()->getMeta();
            $hasNextPage = $meta->getPage() < $meta->getPages();
            $offset += $chunkSize;

            yield $chunk;
        }
    }
    
    /**
     * @param Request\Files\InfoGet $params
     *
     * @return Response\Container
     */
    public function getViewInfo(Request\Files\InfoGet $params): Response\Container
    {
        $this->assertAPITokenIsSet();
        $this->assertParams($params, RequestType\Files\InfoGet::class);

        $response = $this->makeRequest(
            'GET',
            self::ENDPOINT_FILES_INFO_GET,
            [$params->getUserAlias(), $params->getViewId()]
        );

        return $this->getResponseAdapter()->transform($response, Response\Files\InfoGet::class);
    }

    /**
     * @param Request\Payments\Plans\PlanGet $params
     *
     * @return Response\Container
     */
    public function getPaymentsPlan(Request\Payments\Plans\PlanGet $params): Response\Container
    {
        $this->assertParams($params, RequestType\Payments\Plans\PlanGet::class);

        $response = $this->makeRequest(
            'GET',
            self::ENDPOINT_PAYMENTS_PLANS_PLAN_GET,
            [$params->getId()]
        );

        return $this->getResponseAdapter()->transform($response, Response\Payments\Plans\PlanGet::class);
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return string
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * @return \CappasitySDK\ResponseAdapter
     */
    private function getResponseAdapter()
    {
        return $this->responseAdapter;
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $urlParams
     * @param array $options
     *
     * @return Transport\ResponseContainer
     * @throws Client\Exception\RequestException
     */
    private function makeRequest($method, $endpoint, $urlParams = [], array $options = [])
    {
        try {
            return $this->transport->makeRequest(
                $method,
                $this->getUrl($endpoint, $urlParams),
                $this->makeOptions($endpoint, $options)
            );
        } catch (Transport\Exception\RequestException $e) {
            throw Client\Exception\RequestException::wrapTransportRequestException($e);
        }
    }

    /**
     * @param string $endpoint
     * @param array $options
     *
     * @return array
     */
    private function makeOptions($endpoint, array $options)
    {
        $options['headers']['authorization'] = "Bearer {$this->apiToken}";
        $options['timeout'] = $this->getTimeout($endpoint);

        return $options;
    }

    /**
     * @throws AuthorizationAssertionException
     */
    private function assertAPITokenIsSet()
    {
        if (!is_string($this->apiToken) || $this->apiToken === '') {
            throw new AuthorizationAssertionException('API token must be set');
        }
    }

    /**
     * @param Request\RequestParamsInterface $params
     * @param string $validatorType
     *
     * @throws Client\Exception\ValidationException
     */
    private function assertParams(Client\Model\Request\RequestParamsInterface $params, $validatorType)
    {
        try {
            $this->validator->assert($params, $this->validator->buildByType($validatorType));
        } catch (ValidatorWrapper\Exception\ValidationException $e) {
            throw Client\Exception\ValidationException::fromValidatorWrapperValidationException($e);
        }
    }

    private function validateConfig()
    {
        if (!in_array($this->config['baseUrl'], self::$allowedBaseUrls)) {
            throw new Client\Exception\InvalidConfigValueException('Invalid base URL');
        }

        foreach (self::$allowedEndpoints as $endpoint) {
            if (!array_key_exists($endpoint, $this->config['timeout'])) {
                throw new \LogicException("Timeout not set for endpoint \"{$endpoint}\"");
            }

            if (!is_int($this->config['timeout'][$endpoint])) {
                throw new Client\Exception\InvalidConfigValueException("Timeout is not an integer for endpoint \"{$endpoint}\"");
            }
        }
    }

    /**
     * @param string $endpoint
     * @param string[] $urlParams
     * @return string
     */
    private function getUrl($endpoint, array $urlParams = [])
    {
        $path = sprintf($endpoint, ...$urlParams);

        return "{$this->config['baseUrl']}{$path}";
    }

    /**
     * @param string $endpoint
     * @return int
     */
    private function getTimeout($endpoint)
    {
        return $this->config['timeout'][$endpoint];
    }
}
