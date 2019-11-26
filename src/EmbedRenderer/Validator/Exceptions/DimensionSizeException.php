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

namespace CappasitySDK\EmbedRenderer\Validator\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class DimensionSizeException extends ValidationException
{
    const ERROR_TEMPLATE = '{{name}} must be defined in pixels or in % of the containing element. The percentage must be between 0 and 100. Examples of valid dimension size values: \'210\', \'80%\'';

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => self::ERROR_TEMPLATE,
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => self::ERROR_TEMPLATE,
        ],
    ];
}
