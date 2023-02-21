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

namespace CappasitySDK\Tests\Unit;

class ClientFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testGetClientInstance()
    {
        $client = \CappasitySDK\ClientFactory::getClientInstance([
            'apiToken' => 'api.token.stub',
            'sendReports' => false,
            'config' => [
                'baseUrl' => \CappasitySDK\Client::BASE_URL_API_CAPPASITY,
            ]
        ]);

        $this->assertEquals(\CappasitySDK\Client::class, get_class($client));
        $this->assertEquals('api.token.stub', $client->getApiToken());
    }

    public function testGetClientInstanceWithReportingTurnedOn()
    {
        $client = \CappasitySDK\ClientFactory::getClientInstance([
            'apiToken' => 'api.token.stub',
        ]);

        $this->assertEquals(\CappasitySDK\ReportableClient::class, get_class($client));
    }

    public function testGetClientInstanceWithCustomReportableClientConfig()
    {
        $client = \CappasitySDK\ClientFactory::getClientInstance([
            'apiToken' => 'api.token.stub',
            'reportableClient' => [
                'ravenClient' => [
                    'optionsOrDsn' => 'https://3736a7965d59423c867105ee4ba47de2@sentry.io/137605',
                ],
            ],
        ]);

        $this->assertEquals(\CappasitySDK\ReportableClient::class, get_class($client));
    }
}
