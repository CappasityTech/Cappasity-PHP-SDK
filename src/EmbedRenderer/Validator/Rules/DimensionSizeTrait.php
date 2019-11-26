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

namespace CappasitySDK\EmbedRenderer\Validator\Rules;

trait DimensionSizeTrait
{
    private static $percentageRegex = '/^\d+%$/';

    /**
     * @param $value
     * @return bool
     */
    public function isValidDimensionSize($value)
    {
        if ($this->isValidPixelCount($value)) {
            return true;
        }

        if ($this->isValidPercentage($value)) {
            return true;
        }

        return false;
    }

    /**
     * @param $value
     * @return bool
     */
    public function isValidPixelCount($value)
    {
        if (!is_string($value) || !is_numeric($value)) {
            return false;
        }

        $parsedPixelCount = intval($value);

        return is_int($parsedPixelCount) && intval($parsedPixelCount) > 0;
    }

    /**
     * @param $value
     * @return bool
     */
    public function isValidPercentage($value)
    {
        if (!is_string($value)) {
            return false;
        }

        if (!preg_match(self::$percentageRegex, $value) === 1) {
            return false;
        }

        $parsedPercentage = intval($value);

        return $parsedPercentage >= 0 && $parsedPercentage <= 100;
    }
}
