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

/**
 * Factory class that helps you to build the Client
 */
class ClientFactory
{
    const GUZZLE_TRANSPORT = 'guzzle';

    private static $defaultOptions = [
        'apiToken' => null,
        'transport' => [
            'type' => self::GUZZLE_TRANSPORT,
            'httpClient' => [
                'defaults' => [
                    'exceptions' => false,
                ]
            ],
            'options' => [],
        ],
        'sendReports' => true,
        'reportableClient' => [
            'ravenClient' => [
                'optionsOrDSN' => ReportableClient::CAPPASITY_DSN,
                'options' => [
                    'timeout' => 2,
                ],
            ]
        ],
        'config' => []
    ];

    /**
     * @param array $options
     * @return Client|ReportableClient
     */
    public static function getClientInstance(array $options)
    {
        $resolvedOptions = array_replace_recursive(self::$defaultOptions, $options);
        $transportOptions = $resolvedOptions['transport']['options'];
        $httpClientConfig = $resolvedOptions['transport']['httpClient'];
        $httpClient = new \GuzzleHttp\Client($httpClientConfig);
        $apiToken = $resolvedOptions['apiToken'];

        if ($resolvedOptions['transport']['type'] === self::GUZZLE_TRANSPORT) {
            $transport = new \CappasitySDK\Transport\Guzzle6($httpClient, $transportOptions);
        } else {
            throw new \LogicException(sprintf('Unhandled transport type %s', $resolvedOptions['transport']));
        }

        $validator = ValidatorWrapper::setUpInstance();
        $responseAdapter = new ResponseAdapter();
        $clientConfig = $resolvedOptions['config'];

        $client = new Client($transport, $apiToken, $validator, $responseAdapter, $clientConfig);

        if ($resolvedOptions['sendReports'] === true) {
            $ravenOptions = $resolvedOptions['reportableClient']['ravenClient'];
            $ravenClient = new \Raven_Client($ravenOptions['optionsOrDSN'], $ravenOptions['options']);
            $client = new ReportableClient($client, $ravenClient);
        }

        return $client;
    }
}
