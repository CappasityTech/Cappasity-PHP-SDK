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

namespace CappasitySDK\Common\Validator\Rules;

use \Respect\Validation\Rules\AbstractRule;

class Uuid extends AbstractRule
{
    use UuidTrait;

    public function validate($input)
    {
        return $this->isValidUuid($input);
    }
}
