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

namespace CappasitySDK\Client\Validator\Type\Request\Process;

use Respect\Validation\Validator as V;

use CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost as JobsRegisterSyncPostModel;
use CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost\SyncItem;
use CappasitySDK\Client\Validator\TypeInterface;

class JobsRegisterSyncPost implements TypeInterface
{
    /**
     * @return V
     */
    public static function configureValidator()
    {
        return V::create()
            ->setName('JobsRegisterSyncPost')
            ->instance(JobsRegisterSyncPostModel::class)
            ->attribute('items', V::allOf([
                V::arrayType(),
                V::each(
                    V::allOf([
                        V::instance(SyncItem::class),
                        V::attribute('id', V::stringType()),
                        V::attribute('aliases', V::each(
                            V::allOf([
                                V::stringType(),
                                V::sku(),
                            ])
                        )),
                        V::attribute('capp', V::oneOf(
                            V::nullType(),
                            V::allOf([
                                V::stringType(),
                                V::uuid(),
                            ])
                        )),
                    ])
                ),
                V::callback(function (array $items) {
                    $skuCount = array_reduce($items, function ($skuCount, SyncItem $item) {
                        return $skuCount + count($item->getAliases());
                    });

                    return $skuCount >= 1 && $skuCount <= 500;
                }),
            ])->setName('items'))
            ->attribute('syncType', V::in(JobsRegisterSyncPostModel::$syncTypes))
            ->attribute('callbackUrl', V::oneOf(V::nullType(), V::url()))
            ->when(
                V::attribute('syncType', V::equals(JobsRegisterSyncPostModel::SYNC_TYPE_PUSH_HTTP)),
                V::attribute('callbackUrl', V::url()),
                V::alwaysValid()
            )
            ->when(
                V::attribute('syncType', V::equals(JobsRegisterSyncPostModel::SYNC_TYPE_PULL)),
                // todo for now setName is a way to show a better error message
                V::attribute('callbackUrl', V::nullType())->setName('When syncType is pull callbackUrl'),
                V::alwaysValid()
            )
        ;
    }

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces()
    {
        return [
            'CappasitySDK\\Common\\Validator\\Rules\\',
        ];
    }
}
