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

namespace CappasitySDK\Client\Model\Response\Process\JobsRegisterSyncPost;

use CappasitySDK\Client;

class DataAttributes
{
    const ATTRIBUTE_GZIP = 'gzip';
    const ATTRIBUTE_TYPE = 'type';

    /**
     * @var array
     */
    private $attributes = [];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function getType()
    {
        if (!array_key_exists(self::ATTRIBUTE_TYPE, $this->attributes)) {
            throw new \LogicException('Sync result data is expected to have type attribute');
        }

        return $this->attributes[self::ATTRIBUTE_TYPE];
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->attributes[self::ATTRIBUTE_TYPE] = $type;

        return $this;
    }

    /**
     * @return bool
     */
    public function getGzip()
    {
        if (!array_key_exists(self::ATTRIBUTE_GZIP, $this->attributes)) {
            throw new \LogicException('Sync result data is expected to have gzip attribute');
        }

        return $this->attributes[self::ATTRIBUTE_GZIP];
    }

    /**
     * @param bool $gzip
     * @return $this
     */
    public function setGzip($gzip)
    {
        $this->attributes[self::ATTRIBUTE_GZIP] = $gzip;

        return $this;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }

        throw new Client\Exception\UnknownAttributeAccessException('Undefined attribute call');
    }
}
