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

class ResponseContainer
{
    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var array
     */
    private $data;

    /**
     * @var mixed|\GuzzleHttp\Message\ResponseInterface
     */
    private $originalResponse;

    /**
     * @param int $statusCode
     * @param array $headers
     * @param array $data
     * @param $originalResponse
     */
    public function __construct($statusCode, array $headers, array $data, $originalResponse)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->data = $data;
        $this->originalResponse = $originalResponse;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return mixed|\GuzzleHttp\Message\ResponseInterface
     */
    public function getOriginalResponse()
    {
        return $this->originalResponse;
    }

    /**
     * @param mixed|\GuzzleHttp\Message\ResponseInterface $originalResponse
     * @return $this
     */
    public function setOriginalResponse($originalResponse)
    {
        $this->originalResponse = $originalResponse;

        return $this;
    }
}
