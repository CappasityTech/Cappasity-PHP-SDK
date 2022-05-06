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

namespace CappasitySDK\PreviewImageSrcGenerator\Exception;

use CappasitySDK\ValidatorWrapper\Exception\ValidationException as ValidatorException;

class ValidationException extends GeneratorException
{
    /**
     * @param ValidatorException $e
     * @return static
     */
    public static function fromValidatorWrapperValidationException(ValidatorException $e)
    {
        return new static($e->getMessage(), $e->getCode(), $e->getPrevious());
    }
}
