<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licensed only to registered users of the Cappasity platform.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 * @author    Cappasity Inc <info@cappasity.com>
 * @copyright 2019-2023 Cappasity Inc.
 */

namespace CappasitySDK;

use Respect\Validation\Validator;
use Respect\Validation\Factory;

interface ValidatorTypeInterface
{
    /**
     * @return Validator
     */
    public static function configureValidator(): Validator;

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces(): array;
}
