<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licensed only to registered users of the Cappasity platform.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 * @author    Cappasity Inc <info@cappasity.com>
 * @copyright 2019-2022 Cappasity Inc.
 */

namespace CappasitySDK\Client\Model\Response\Process\JobsRegisterSyncPost;

class Data
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
     * @var DataAttributes
     */
    private $attributes;

    /**
     * @param string $id
     * @param string $type
     * @param DataAttributes $attributes
     */
    public function __construct($id, $type, DataAttributes $attributes)
    {
        $this->id = $id;
        $this->type = $type;
        $this->attributes = $attributes;
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
    public function setId($id): Data
    {
        $this->id = $id;

        return $this;
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
    public function setType($type): Data
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return DataAttributes
     */
    public function getAttributes(): DataAttributes
    {
        return $this->attributes;
    }

    /**
     * @param DataAttributes $attributes
     * @return $this
     */
    public function setAttributes(DataAttributes $attributes): Data
    {
        $this->attributes = $attributes;

        return $this;
    }
}
