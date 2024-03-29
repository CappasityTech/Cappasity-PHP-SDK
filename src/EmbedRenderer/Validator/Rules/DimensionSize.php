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

namespace CappasitySDK\EmbedRenderer\Validator\Rules;

use Respect\Validation\Rules\AbstractRule;

class DimensionSize extends AbstractRule
{
    use DimensionSizeTrait;

    public function validate($input): bool
    {
        return $this->isValidDimensionSize($input);
    }
}
