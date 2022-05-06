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

class JobsPullResultGet implements Client\Model\Request\RequestParamsInterface
{
    private $jobId;

    public function __construct($jobId)
    {
        $this->jobId = $jobId;
    }

    /**
     * @return mixed
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    public static function fromData($jobId)
    {
        return new self($jobId);
    }
}
