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

namespace CappasitySDK\Client\Model\Request\Files;

use CappasitySDK\Client\Model\Request;

class ListGet implements Request\RequestParamsInterface
{
    const OFFSET_DEFAULT = 0;
    const LIMIT_DEFAULT = 10;
    const SORT_BY_CREATED_AT = 'createdAt';
    const ORDER_ASC = 'ASC';
    const ORDER_DESC = 'DESC';

    /**
     * @var int
     */
    private $offset;

    /**
     * @var null|int
     */
    private $limit;

    /**
     * @var null|string
     */
    private $sortBy;

    /**
     * @var null|string
     */
    private $order;

    /**
     * @param int $limit Limit or chunk size
     * @param int $offset
     * @param string $sortBy
     * @param string $order
     */
    public function __construct($limit, $offset, $sortBy, $order)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        $this->sortBy = $sortBy;
        $this->order = $order;
    }

    /**
     * @param null|int $limit Limit or chunk size
     * @param null|int $offset
     * @param null|string $sortBy
     * @param null|string $order
     * @return ListGet
     */
    public static function fromData(
        ?int $limit = null,
        ?int $offset = null,
        ?string $sortBy = null,
        ?string $order = null
    ): ListGet {
        return new self($limit, $offset, $sortBy, $order);
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function setOffset(?int $offset)
    {
        $this->offset = $offset;

        return $this;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit)
    {
        $this->limit = $limit;

        return $this;
    }

    public function getSortBy(): ?string
    {
        return $this->sortBy;
    }

    public function setSortBy(?string $sortBy)
    {
        $this->sortBy = $sortBy;

        return $this;
    }

    public function getOrder(): ?string
    {
        return $this->order;
    }

    public function setOrder(?string $order)
    {
        $this->order = $order;

        return $this;
    }
}
