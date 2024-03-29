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

namespace CappasitySDK\Client\Model\Response\Files;

use CappasitySDK\Client\Model\Response;
use CappasitySDK\Client\ResponseModelAdapter\Exception\AdapterException;
use CappasitySDK\Client\ResponseModelAdapter\File as FileResponseModelAdapter;

class InfoGet implements Response\DataInterface
{
    /**
     * @var InfoGet\Meta
     */
    private $meta;

    /**
     * @var Response\Files\Common\File
     */
    private $data;

    /**
     * @param InfoGet\Meta $meta
     * @param Response\Files\Common\File $data
     */
    public function __construct(InfoGet\Meta $meta, Response\Files\Common\File $data)
    {
        $this->meta = $meta;
        $this->data = $data;
    }

    /**
     * @return InfoGet\Meta
     */
    public function getMeta(): InfoGet\Meta
    {
        return $this->meta;
    }

    /**
     * @param InfoGet\Meta $meta
     * @return $this
     */
    public function setMeta(InfoGet\Meta $meta): InfoGet
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return Response\Files\Common\File
     */
    public function getData(): Common\File
    {
        return $this->data;
    }

    /**
     * @param Response\Files\Common\File $data
     * @return $this
     */
    public function setData(Response\Files\Common\File $data): InfoGet
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param array $response
     * @return InfoGet
     * @throws AdapterException
     */
    public static function fromResponse(array $response): InfoGet
    {
        $file = FileResponseModelAdapter::transformFile($response['data']);

        return new self(
            new InfoGet\Meta($response['meta']['id']),
            $file
        );
    }
}
