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

namespace Tests\Client\Model\Callback;

use CappasitySDK\Client\Model\Callback\Process\JobsPushResultPost;

class JobsPushResultPostTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createFromResponseProvider
     *
     * @param $body
     */
    public function testCreateFromResponse($body)
    {
        /** @var JobsPushResultPost\SyncDataItem[]|JobsPushResultPost $matches */
        $matches = \CappasitySDK\Client\Model\Callback\Process\JobsPushResultPost::fromCallbackBody($body);

        $this->assertEquals(count($body), count($matches));
        foreach ($matches as $position => $match) {
            $this->assertEquals($body[$position]['id'], $match->getId());
            $this->assertEquals($body[$position]['uploadId'], $match->getUploadId());
            $this->assertEquals($body[$position]['sku'] ?? null, $match->getSku());
            $this->assertEquals($body[$position]['capp'] ?? null, $match->getCapp());
        }
    }

    public function createFromResponseProvider()
    {
        return [
            [
                [],
            ],
            [
                [
                    [
                        'id' => '123',
                        'uploadId' => '9473eb1e-3fa6-4e75-aa34-6c4e01f10ff5',
                        'sku' => 'Bear',
                    ],
                    [
                        'id' => '124',
                        'uploadId' => false,
                        'capp' => '9473eb1e-3fa6-4e75-aa34-6c4e01fabd64'
                    ]
                ]
            ]
        ];
    }
}
