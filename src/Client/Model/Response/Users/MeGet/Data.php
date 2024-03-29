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

namespace CappasitySDK\Client\Model\Response\Users\MeGet;

class Data
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $id;

    /**
     * @var Data\Attributes
     */
    private $attributes;

    /**
     * @var Data\Links
     */
    private $links;

    /**
     * @param string $type
     * @param string $id
     * @param Data\Attributes $attributes
     * @param Data\Links $links
     */
    public function __construct($type, $id, Data\Attributes $attributes, Data\Links $links)
    {
        $this->type = $type;
        $this->id = $id;
        $this->attributes = $attributes;
        $this->links = $links;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): Data
    {
        $this->type = $type;

        return $this;
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
    public function setId(string $id): Data
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Data\Attributes
     */
    public function getAttributes(): Data\Attributes
    {
        return $this->attributes;
    }

    /**
     * @param Data\Attributes $attributes
     * @return $this
     */
    public function setAttributes(Data\Attributes $attributes): Data
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return Data\Links
     */
    public function getLinks(): Data\Links
    {
        return $this->links;
    }

    /**
     * @param Data\Links $links
     * @return $this
     */
    public function setLinks(Data\Links $links): Data
    {
        $this->links = $links;

        return $this;
    }
}
