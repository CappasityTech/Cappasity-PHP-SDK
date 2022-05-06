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

namespace CappasitySDK;

interface ValidatorTypeInterface
{
    /**
     * @return \Respect\Validation\Validator
     */
    public static function configureValidator();

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces();
}
