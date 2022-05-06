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

namespace CappasitySDK\Client\Model\Response\Process\JobsPullListGet;

use CappasitySDK\Client;

class DataItemAttributes
{
    const ATTRIBUTE_STATUS = 'status';

    const JOB_STATUS_QUEUED = 'queued';
    const JOB_STATUS_PROCESSING = 'processing';
    const JOB_STATUS_SUCCESS = 'success';
    const JOB_STATUS_ERROR = 'error';

    public static $jobStatuses = [
        self::JOB_STATUS_SUCCESS,
        self::JOB_STATUS_PROCESSING,
        self::JOB_STATUS_SUCCESS,
        self::JOB_STATUS_ERROR,
    ];

    /**
     * @var array
     */
    private $attributes = [];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        if (!array_key_exists(self::ATTRIBUTE_STATUS, $this->attributes)) {
            throw new \LogicException('Data item is expected to have status attribute');
        }

        return $this->attributes[self::ATTRIBUTE_STATUS];
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->attributes[self::ATTRIBUTE_STATUS] = $status;

        return $this;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }

        throw new Client\Exception\UnknownAttributeAccessException('Undefined attribute call');
    }
}
