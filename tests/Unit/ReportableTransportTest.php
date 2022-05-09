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
use CappasitySDK\Transport\ResponseContainer;

class ReportableTransportTest extends \PHPUnit\Framework\TestCase
{
    const STUB_IFRAME = '<iframe allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" width="100%" height="600px" frameborder="0" style="border:0;" onmousewheel="" src="https://api.cappasity.com/api/player/9473eb1e-3fa6-4e75-aa34-6c4e01f10ff5/embedded?autorun=0&closebutton=1&logo=1&autorotate=0&autorotatetime=10&autorotatedelay=2&autorotatedir=1&hidefullscreen=1&hideautorotateopt=1&hidesettingsbtn=0"></iframe>';

    /**
     * @var \CappasitySDK\TransportInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $basicTransportMock;

    /**
     * @var \Sentry\State\HubInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $sentryHubMock;

    public function setUp(): void
    {
        parent::setUp();

        $this->basicTransportMock = $this->getMockBuilder(\CappasitySDK\Transport\Guzzle7::class)
            ->disableOriginalConstructor()
            ->setMethods(['makeRequest'])
            ->getMock();

        $this->sentryHubMock = $this->getMockBuilder(\Sentry\State\HubInterface::class)
            ->disableOriginalConstructor()
            // Since we mock an interface we are required to implement all its methods (all except none)
            ->setMethodsExcept()
            ->getMock();
    }

    public function testMakeRequest()
    {
        $transport = new ReportableTransport($this->basicTransportMock, $this->sentryHubMock);
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

        $this->sentryHubMock
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

    public function testMakeRequestAndCaptureException()
    {
        $transport = new ReportableTransport($this->basicTransportMock, $this->sentryHubMock);

        $mockedException = new \CappasitySDK\Client\Exception\RequestException();

        $this->basicTransportMock
            ->expects($this->once())
            ->method('makeRequest')
            ->willThrowException($mockedException);

        $this->sentryHubMock
            ->expects($this->once())
            ->method('captureException')
            ->with($mockedException);

        $this->expectException(\CappasitySDK\Client\Exception\RequestException::class);
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
     * @param int $code
     * @param array $data
     * @param array $headers
     * @return ResponseContainer
     */
    private function makeTransportResponseContainer($code, array $data, $headers = []): ResponseContainer
    {
        $mockedResponseBody = \GuzzleHttp\Psr7\Utils::streamFor(json_encode($data));
        $mockedOriginalResponse = new \GuzzleHttp\Psr7\Response($code, $headers, $mockedResponseBody);

        return new ResponseContainer($code, $headers, $data, $mockedOriginalResponse);
    }
}
