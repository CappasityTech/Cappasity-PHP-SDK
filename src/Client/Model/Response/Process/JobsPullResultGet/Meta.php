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

namespace CappasitySDK\Client\Model\Response\Process\JobsPullResultGet;

class Meta
{
    /**
     * @var string
     */
    private $jobId;

    /**
     * @param string $jobId
     */
    public function __construct(string $jobId)
    {
        $this->jobId = $jobId;
    }

    /**
     * @return string
     */
    public function getJobId(): string
    {
        return $this->jobId;
    }

    /**
     * @param string $jobId
     * @return $this
     */
    public function setJobId(string $jobId): Meta
    {
        $this->jobId = $jobId;

        return $this;
    }
}
