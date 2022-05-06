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

trait SkuTrait
{
    private static $skuRegex = '/^[0-9A-Za-z_\-.]{1,50}$/';

    /**
     * @param $sku
     * @return bool
     */
    public function isValidSku($sku)
    {
        return is_string($sku)
            && preg_match($this->getValidSkuPattern(), $sku) === 1;
    }

    /**
     * @return string
     */
    private function getValidSkuPattern()
    {
        return self::$skuRegex;
    }
}
