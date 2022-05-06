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

class ReportableTransport implements TransportInterface
{
    /**
     * @var TransportInterface
     */
    private $transport;

    /**
     * @var \Raven_Client
     */
    private $ravenClient;

    /**
     * @param TransportInterface $transport
     * @param \Raven_Client $ravenClient
     */
    public function __construct(TransportInterface $transport, \Raven_Client $ravenClient)
    {
        $this->transport = $transport;
        $this->ravenClient = $ravenClient;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     *
     * @return Transport\ResponseContainer
     *
     * @throws \Exception
     */
    public function makeRequest($method, $url, array $options = [])
    {
        try {
            return $this->transport->makeRequest($method, $url, $options);
        } catch (\Exception $e) {
            $this->ravenClient->captureException($e);

            throw $e;
        }
    }
}
