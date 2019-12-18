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
    const FILTER_MULTI = '#multi';
    const FILTER_FIELDS = 'fields';
    const FILTER_MATCH = 'match';
    const FILTER_NE = 'ne';
    const FILTER_EQ = 'eq';
    const FILTER_GTE = 'gte';
    const FILTER_LTE = 'lte';

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
    private $criteria;

    /**
     * @var null|string
     */
    private $order;

    /**
     * Filename filter example:
     * $filter = 'foobarfilename'
     *
     * Single field filter example:
     * $filter = [
     *      'alias' => [
     *          ListGet::FILTER_EQ => 'foobar'
     *      ],
     * ]
     *
     * Multi field filter example:
     * $filter = [
     *      ListGet::FILTER_MULTI => [
     *          ListGet::FILTER_FIELDS => ['name', 'alias'],
     *          ListGet::FILTER_MATCH => 'foobar',
     *      ]
     * ]
     *
     * @var null|string|array
     */
    private $filter;

    /**
     * @var null|string[]
     */
    private $tags;

    /**
     * @var null|boolean
     */
    private $shallow;

    /**
     * @param int $limit Limit or chunk size
     * @param int $offset
     * @param string $criteria
     * @param string $order
     * @param null|string|array $filter
     * @param null|string[] $tags
     * @param null|boolean $shallow
     */
    public function __construct($limit, $offset, $criteria, $order, $filter, $tags, $shallow)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        $this->criteria = $criteria;
        $this->order = $order;
        $this->filter = $filter;
        $this->tags = $tags;
        $this->shallow = $shallow;
    }

    /**
     * @param null|int $limit Limit or chunk size
     * @param null|int $offset
     * @param null|string $criteria
     * @param null|string $order
     * @param null|string|array $filter
     * @param null|array $tags
     * @param null|boolean $shallow
     * @return ListGet
     */
    public static function fromData(
        ?int $limit = null,
        ?int $offset = null,
        ?string $criteria = null,
        ?string $order = null,
        $filter = null,
        ?array $tags = null,
        ?bool $shallow = null
    ): ListGet {
        return new self($limit, $offset, $criteria, $order, $filter, $tags, $shallow);
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

    public function getCriteria(): ?string
    {
        return $this->criteria;
    }

    public function setCriteria(?string $criteria)
    {
        $this->criteria = $criteria;

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

    /**
     * @return array|null|string
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param array|null|string $filter
     * @return $this
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @param null|string[] $tags
     * @return $this
     */
    public function setTags(?array $tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShallow(): ?bool
    {
        return $this->shallow;
    }

    /**
     * @param bool|null $shallow
     * @return $this
     */
    public function setShallow(?bool $shallow)
    {
        $this->shallow = $shallow;

        return $this;
    }
}
