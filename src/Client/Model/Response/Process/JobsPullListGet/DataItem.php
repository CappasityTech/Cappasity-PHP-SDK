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

namespace CappasitySDK\Client\Model\Response\Process\JobsPullListGet;

class DataItem
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
     * @var DataItemAttributes
     */
    private $attributes;

    /**
     * @param string $id
     * @param string $type
     * @param DataItemAttributes $attributes
     */
    public function __construct($id, $type, DataItemAttributes $attributes)
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
    public function setId($id): DataItem
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
    public function setType($type): DataItem
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return DataItemAttributes
     */
    public function getAttributes(): DataItemAttributes
    {
        return $this->attributes;
    }

    /**
     * @param DataItemAttributes $attributes
     * @return $this
     */
    public function setAttributes(DataItemAttributes $attributes): DataItem
    {
        $this->attributes = $attributes;

        return $this;
    }
}
