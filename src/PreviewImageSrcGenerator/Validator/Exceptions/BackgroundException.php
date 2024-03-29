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

namespace CappasitySDK\PreviewImageSrcGenerator\Validator\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class BackgroundException extends ValidationException
{
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must match pattern /^#[0-9a-f]{6}$/',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must match pattern /^#[0-9a-f]{6}$/',
        ],
    ];
}
