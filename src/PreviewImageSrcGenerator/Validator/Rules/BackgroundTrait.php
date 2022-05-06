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

namespace CappasitySDK\PreviewImageSrcGenerator\Validator\Rules;

trait BackgroundTrait
{
    public static $backgroundRegex = '/^#[0-9a-fA-F]{6}$/';

    /**
     * @param string $background
     * @return bool
     */
    public function isValidBackground($background)
    {
        return is_string($background)
            && preg_match($this->getValidBackgroundPattern(), $background) === 1;
    }

    /**
     * @return string
     */
    private function getValidBackgroundPattern()
    {
        return self::$backgroundRegex;
    }
}
