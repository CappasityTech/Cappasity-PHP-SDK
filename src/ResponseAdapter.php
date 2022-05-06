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

class ResponseAdapter
{
    /**
     * @param Transport\ResponseContainer $response
     * @param $className
     *
     * @return Client\Model\Response\Container
     *
     * @throws \Exception
     */
    public function transform(Transport\ResponseContainer $response, $className)
    {
        if (!method_exists($className, 'fromResponse')) {
            throw new \Exception();
        }

        return new Client\Model\Response\Container(
            $response->getStatusCode(),
            $response->getHeaders(),
            $className::fromResponse($response->getData()),
            $response
        );
    }
}
