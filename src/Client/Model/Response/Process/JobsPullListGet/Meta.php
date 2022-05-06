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

class Meta
{
    /**
     * @var int
     */
    private $cursor;

    /**
     * @var int
     */
    private $limit;

    /**
     * @param int $cursor
     * @param int $limit
     */
    public function __construct($cursor, $limit)
    {
        $this->cursor = $cursor;
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * @param int $cursor
     * @return $this
     */
    public function setCursor($cursor)
    {
        $this->cursor = $cursor;

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }
}
