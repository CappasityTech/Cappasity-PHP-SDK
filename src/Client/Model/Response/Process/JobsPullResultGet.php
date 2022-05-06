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

namespace CappasitySDK\Client\Model\Response\Process;

use CappasitySDK\Client\Model\Response;

class JobsPullResultGet implements Response\DataInterface
{
    /**
     * @var JobsPullResultGet\Meta
     */
    private $meta;

    /**
     * @var JobsPullResultGet\SyncDataItem[]|mixed
     */
    private $data;

    /**
     * @param JobsPullResultGet\Meta $meta
     * @param JobsPullResultGet\SyncDataItem[]|mixed $data
     */
    public function __construct(JobsPullResultGet\Meta $meta, $data)
    {
        $this->meta = $meta;
        $this->data = $data;
    }

    /**
     * @return JobsPullResultGet\Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param JobsPullResultGet\Meta $meta
     * @return $this
     */
    public function setMeta(JobsPullResultGet\Meta $meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return JobsPullResultGet\SyncDataItem[]|mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param JobsPullResultGet\SyncDataItem[]|mixed $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param $response
     * @return JobsPullResultGet
     */
    public static function fromResponse($response)
    {
        $meta = new JobsPullResultGet\Meta($response['meta']['jobId']);

//        if ($response['meta']['jobType'] !== 'sync') {
//            throw new \LogicException('Unhandled job type result to parse');
//        }

        $data = array_map(function (array $item) {
            return new JobsPullResultGet\SyncDataItem(
                $item['id'],
                $item['uploadId'],
                array_key_exists('sku', $item) ? $item['sku'] : null,
                array_key_exists('capp', $item) ? $item['capp'] : null
            );
        }, $response['data']);

        return new self($meta, $data);
    }
}
