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

namespace CappasitySDK\Client\Model\Response\Files\Common;

class File
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var File\Attributes
     */
    private $attributes;

    /**
     * @var File\Links
     */
    private $links;

    /**
     * @param string $id
     * @param string $type
     * @param File\Attributes $attributes
     * @param File\Links $links
     */
    public function __construct($id, $type, File\Attributes $attributes, File\Links $links)
    {
        $this->id = $id;
        $this->type = $type;
        $this->attributes = $attributes;
        $this->links = $links;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return File\Attributes
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param File\Attributes $attributes
     * @return $this
     */
    public function setAttributes(File\Attributes $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return File\Links
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param File\Links $links
     * @return $this
     */
    public function setLinks(File\Links $links)
    {
        $this->links = $links;

        return $this;
    }
}
