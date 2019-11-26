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

namespace CappasitySDK\Common\Validator\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class SkuException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must match pattern /^[0-9A-Za-z_\-.]{1,50}$/',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must match pattern /^[0-9A-Za-z_\-.]{1,50}$/',
        ],
    ];
}
