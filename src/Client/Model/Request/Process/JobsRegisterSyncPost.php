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

namespace CappasitySDK\Client\Model\Request\Process;

use CappasitySDK\Client;

class JobsRegisterSyncPost implements Client\Model\Request\RequestParamsInterface
{
    const SYNC_TYPE_PULL = 'pull';
    const SYNC_TYPE_PUSH_HTTP = 'push.http';

    /**
     * @var JobsRegisterSyncPost\SyncItem[]
     */
    private $items;

    /**
     * @var string
     */
    private $syncType;

    /**
     * Required when sync type is push.http
     *
     * @var null|string
     */
    private $callbackUrl;

    public static $syncTypes = [
        self::SYNC_TYPE_PULL,
        self::SYNC_TYPE_PUSH_HTTP,
    ];

    /**
     * @param JobsRegisterSyncPost\SyncItem[] $items
     * @param string $syncType
     * @param null|string $callbackUrl
     */
    public function __construct(array $items, $syncType, $callbackUrl = null)
    {
        $this->items = $items;
        $this->syncType = $syncType;
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * @param array $items
     * @param string $syncType
     * @param null|string $callbackUrl
     *
     * @return JobsRegisterSyncPost
     */
    public static function fromData(array $items, $syncType, $callbackUrl = null)
    {
        return new self(
            array_map(function ($item) {
                return JobsRegisterSyncPost\SyncItem::fromData(
                    isset($item['id']) ? $item['id'] : null,
                    isset($item['aliases']) ? $item['aliases'] : null,
                    isset($item['capp']) ? $item['capp'] : null
                );
            }, $items),
            $syncType,
            $callbackUrl
        );
    }

    /**
     * @return JobsRegisterSyncPost\SyncItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function getSyncType()
    {
        return $this->syncType;
    }

    /**
     * @return null|string
     */
    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }
}
