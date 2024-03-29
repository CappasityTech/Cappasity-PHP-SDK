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

namespace CappasitySDK\Client\Model\Response\Process;

use CappasitySDK\Client\Model\Response;

class JobsRegisterSyncPost implements Response\DataInterface
{
    /**
     * @var JobsRegisterSyncPost\Data
     */
    private $data;

    /**
     * @param JobsRegisterSyncPost\Data $data
     */
    public function __construct(JobsRegisterSyncPost\Data $data)
    {
        $this->data = $data;
    }

    /**
     * @return JobsRegisterSyncPost\Data
     */
    public function getData(): JobsRegisterSyncPost\Data
    {
        return $this->data;
    }

    /**
     * @param JobsRegisterSyncPost\Data $data
     * @return $this
     */
    public function setData($data): JobsRegisterSyncPost
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param array $response
     * @return JobsRegisterSyncPost
     */
    public static function fromResponse(array $response): JobsRegisterSyncPost
    {
        $data = $response['data'];
        $attributes = new JobsRegisterSyncPost\DataAttributes($data['attributes']);

        return new self(
            new JobsRegisterSyncPost\Data($data['id'], $data['type'], $attributes)
        );
    }
}
