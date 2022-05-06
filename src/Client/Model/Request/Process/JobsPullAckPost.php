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

namespace CappasitySDK\Client\Model\Request\Process;

use CappasitySDK\Client;

class JobsPullAckPost implements Client\Model\Request\RequestParamsInterface
{
    /**
     * @var string[]
     */
    private $jobIds;

    public function __construct(array $jobIds = [])
    {
        $this->jobIds = $jobIds;
    }

    /**
     * @return string[]
     */
    public function getJobIds()
    {
        return $this->jobIds;
    }

    /**
     * @param string[] $jobIds
     *
     * @return JobsPullAckPost
     */
    public static function fromData(array $jobIds = [])
    {
        return new self($jobIds);
    }
}
