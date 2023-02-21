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

namespace CappasitySDK\Client\Model\Response\Files\ListGet;

class Meta
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var integer
     */
    private $page;

    /**
     * @var integer
     */
    private $pages;

    /**
     * @var integer|null
     */
    private $cursor;

    /**
     * @param string $id
     * @param int $page
     * @param int $pages
     * @param int|null $cursor
     */
    public function __construct($id, $page, $pages, $cursor)
    {
        $this->id = $id;
        $this->page = $page;
        $this->pages = $pages;
        $this->cursor = $cursor;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function setPage($page): Meta
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int
     */
    public function getPages(): int
    {
        return $this->pages;
    }

    /**
     * @param int $pages
     * @return $this
     */
    public function setPages($pages): Meta
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCursor(): ?int
    {
        return $this->cursor;
    }

    /**
     * @param int|null $cursor
     * @return $this
     */
    public function setCursor($cursor): Meta
    {
        $this->cursor = $cursor;

        return $this;
    }
}
