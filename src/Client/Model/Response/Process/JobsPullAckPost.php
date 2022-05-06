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

class JobsPullAckPost implements Response\DataInterface
{
    /**
     * @var JobsPullAckPost\Data
     */
    private $data;

    /**
     * @param JobsPullAckPost\Data $data
     */
    public function __construct(JobsPullAckPost\Data $data)
    {
        $this->data = $data;
    }

    /**
     * @return JobsPullAckPost\Data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param JobsPullAckPost\Data $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param array $response
     * @return JobsPullAckPost
     */
    public static function fromResponse(array $response)
    {
        return new self(new JobsPullAckPost\Data($response['data']['ack']));
    }
}
