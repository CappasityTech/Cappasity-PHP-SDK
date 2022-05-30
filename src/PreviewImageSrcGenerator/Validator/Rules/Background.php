<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licensed only to registered users of the Cappasity platform.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 * @author    Cappasity Inc <info@cappasity.com>
 * @copyright 2019-2022 Cappasity Inc.
 */

namespace CappasitySDK\PreviewImageSrcGenerator\Validator\Rules;

use Respect\Validation\Rules\AbstractRule;

class Background extends AbstractRule
{
    use BackgroundTrait;

    public function validate($input): bool
    {
        return $this->isValidBackground($input);
    }
}
