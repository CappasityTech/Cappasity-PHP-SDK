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

namespace CappasitySDK\Client\Validator\Type\Request\Payments\Plans;

use Respect\Validation\Validator as V;

use CappasitySDK\Client\Model\Request\Payments\Plans\PlanGet as PlanGetModel;
use CappasitySDK\Client\Validator;

class PlanGet implements Validator\TypeInterface
{
    /**
     * @return V
     */
    public static function configureValidator()
    {
        return V::create()
            ->setName('PlanGet')
            ->instance(PlanGetModel::class)
            ->attribute('id', V::stringType())
            ;
    }

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces()
    {
        return [];
    }
}
