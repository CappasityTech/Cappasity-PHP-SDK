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

namespace CappasitySDK;

interface TransportInterface
{
    /**
     * @param string $method
     * @param string $url
     * @param array $options
     *
     * @return Transport\ResponseContainer
     */
    public function makeRequest($method, $url, array $options = []);
}
