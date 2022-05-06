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

class JobsPullListGet implements Response\DataInterface
{
    /**
     * @var JobsPullListGet\Meta
     */
    private $meta;

    /**
     * @var JobsPullListGet\DataItem[]
     */
    private $data;

    /**
     * @param JobsPullListGet\Meta $meta
     * @param JobsPullListGet\DataItem[] $data
     */
    public function __construct(JobsPullListGet\Meta $meta, array $data)
    {
        $this->meta = $meta;
        $this->data = $data;
    }

    /**
     * @return JobsPullListGet\Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param JobsPullListGet\Meta $meta
     * @return $this
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return JobsPullListGet\DataItem[]
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param JobsPullListGet\DataItem[] $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public static function fromResponse(array $response)
    {
        return new self(
            new JobsPullListGet\Meta($response['meta']['cursor'], $response['meta']['limit']),
            array_map(function (array $item) {
                $attributes = new JobsPullListGet\DataItemAttributes($item['attributes']);
                return new JobsPullListGet\DataItem($item['id'], $item['type'], $attributes);
            }, $response['data'])
        );
    }
}
