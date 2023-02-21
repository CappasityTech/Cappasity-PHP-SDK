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

namespace CappasitySDK\Tests\Unit\Transport;

class GuzzleTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \GuzzleHttp\Client|\PHPUnit_Framework_MockObject_MockObject
     */
    private $httpClientMock;

    /**
     * @var array
     */
    private $config;

    public function setUp(): void
    {
        $this->httpClientMock = $this->getMockBuilder(\GuzzleHttp\Client::class)
            ->disableOriginalConstructor()
            ->setMethods([
                'send',
            ])
            ->getMock();

        $this->config = [];
    }

    public function testMakeRequest()
    {
        $expectedRequest = new \GuzzleHttp\Psr7\Request(
            'GET',
            'http://aaa.com?a=b',
            ['e' => 'f'],
            \GuzzleHttp\json_encode(['c' => 'd'])
        );
        $mockedResponseBody = \GuzzleHttp\Psr7\Utils::streamFor(json_encode(['data' => 'foobar']));
        $mockedResponse = new \GuzzleHttp\Psr7\Response(200, [], $mockedResponseBody);

        $this->httpClientMock
            ->expects($this->once())
            ->method('send')
            ->with(
                $this->expectGuzzleRequest($expectedRequest),
                [
                    'timeout' => 5,
                ]
            )
            ->willReturn($mockedResponse);

        $guzzleTransport = new \CappasitySDK\Transport\Guzzle7($this->httpClientMock, $this->config);
        $response = $guzzleTransport->makeRequest('GET', 'http://aaa.com', [
            'query' => ['a' => 'b'],
            'data' => ['c' => 'd'],
            'headers' => ['e' => 'f'],
            'timeout' => 5,
        ]);

        $this->assertInstanceOf(\CappasitySDK\Transport\ResponseContainer::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals([], $response->getHeaders());
        $this->assertEquals($mockedResponse, $response->getOriginalResponse());
        $this->assertEquals(['data' => 'foobar'], $response->getData());
    }

    public function testThrowExceptionOnProcessErrorResponse()
    {
        $expectedRequest = new \GuzzleHttp\Psr7\Request(
            'GET',
            'http://aaa.com?a=b',
            ['e' => 'f'],
            \GuzzleHttp\json_encode(['c' => 'd'])
        );

        $mockedResponseBody = \GuzzleHttp\Psr7\Utils::streamFor(json_encode([
            'statusCode' => 404,
            'error' => 'Not Found',
            'message' => 'job data missing',
            'name' => 'HttpStatusError'
        ]));
        $mockedResponse = new \GuzzleHttp\Psr7\Response(404, [], $mockedResponseBody);

        $this->httpClientMock
            ->expects($this->once())
            ->method('send')
            ->with(
                $this->expectGuzzleRequest($expectedRequest),
                [
                    'timeout' => 5
                ]
            )
            ->willReturn($mockedResponse);

        $guzzleTransport = new \CappasitySDK\Transport\Guzzle7($this->httpClientMock, $this->config);

        $this->expectExceptionMessage("Server responded with an error [404: Not Found]: job data missing");
        $this->expectException(\CappasitySDK\Transport\Exception\RequestException::class);
        $guzzleTransport->makeRequest('GET', 'http://aaa.com', [
            'query' => ['a' => 'b'],
            'data' => ['c' => 'd'],
            'headers' => ['e' => 'f'],
            'timeout' => 5,
        ]);
    }

    public function testThrowExceptionOnFilesErrorResponse()
    {
        $expectedRequest = new \GuzzleHttp\Psr7\Request(
            'GET',
            'http://aaa.com?a=b',
            ['e' => 'f'],
            \GuzzleHttp\json_encode(['c' => 'd'])
        );

        $mockedResponseBody = json_encode([
            'meta' => [
                'id' => 'd715ee2b-aea5-4f78-94ee-c7ec3bfaad40'
            ],
            'errors' => [
                [
                    'status' => 'HttpStatusError',
                    'code' => 404,
                    'title' => 'could not find associated data',
                    'detail' => [],
                ],
            ],
        ]);
        $mockedResponse = new \GuzzleHttp\Psr7\Response(404, [], $mockedResponseBody);

        $this->httpClientMock
            ->expects($this->once())
            ->method('send')
            ->with(
                $this->expectGuzzleRequest($expectedRequest),
                [
                    'timeout' => 5,
                ]
            )
            ->willReturn($mockedResponse);

        $guzzleTransport = new \CappasitySDK\Transport\Guzzle7($this->httpClientMock, $this->config);

        $this->expectExceptionMessage("Server responded with an error [404]: could not find associated data (detail: none)");
        $this->expectException(\CappasitySDK\Transport\Exception\RequestException::class);
        $guzzleTransport->makeRequest('GET', 'http://aaa.com', [
            'query' => ['a' => 'b'],
            'data' => ['c' => 'd'],
            'headers' => ['e' => 'f'],
            'timeout' => 5,
        ]);
    }

    /**
     * @param \GuzzleHttp\Psr7\Request $expectedRequest
     * @return \PHPUnit_Framework_Constraint_Callback
     */
    private function expectGuzzleRequest(\GuzzleHttp\Psr7\Request $expectedRequest)
    {
        return self::callback(
            function (\GuzzleHttp\Psr7\Request $actualRequest) use ($expectedRequest) {
                return $expectedRequest->getBody()->getContents() === $actualRequest->getBody()->getContents()
                    && (string) $expectedRequest->getUri() === (string) $actualRequest->getUri()
                    && $expectedRequest->getHeaders() === $actualRequest->getHeaders();
            }
        );
    }
}
