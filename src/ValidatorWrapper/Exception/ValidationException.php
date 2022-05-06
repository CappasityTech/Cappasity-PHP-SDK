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

namespace CappasitySDK\ValidatorWrapper\Exception;

use Respect\Validation\Exceptions\NestedValidationException;

class ValidationException extends \Exception
{
    /**
     * @param NestedValidationException $e
     * @return ValidationException
     */
    public static function fromNestedValidationException(NestedValidationException $e)
    {
        return new self($e->getFullMessage(), $e->getCode(), $e);
    }
}
