<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licensed only to registered users of the Cappasity platform.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 * @author    Cappasity Inc <info@cappasity.com>
 * @copyright 2019-2023 Cappasity Inc.
 */

namespace CappasitySDK\Client\Model\Response;

use GuzzleHttp\Message\ResponseInterface;

class Container
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
     * @var DataInterface
     */
    private $bodyData;

    /**
     * @var mixed|ResponseInterface
     */
    private $originalResponse;

    /**
     * @param int $statusCode
     * @param array $headers
     * @param DataInterface $bodyData
     * @param $originalResponse
     */
    public function __construct($statusCode, array $headers, DataInterface $bodyData, $originalResponse)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->bodyData = $bodyData;
        $this->originalResponse = $originalResponse;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode): Container
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function setHeaders(array $headers): Container
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return DataInterface
     */
    public function getBodyData(): DataInterface
    {
        return $this->bodyData;
    }

    /**
     * @param DataInterface $bodyData
     *
     * @return $this
     */
    public function setBodyData(DataInterface $bodyData): Container
    {
        $this->bodyData = $bodyData;

        return $this;
    }

    /**
     * @return mixed|ResponseInterface
     */
    public function getOriginalResponse(): ResponseInterface
    {
        return $this->originalResponse;
    }

    /**
     * @param mixed|ResponseInterface $originalResponse
     * @return $this
     */
    public function setOriginalResponse($originalResponse): Container
    {
        $this->originalResponse = $originalResponse;

        return $this;
    }
}
