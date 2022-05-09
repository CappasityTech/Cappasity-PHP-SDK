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

namespace CappasitySDK\Tests\Unit;

use CappasitySDK\ReportableTransport;

class ReportableTransportTest extends \PHPUnit\Framework\TestCase
{
    const STUB_IFRAME = '<iframe allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" width="100%" height="600px" frameborder="0" style="border:0;" onmousewheel="" src="https://api.cappasity.com/api/player/9473eb1e-3fa6-4e75-aa34-6c4e01f10ff5/embedded?autorun=0&closebutton=1&logo=1&autorotate=0&autorotatetime=10&autorotatedelay=2&autorotatedir=1&hidefullscreen=1&hideautorotateopt=1&hidesettingsbtn=0"></iframe>';

    /**
     * @var \CappasitySDK\TransportInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $basicTransportMock;

    /**
     * @var \Raven_Client|\PHPUnit_Framework_MockObject_MockObject
     */
    private $ravenClientMock;

    public function setUp()
    {
        parent::setUp();

        $this->basicTransportMock = $this->getMockBuilder(\CappasitySDK\Transport\Guzzle6::class)
            ->disableOriginalConstructor()
            ->setMethods(['makeRequest'])
            ->getMock();

        $this->ravenClientMock = $this->getMockBuilder(\Raven_Client::class)
            ->disableOriginalConstructor()
            ->setMethods(['captureException'])
            ->getMock();
    }

    public function testMakeRequest()
    {
        $transport = new ReportableTransport($this->basicTransportMock, $this->ravenClientMock);
        $mockedResponseData = [
            'meta'=> [
                'id' => 'd86d4a7c-7cdb-4c00-9d46-dfadafcebd7c',
            ],
            'data' => self::STUB_IFRAME,
        ];
        $mockedTransportResponseContainer = $this->makeTransportResponseContainer(200, $mockedResponseData);

        $this->basicTransportMock
            ->expects($this->once())
            ->method('makeRequest')
            ->with(
                'POST',
                'https://api.cappasity.com/api/files/embed',
                [
                    'headers' => [
                        'authorization' => "Bearer api.token.stub",
                    ],
                    'data' => [
                        'data' => [
                            'id' => 'Bear',
                            'type' => 'sku',
                        ],
                    ],
                    'timeout' => 5
                ]
            )
            ->willReturn($mockedTransportResponseContainer);

        $this->ravenClientMock
            ->expects($this->never())
            ->method('captureException');

        $transport->makeRequest(
            'POST',
            'https://api.cappasity.com/api/files/embed',
            [
                'headers' => [
                    'authorization' => "Bearer api.token.stub",
                ],
                'data' => [
                    'data' => [
                        'id' => 'Bear',
                        'type' => 'sku',
                    ],
                ],
                'timeout' => 5,
            ]
        );
    }

    /**
     * @expectedException \CappasitySDK\Client\Exception\RequestException
     */
    public function testMakeRequestAndCaptureException()
    {
        $transport = new ReportableTransport($this->basicTransportMock, $this->ravenClientMock);

        $mockedException = new \CappasitySDK\Client\Exception\RequestException();

        $this->basicTransportMock
            ->expects($this->once())
            ->method('makeRequest')
            ->willThrowException($mockedException);

        $this->ravenClientMock
            ->expects($this->once())
            ->method('captureException')
            ->with($mockedException, null, null, null);

        $transport->makeRequest('POST', '/api/files/embed', [
            'headers' => [
                'authorization' => "Bearer api.token.stub",
            ],
            'data' => [
                'data' => [
                    'id' => 'Bear',
                    'type' => 'sku',
                ],
            ],
        ]);
    }

    /**
     * @param $code
     * @param array $data
     * @param array $headers
     * @return \CappasitySDK\Transport\ResponseContainer
     */
    private function makeTransportResponseContainer($code, array $data, $headers = [])
    {
        $mockedResponseBody = \GuzzleHttp\Psr7\stream_for(json_encode($data));
        $mockedOriginalResponse = new \GuzzleHttp\Psr7\Response($code, $headers, $mockedResponseBody);

        return new \CappasitySDK\Transport\ResponseContainer($code, $headers, $data, $mockedOriginalResponse);
    }
}
