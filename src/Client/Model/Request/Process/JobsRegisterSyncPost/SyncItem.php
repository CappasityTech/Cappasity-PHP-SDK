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

namespace CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost;

use CappasitySDK;

class SyncItem implements CappasitySDK\Client\Model\Request\RequestParamsInterface
{
    /**
     * @var int|string
     */
    private $id;

    /**
     * @var string[]
     */
    private $aliases;

    /**
     * `capp` field value
     * @var string|null
     */
    private $capp;

    /**
     * @param string|int $id
     * @param string[] $aliases SKU
     * @param string|null $capp
     */
    public function __construct($id, array $aliases, $capp = null)
    {
        $this->id = $id;
        $this->aliases = $aliases;
        $this->capp = $capp;
    }

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string[]
     */
    public function getAliases()
    {
        return $this->aliases;
    }

    /**
     * @return string|null
     */
    public function getCapp()
    {
        return $this->capp;
    }

    /**
     * @return mixed serialized json-api compatible format
     */
    public function serialize()
    {
        $jsonAPIFormat = [
            'id' => $this->getId(),
            'type' => 'product',
            'attributes' => [
                'aliases' => $this->getAliases(),
            ],
        ];

        $capp = $this->getCapp();
        if ($capp !== null) {
            $jsonAPIFormat['attributes']['capp'] = $capp;
        }

        return $jsonAPIFormat;
    }

    /**
     * @param string|int $id
     * @param string[] $aliases
     * @param string|null $capp
     *
     * @return self
     */
    public static function fromData($id, array $aliases, $capp = null)
    {
        return new self($id, $aliases, $capp);
    }
}
