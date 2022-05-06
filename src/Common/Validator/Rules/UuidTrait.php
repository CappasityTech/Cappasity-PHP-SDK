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

trait UuidTrait
{
    private static $uuidRegex = '/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-4[0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$/';

    /**
     * @param $uuid
     * @return bool
     */
    public function isValidUuid($uuid)
    {
        return is_string($uuid)
            && preg_match($this->getValidUuidPattern(), $uuid) === 1;
    }

    /**
     * @return string
     */
    private function getValidUuidPattern()
    {
        return self::$uuidRegex;
    }
}
