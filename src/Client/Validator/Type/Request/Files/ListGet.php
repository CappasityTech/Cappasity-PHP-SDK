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

namespace CappasitySDK\Client\Validator\Type\Request\Files;

use Respect\Validation\Validator as V;

use CappasitySDK\Client\Model\Request\Files\ListGet as ListGetModel;
use CappasitySDK\Client\Validator;

class ListGet implements Validator\TypeInterface
{
    /**
     * @return V
     */
    public static function configureValidator()
    {
        return V::create()
            ->setName('ListGet')
            ->instance(ListGetModel::class)
            ->attribute(
                'offset',
                V::oneOf(
                    V::nullType(),
                    V::intType()->min(0)
                )
            )
            ->attribute(
                'limit',
                V::oneOf(
                    V::nullType(),
                    V::intType()->min(1)->max(100)
                )
            )
            ->attribute('sortBy', V::oneOf(V::nullType(), V::stringType()))
            ->attribute('order', V::oneOf(V::nullType(), V::stringType()));
    }

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces()
    {
        return [];
    }
}
