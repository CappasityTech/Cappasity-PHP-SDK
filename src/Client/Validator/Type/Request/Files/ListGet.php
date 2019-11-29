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
            ->attribute('offset', V::allOf(V::intType(), V::min(0)), false)
            ->attribute('limit', V::allOf(V::intType(), V::min(1), V::max(100)), false)
            ->attribute('sortBy', V::stringType(), false)
            ->attribute('order', V::stringType(), false);
    }

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces()
    {
        return [];
    }
}
