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

namespace CappasitySDK\Client\Model\Response\Process\JobsPullAckPost;

class Data
{
    /**
     * @var int
     */
    private $ack;

    /**
     * @param int $ack
     */
    public function __construct($ack)
    {
        $this->ack = $ack;
    }

    /**
     * @return int
     */
    public function getAck()
    {
        return $this->ack;
    }

    /**
     * @param int $ack
     * @return $this
     */
    public function setAck($ack)
    {
        $this->ack = $ack;

        return $this;
    }
}
