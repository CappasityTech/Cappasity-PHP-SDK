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

namespace CappasitySDK;

use Exception;
use Sentry\State\HubInterface as SentryHubInterface;

class ReportableTransport implements TransportInterface
{
    /**
     * @var TransportInterface
     */
    private $transport;

    /**
     * @var SentryHubInterface
     */
    private $sentryHub;

    /**
     * @param TransportInterface $transport
     * @param SentryHubInterface $sentryHub
     */
    public function __construct(TransportInterface $transport, SentryHubInterface $sentryHub)
    {
        $this->transport = $transport;
        $this->sentryHub = $sentryHub;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     *
     * @return Transport\ResponseContainer
     *
     * @throws Exception
     */
    public function makeRequest($method, $url, array $options = []): Transport\ResponseContainer
    {
        try {
            return $this->transport->makeRequest($method, $url, $options);
        } catch (Exception $e) {
            $this->sentryHub->captureException($e);

            throw $e;
        }
    }
}
