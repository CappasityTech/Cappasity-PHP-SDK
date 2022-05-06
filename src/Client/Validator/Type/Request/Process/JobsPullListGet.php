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

use CappasitySDK\Client\Model\Request\Process\JobsPullListGet as JobsPullListGetModel;
use CappasitySDK\Client\Validator\TypeInterface;

class JobsPullListGet implements TypeInterface
{
    /**
     * @return \Respect\Validation\Validator
     */
    public static function configureValidator()
    {
        return V::create()
            ->setName('JobsPullListGet')
            ->instance(JobsPullListGetModel::class)
            ->attribute('limit', V::oneOf([
                V::nullType(),
                V::intType()->min(1)->max(40),
            ]))
            ->attribute('cursor', V::oneOf([
                V::nullType(),
                V::intType()->min(0),
            ]));
    }

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces()
    {
        return [];
    }
}
