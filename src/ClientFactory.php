<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licensed only to registered users of the Cappasity platform.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 * @author    Cappasity Inc <info@cappasity.com>
 * @copyright 2019-2023 Cappasity Inc.
 */

namespace CappasitySDK;

use CappasitySDK\Transport\Guzzle7;
use LogicException;
use Sentry\ClientBuilder as SentryClientBuilder;
use Sentry\State\Hub;
use Sentry\State\Scope;

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
            'sentryHub' => [
                'dsn' => ReportableClient::CAPPASITY_DSN,
            ],
        ],
        'config' => []
    ];

    /**
     * @param array $options
     * @return Client|ReportableClient
     * @throws Client\Exception\InvalidConfigValueException
     */
    public static function getClientInstance(array $options)
    {
        $resolvedOptions = array_replace_recursive(self::$defaultOptions, $options);
        $transportOptions = $resolvedOptions['transport']['options'];
        $httpClientConfig = $resolvedOptions['transport']['httpClient'];
        $httpClient = new \GuzzleHttp\Client($httpClientConfig);
        $apiToken = $resolvedOptions['apiToken'];

        if ($resolvedOptions['transport']['type'] === self::GUZZLE_TRANSPORT) {
            $transport = new Guzzle7($httpClient, $transportOptions);
        } else {
            throw new LogicException(sprintf('Unhandled transport type %s', $resolvedOptions['transport']));
        }

        $validator = ValidatorWrapper::setUpInstance();
        $responseAdapter = new ResponseAdapter();
        $clientConfig = $resolvedOptions['config'];

        $client = new Client($transport, $apiToken, $validator, $responseAdapter, $clientConfig);

        if ($resolvedOptions['sendReports'] === true) {
            $sentryOptions = $resolvedOptions['reportableClient']['sentryHub'];
            $sentryClientBuilder = SentryClientBuilder::create($sentryOptions);
            $sentryClient = $sentryClientBuilder->getClient();
            $stateScope = new Scope();
            $sentryHub = new Hub($sentryClient, $stateScope);
            $client = new ReportableClient($client, $sentryHub);
        }

        return $client;
    }
}
