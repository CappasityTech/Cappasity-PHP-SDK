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

namespace CappasitySDK\Client\Model\Request\Process;

use CappasitySDK\Client;

class JobsPullListGet implements Client\Model\Request\RequestParamsInterface
{
    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var int|null
     */
    private $cursor;

    /**
     * @param int|null $limit
     * @param int|null $cursor
     */
    public function __construct($limit = null, $cursor = null)
    {
        $this->limit = $limit;
        $this->cursor = $cursor;
    }

    /**
     * @return int
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function getCursor(): ?int
    {
        return $this->cursor;
    }

    public static function fromData($limit = 20, $cursor = null): JobsPullListGet
    {
        return new self($limit, $cursor);
    }
}
