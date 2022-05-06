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

use CappasitySDK\Client\Model\Request\Files\InfoGet as InfoGetModel;
use CappasitySDK\Client\Validator;

class InfoGet implements Validator\TypeInterface
{
    /**
     * @return V
     */
    public static function configureValidator()
    {
        return V::create()
            ->setName('InfoGet')
            ->instance(InfoGetModel::class)
            ->attribute('userAlias', V::stringType())
            ->attribute('viewId', V::stringType());
    }

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces()
    {
        return [];
    }
}
