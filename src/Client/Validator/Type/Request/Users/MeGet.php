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

namespace CappasitySDK\Client\Validator\Type\Request\Users;

use Respect\Validation\Validator as V;

use CappasitySDK\Client\Validator\TypeInterface;

class MeGet implements TypeInterface
{
    /**
     * @return V
     */
    public static function configureValidator()
    {
        return V::alwaysValid();
    }

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces()
    {
        return [];
    }
}
