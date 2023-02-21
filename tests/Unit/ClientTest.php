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

use CappasitySDK\Client;
use CappasitySDK\Transport\ResponseContainer;

class ClientTest extends \PHPUnit\Framework\TestCase
{
    const STUB_API_TOKEN = 'api.token.stub';
    const STUB_SKU = 'Bear';
    const STUB_FILE_ID = '38020fdf-5e11-411c-9116-1610339d59cf';
    const STUB_IFRAME = '<iframe allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" width="100%" height="600px" frameborder="0" style="border:0;" onmousewheel="" src="https://api.cappasity.com/api/player/9473eb1e-3fa6-4e75-aa34-6c4e01f10ff5/embedded?autorun=0&closebutton=1&logo=1&autorotate=0&autorotatetime=10&autorotatedelay=2&autorotatedir=1&hidefullscreen=1&hideautorotateopt=1&hidesettingsbtn=0"></iframe>';

    /**
     * @var \CappasitySDK\TransportInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $transportMock;

    /**
     * @var string
     */
    private $apiToken;

    /**
     * @var \CappasitySDK\ValidatorWrapper|\PHPUnit_Framework_MockObject_MockObject
     */
    private $validatorMock;

    /**
     * @var \CappasitySDK\ResponseAdapter|\PHPUnit_Framework_MockObject_MockObject
     */
    private $responseAdapterMock;

    /**
     * @var array
     */
    private $config;

    protected function setUp(): void
    {
        parent::setUp();

        $this->transportMock = $this->getMockBuilder(\CappasitySDK\Transport\Guzzle7::class)
            ->disableOriginalConstructor()
            ->setMethods(['makeRequest'])
            ->getMock();

        $this->apiToken = self::STUB_API_TOKEN;

        $this->validatorMock = $this->getMockBuilder(\CappasitySDK\ValidatorWrapper::class)
            ->disableOriginalConstructor()
            ->setMethods(['assert', 'buildByType'])
            ->getMock();

        $this->responseAdapterMock = $this->getMockBuilder(\CappasitySDK\ResponseAdapter::class)
            ->disableOriginalConstructor()
            ->setMethods(['transform'])
            ->getMock();

        $this->config = [
            'baseUrl' => \CappasitySDK\Client::BASE_URL_API_CAPPASITY
        ];
    }

    public function testRegisterPullSyncJob()
    {
        $client = $this->makeClient();
        $requestParams = Client\Model\Request\Process\JobsRegisterSyncPost::fromData(
            [
                [
                    'id' => 'inner-product-id',
                    'aliases' => ['Bear'],
                    'capp' => self::STUB_FILE_ID,
                ],
            ],
            'pull'
        );
        $mockedResponseData = [
            'data' => [
                'id' => '169da70c-9eda-4e80-b45d-efe0475810f6:1',
                'type' => 'sync',
                'attributes' => [
                    'type' => 'pull',
                    'gzip' => true,
                ],
            ],
        ];
        $mockedTransportResponse = $this->makeTransportResponseContainer(200, $mockedResponseData);
        $mockedClientResponse = $this->makeClientResponseContainer(
            $mockedTransportResponse,
            Client\Model\Response\Process\JobsRegisterSyncPost::class
        );

        $this->expectValidationPerformed(
            $requestParams,
            Client\Validator\Type\Request\Process\JobsRegisterSyncPost::class
        );
        $this->expectRequestMade(
            [
                'POST',
                'https://api.cappasity.com/api/cp/jobs/register/sync',
                [
                    'headers' => [
                        'authorization' => "Bearer {$this->apiToken}",
                    ],
                    'data' => [
                        'data' => [
                            [
                                'id' => 'inner-product-id',
                                'type' => 'product',
                                'attributes' => [
                                    'aliases' => ['Bear'],
                                    'capp' => self::STUB_FILE_ID,
                                ]
                            ],
                        ],
                        'meta' => [
                            'type' => 'pull',
                        ],
                    ],
                    'timeout' => 5,
                ]
            ],
            $mockedTransportResponse
        );
        $this->expectResponseTransformed(
            [$mockedTransportResponse, Client\Model\Response\Process\JobsRegisterSyncPost::class],
            $mockedClientResponse
        );

        $actualResponse = $client->registerSyncJob($requestParams);

        $this->assertEquals(200, $actualResponse->getStatusCode());

        /** @var Client\Model\Response\Process\JobsRegisterSyncPost $actualResponseData */
        $actualResponseData = $actualResponse->getBodyData();

        $this->assertEquals('169da70c-9eda-4e80-b45d-efe0475810f6:1', $actualResponseData->getData()->getId());
        $this->assertEquals('sync', $actualResponseData->getData()->getType());
        $this->assertEquals('pull', $actualResponseData->getData()->getAttributes()->getType());
        $this->assertEquals(true, $actualResponseData->getData()->getAttributes()->getGzip());
    }

    public function testRegisterPushSyncJob()
    {
        $client = $this->makeClient();
        $requestParams = Client\Model\Request\Process\JobsRegisterSyncPost::fromData(
            [
                [
                    'id' => 'inner-product-id',
                    'aliases' => ['Bear'],
                    'capp' => self::STUB_FILE_ID,
                ],
            ],
            'push.http',
            'http://somewhere.com/over/the/rainbow'
        );
        $mockedResponseData = [
            'data' => [
                'id' => '169da70c-9eda-4e80-b45d-efe0475810f6:1',
                'type' => 'sync',
                'attributes' => [
                    'type' => 'push.http',
                    'gzip' => true,
                ],
            ],
        ];
        $mockedTransportResponse = $this->makeTransportResponseContainer(200, $mockedResponseData);
        $mockedClientResponse = $this->makeClientResponseContainer(
            $mockedTransportResponse,
            Client\Model\Response\Process\JobsRegisterSyncPost::class
        );

        $this->expectValidationPerformed(
            $requestParams,
            Client\Validator\Type\Request\Process\JobsRegisterSyncPost::class
        );
        $this->expectRequestMade(
            [
                'POST',
                'https://api.cappasity.com/api/cp/jobs/register/sync',
                [
                    'headers' => [
                        'authorization' => "Bearer {$this->apiToken}",
                    ],
                    'data' => [
                        'data' => [
                            [
                                'id' => 'inner-product-id',
                                'type' => 'product',
                                'attributes' => [
                                    'aliases' => ['Bear'],
                                    'capp' => self::STUB_FILE_ID,
                                ]
                            ],
                        ],
                        'meta' => [
                            'type' => 'push.http',
                            'callback' => 'http://somewhere.com/over/the/rainbow',
                        ],
                    ],
                    'timeout' => 5,
                ]
            ],
            $mockedTransportResponse
        );
        $this->expectResponseTransformed(
            [$mockedTransportResponse, Client\Model\Response\Process\JobsRegisterSyncPost::class],
            $mockedClientResponse
        );

        $actualResponse = $client->registerSyncJob($requestParams);

        $this->assertEquals(200, $actualResponse->getStatusCode());

        /** @var Client\Model\Response\Process\JobsRegisterSyncPost $actualResponseData */
        $actualResponseData = $actualResponse->getBodyData();

        $this->assertEquals('169da70c-9eda-4e80-b45d-efe0475810f6:1', $actualResponseData->getData()->getId());
        $this->assertEquals('sync', $actualResponseData->getData()->getType());
        $this->assertEquals('push.http', $actualResponseData->getData()->getAttributes()->getType());
        $this->assertEquals(true, $actualResponseData->getData()->getAttributes()->getGzip());
    }

    public function testGetPullJobsList()
    {
        $client = new Client(
            $this->transportMock,
            $this->apiToken,
            $this->validatorMock,
            $this->responseAdapterMock,
            $this->config
        );
        $requestParams = Client\Model\Request\Process\JobsPullListGet::fromData(null, null);
        $mockedResponseData = [
            'meta' => [
                'cursor' => 1536334268895,
                'limit' => 10,
            ],
            'data' => [
                [
                    'id' => '169da70c-9eda-4e80-b45d-efe0475810f6:1',
                    'type' => 'sync',
                    'attributes' => [
                        'status' => 'success',
                    ],
                ],
            ],
        ];
        $mockedTransportResponse = $this->makeTransportResponseContainer(200, $mockedResponseData);
        $mockedClientResponse = $this->makeClientResponseContainer(
            $mockedTransportResponse,
            Client\Model\Response\Process\JobsPullListGet::class
        );
        $this->expectValidationPerformed(
            $requestParams,
            Client\Validator\Type\Request\Process\JobsPullListGet::class
        );
        $this->expectRequestMade(
            [
                'GET',
                'https://api.cappasity.com/api/cp/jobs/pull/list',
                [
                    'headers' => [
                        'authorization' => "Bearer {$this->apiToken}",
                    ],
                    'query' => [],
                    'timeout' => 5,
                ]
            ],
            $mockedTransportResponse
        );
        $this->expectResponseTransformed(
            [$mockedTransportResponse, Client\Model\Response\Process\JobsPullListGet::class],
            $mockedClientResponse
        );

        $actualResponse = $client->getPullJobList($requestParams);

        $this->assertEquals(200, $actualResponse->getStatusCode());

        /** @var Client\Model\Response\Process\JobsPullListGet $actualResponseData */
        $actualResponseData = $actualResponse->getBodyData();

        $this->assertEquals(1536334268895, $actualResponseData->getMeta()->getCursor());
        $this->assertEquals(10, $actualResponseData->getMeta()->getLimit());
        $this->assertEquals('169da70c-9eda-4e80-b45d-efe0475810f6:1', $actualResponseData->getData()[0]->getId());
        $this->assertEquals('sync', $actualResponseData->getData()[0]->getType());
        $this->assertEquals('success', $actualResponseData->getData()[0]->getAttributes()->getStatus());
    }

    public function testGetPullJobsListWithLimitAndCursor()
    {
        $client = $this->makeClient();
        $requestParams = Client\Model\Request\Process\JobsPullListGet::fromData(30, 1536334268895);
        $mockedResponseData = [
            'meta' => [
                'cursor' => 1536334268895,
                'limit' => 30,
            ],
            'data' => [
                [
                    'id' => '169da70c-9eda-4e80-b45d-efe0475810f6:1',
                    'type' => 'sync',
                    'attributes' => [
                        'status' => 'success',
                    ],
                ],
            ],
        ];
        $mockedTransportResponse = $this->makeTransportResponseContainer(200, $mockedResponseData);
        $mockedClientResponse = $this->makeClientResponseContainer(
            $mockedTransportResponse,
            Client\Model\Response\Process\JobsPullListGet::class
        );
        $this->expectValidationPerformed(
            $requestParams,
            Client\Validator\Type\Request\Process\JobsPullListGet::class
        );
        $this->expectRequestMade(
            [
                'GET',
                'https://api.cappasity.com/api/cp/jobs/pull/list',
                [
                    'headers' => [
                        'authorization' => "Bearer {$this->apiToken}",
                    ],
                    'query' => [
                        'limit' => 30,
                        'cursor' => 1536334268895,
                    ],
                    'timeout' => 5,
                ]
            ],
            $mockedTransportResponse
        );
        $this->expectResponseTransformed(
            [$mockedTransportResponse, Client\Model\Response\Process\JobsPullListGet::class],
            $mockedClientResponse
        );

        $actualResponse = $client->getPullJobList($requestParams);

        $this->assertEquals(200, $actualResponse->getStatusCode());

        /** @var Client\Model\Response\Process\JobsPullListGet $actualResponseData */
        $actualResponseData = $actualResponse->getBodyData();

        $this->assertEquals(1536334268895, $actualResponseData->getMeta()->getCursor());
        $this->assertEquals(30, $actualResponseData->getMeta()->getLimit());
        $this->assertEquals('169da70c-9eda-4e80-b45d-efe0475810f6:1', $actualResponseData->getData()[0]->getId());
        $this->assertEquals('sync', $actualResponseData->getData()[0]->getType());
        $this->assertEquals('success', $actualResponseData->getData()[0]->getAttributes()->getStatus());
    }

    public function testAckPullJobList()
    {
        $client = $this->makeClient();
        $requestParams = Client\Model\Request\Process\JobsPullAckPost::fromData(['a9673347-8f2e-4caa-83e9-4139d7473c2f:A1']);
        $mockedResponseData = [
            'data' => [
                'ack' => 1,
            ],
        ];
        $mockedTransportResponse = $this->makeTransportResponseContainer(200, $mockedResponseData);
        $mockedClientResponse = $this->makeClientResponseContainer(
            $mockedTransportResponse,
            Client\Model\Response\Process\JobsPullAckPost::class
        );
        $this->expectValidationPerformed(
            $requestParams,
            Client\Validator\Type\Request\Process\JobsPullAckPost::class
        );
        $this->expectRequestMade(
            [
                'POST',
                'https://api.cappasity.com/api/cp/jobs/pull/ack',
                [
                    'headers' => [
                        'authorization' => "Bearer {$this->apiToken}",
                    ],
                    'data' => [
                        'data' => [
                            [
                                'id' => 'a9673347-8f2e-4caa-83e9-4139d7473c2f:A1',
                                'type' => 'sync'
                            ],
                        ],
                    ],
                    'timeout' => 5,
                ],
            ],
            $mockedTransportResponse
        );
        $this->expectResponseTransformed(
            [$mockedTransportResponse, Client\Model\Response\Process\JobsPullAckPost::class],
            $mockedClientResponse
        );

        $actualResponse = $client->ackPullJobList($requestParams);

        $this->assertEquals(200, $actualResponse->getStatusCode());
        /** @var Client\Model\Response\Process\JobsPullAckPost $actualResponseData */
        $actualResponseData = $actualResponse->getBodyData();

        $this->assertEquals(1, $actualResponseData->getData()->getAck());
    }

    public function testGetPullJobResult()
    {
        $client = $this->makeClient();
        $requestParams = Client\Model\Request\Process\JobsPullResultGet::fromData('a9673347-8f2e-4caa-83e9-4139d7473c2f:A1');
        $mockedResponseData = [
            'meta' => [
                'jobId' => 'a9673347-8f2e-4caa-83e9-4139d7473c2f:A1',
                //'jobType' => 'sync',
            ],
            'data' => [
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
            ],
        ];
        $mockedTransportResponse = $this->makeTransportResponseContainer(200, $mockedResponseData);
        $mockedClientResponse = $this->makeClientResponseContainer(
            $mockedTransportResponse,
            Client\Model\Response\Process\JobsPullResultGet::class
        );
        $this->expectValidationPerformed(
            $requestParams,
            Client\Validator\Type\Request\Process\JobsPullResultGet::class
        );
        $this->expectRequestMade(
            [
                'GET',
                'https://api.cappasity.com/api/cp/jobs/pull/result',
                [
                    'headers' => [
                        'authorization' => "Bearer {$this->apiToken}",
                    ],
                    'query' => [
                        'id' => 'a9673347-8f2e-4caa-83e9-4139d7473c2f:A1',
                    ],
                    'timeout' => 5
                ]
            ],
            $mockedTransportResponse
        );
        $this->expectResponseTransformed(
            [$mockedTransportResponse, Client\Model\Response\Process\JobsPullResultGet::class],
            $mockedClientResponse
        );

        $actualResponse = $client->getPullJobResult($requestParams);

        $this->assertEquals(200, $actualResponse->getStatusCode());

        /** @var Client\Model\Response\Process\JobsPullResultGet $actualResponseData */
        $actualResponseData = $actualResponse->getBodyData();

        $this->assertEquals('a9673347-8f2e-4caa-83e9-4139d7473c2f:A1', $actualResponseData->getMeta()->getJobId());
        $this->assertArrayHasKey(0, $actualResponseData->getData());
        $this->assertArrayHasKey(1, $actualResponseData->getData());
        $responseDataItem1 = $actualResponseData->getData()[0];
        $this->assertEquals('123', $responseDataItem1->getId());
        $this->assertEquals('9473eb1e-3fa6-4e75-aa34-6c4e01f10ff5', $responseDataItem1->getUploadId());
        $this->assertEquals('Bear', $responseDataItem1->getSku());
        $this->assertEquals(null, $responseDataItem1->getCapp());
        $responseDataItem2 = $actualResponseData->getData()[1];
        $this->assertEquals('124', $responseDataItem2->getId());
        $this->assertEquals(false, $responseDataItem2->getUploadId());
        $this->assertEquals(null, $responseDataItem2->getSku());
        $this->assertEquals('9473eb1e-3fa6-4e75-aa34-6c4e01fabd64', $responseDataItem2->getCapp());
    }

    public function testGetPullJobResultNoResultsYet()
    {
        $client = $this->makeClient();
        $requestParams = Client\Model\Request\Process\JobsPullResultGet::fromData('a9673347-8f2e-4caa-83e9-4139d7473c2f:A1');
        $mockedResponseData = [
            'meta' => [
                'jobId' => 'a9673347-8f2e-4caa-83e9-4139d7473c2f:A1',
                'jobType' => 'sync',
            ],
            'data' => [
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
            ],
        ];
        $mockedTransportResponse = $this->makeTransportResponseContainer(404, $mockedResponseData);
        $this->expectValidationPerformed(
            $requestParams,
            Client\Validator\Type\Request\Process\JobsPullResultGet::class
        );

        $expectedException = new \CappasitySDK\Transport\Exception\RequestException(
            'Server responded with an error [404: Not Found]: job data missing'
        );
        $expectedException->setResponse($mockedTransportResponse);
        $this->expectException(\CappasitySDK\Client\Exception\RequestException::class);
        $this->expectRequestMadeAndFailed(
            [
                'GET',
                'https://api.cappasity.com/api/cp/jobs/pull/result',
                [
                    'headers' => [
                        'authorization' => "Bearer {$this->apiToken}",
                    ],
                    'query' => [
                        'id' => 'a9673347-8f2e-4caa-83e9-4139d7473c2f:A1',
                    ],
                    'timeout' => 5
                ]
            ],
            $expectedException
        );

        $client->getPullJobResult($requestParams);
    }

    public function testGetUsersMe()
    {
        $client = $this->makeClient();
        $requestParams = new Client\Model\Request\Users\MeGet();

        $mockedResponseData = [
            'meta' => [
                'id' => '1e81be6f-2b8e-447d-813e-213b8e55069b',
            ],
            'data' => [
                'type' => 'user',
                'id' => '6397132946607702016',
                'attributes' => [
                    'firstName' => 'Alice',
                    'lastName' => 'Davis',
                    'org' => false,
                    'id' => '6397132946607702016',
                    'username' => 'alice@gmail.com',
                    'created' => 1525195347454,
                    'alias' => 'alice',
                    'plan' => 'free',
                    'agreement' => 'free',
                    'nextCycle' => 1551460973548,
                    'models' => 20,
                    'modelPrice' => 10,
                    'subscriptionPrice' => '0',
                    'subscriptionInterval' => 'month',
                    'mfa' => false,
                ],
                'links' => [
                    'self' => 'https://api.cappasity.com/api/users/6397132946607702016',
                    'user' => 'https://3d.cappasity.com/u/alice',
                ],
            ],
        ];
        $mockedTransportResponse = $this->makeTransportResponseContainer(200, $mockedResponseData);
        $mockedClientResponse = $this->makeClientResponseContainer(
            $mockedTransportResponse,
            Client\Model\Response\Users\MeGet::class
        );
        $this->expectResponseTransformed(
            [$mockedTransportResponse, Client\Model\Response\Users\MeGet::class],
            $mockedClientResponse
        );

        $this->expectValidationPerformed(
            $requestParams,
            Client\Validator\Type\Request\Users\MeGet::class
        );

        $this->expectRequestMade(
            [
                'GET',
                'https://api.cappasity.com/api/users/me',
                [
                    'headers' => [
                        'authorization' => "Bearer {$this->apiToken}",
                    ],
                    'timeout' => 5
                ]
            ],
            $mockedTransportResponse
        );

        $actualResponse = $client->getUser($requestParams);
        $this->assertInstanceOf(Client\Model\Response\Container::class, $actualResponse);
        $this->assertInstanceOf(Client\Model\Response\Users\MeGet::class, $actualResponse->getBodyData());
        /** @var Client\Model\Response\Users\MeGet $actualResponseData */
        $actualResponseData = $actualResponse->getBodyData();

        $this->assertEquals('1e81be6f-2b8e-447d-813e-213b8e55069b', $actualResponseData->getMeta()->getId());
        $this->assertEquals('6397132946607702016', $actualResponseData->getData()->getId());
        $this->assertEquals('user', $actualResponseData->getData()->getType());
        $attributes = $actualResponseData->getData()->getAttributes();
        $this->assertEquals('Alice', $attributes->getFirstName());
        $this->assertEquals('Davis', $attributes->getLastName());
        $this->assertEquals(false, $attributes->getOrg());
        $this->assertEquals('6397132946607702016', $attributes->getId());
        $this->assertEquals('alice@gmail.com', $attributes->getUsername());
        $this->assertEquals(1525195347454, $attributes->getCreated());
        $this->assertEquals('alice', $attributes->getAlias());
        $this->assertEquals('free', $attributes->getPlan());
        $this->assertEquals('free', $attributes->getAgreement());
        $this->assertEquals(1551460973548, $attributes->getNextCycle());
        $this->assertEquals(20, $attributes->getModels());
        $this->assertEquals(10, $attributes->getModelsPrice());
        $this->assertEquals('0', $attributes->getSubscriptionPrice());
        $this->assertEquals('month', $attributes->getSubscriptionInterval());
        $this->assertEquals(false, $attributes->getMfa());
        $this->assertEquals(
            'https://api.cappasity.com/api/users/6397132946607702016',
            $actualResponseData->getData()->getLinks()->getSelf()
        );
        $this->assertEquals(
            'https://3d.cappasity.com/u/alice',
            $actualResponseData->getData()->getLinks()->getUser()
        );
    }

    public function testGetFilesInfo()
    {
        $client = $this->makeClient();
        $requestParams = Client\Model\Request\Files\InfoGet::fromData(
            'alice',
            'dd596de4-ae2b-4d66-a023-242ca7d86b51'
        );

        $mockedResponseData = [
            'meta' => [
                'id' => '0b29e0dd-0e93-4acb-ab64-dc1a9ca20f03',
            ],
            'data' => [
                'type' => 'file',
                'id' => 'dd596de4-ae2b-4d66-a023-242ca7d86b51',
                'attributes' => [
                    'alias' => 'pinkclutch',
                    'backgroundColor' => '#FFFFFF',
                    'backgroundImage' => '',
                    'bucket' => 'cdn.cappasity.com',
                    'c_ver' => '4.1.0',
                    'contentLength' => 10874630,
                    'files' => [
                        [
                            'contentLength' => 30621,
                            'contentType' => 'image/jpeg',
                            'md5Hash' => 's4gKmXq1WC7ItJAf4ERhqA==',
                            'bucket' => 'cdn.cappasity.com',
                            'type' => 'c-preview',
                            'filename' => '4b528066036d2c07e6b9b53784509913/dd596de4-ae2b-4d66-a023-242ca7d86b51/7d001be0-4506-41d3-8bdb-66fd6fecae65.jpeg',
                        ],
                        [
                            'contentLength' => 21356,
                            'contentType' => 'image/vnd.cappasity',
                            'md5Hash' => 'RttYE61A6QvrVia5RIN3Kg==',
                            'bucket' => 'cdn.cappasity.com',
                            'type' => 'c-pack',
                            'filename' => '4b528066036d2c07e6b9b53784509913/dd596de4-ae2b-4d66-a023-242ca7d86b51/88893d10-ddfb-466e-a448-ea3874c169bb.pack',
                        ],
                        [
                            'contentLength' => 2790885,
                            'contentType' => 'image/vnd.cappasity',
                            'md5Hash' => 'SasLRjsWnvOTa2+Gr8CKTg==',
                            'bucket' => 'cdn.cappasity.com',
                            'type' => 'c-pack',
                            'filename' => '4b528066036d2c07e6b9b53784509913/dd596de4-ae2b-4d66-a023-242ca7d86b51/7294c37c-99dc-4e7f-aea5-bd7309035eb4.pack',
                        ],
                        [
                            'contentLength' => 8031768,
                            'contentType' => 'image/vnd.cappasity',
                            'md5Hash' => 'IADnsAfMkekgtMbuqKGMdw==',
                            'bucket' => 'cdn.cappasity.com',
                            'type' => 'c-pack',
                            'filename' => '4b528066036d2c07e6b9b53784509913/dd596de4-ae2b-4d66-a023-242ca7d86b51/f989e877-63e4-4307-9b39-f76837b5407d.pack',
                        ],
                    ],
                    'name' => 'Goddess Pink Clutch',
                    'owner' => 'alice',
                    'packed' => '1',
                    'parts' => 4,
                    'preview' => '4b528066036d2c07e6b9b53784509913/dd596de4-ae2b-4d66-a023-242ca7d86b51/7d001be0-4506-41d3-8bdb-66fd6fecae65.jpeg',
                    'public' => '1',
                    'simple' => '4b528066036d2c07e6b9b53784509913/dd596de4-ae2b-4d66-a023-242ca7d86b51/f989e877-63e4-4307-9b39-f76837b5407d.pack',
                    'startedAt' => 1525282009671,
                    'status' => 'processed',
                    'type' => 'object',
                    'uploadId' => 'dd596de4-ae2b-4d66-a023-242ca7d86b51',
                    'uploadType' => 'simple',
                    'uploaded' => 4,
                    'uploadedAt' => 1525282016275,
                    'embed' => [
                        'code' => '<iframe allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" width="{{ width }}" height="{{ height }}" frameborder="0" style="border:0;" src="https://api.cappasity.com/api/player/dd596de4-ae2b-4d66-a023-242ca7d86b51/embedded?autorun={{ autorun }}&closebutton={{ closebutton }}&logo={{ logo }}&autorotate={{ autorotate }}&autorotatetime={{ autorotatetime }}&autorotatedelay={{ autorotatedelay }}&autorotatedir={{ autorotatedir }}&hidefullscreen={{ hidefullscreen }}&hideautorotateopt={{ hideautorotateopt }}&hidesettingsbtn={{ hidesettingsbtn }}&enableimagezoom={{ enableimagezoom }}&zoomquality={{ zoomquality }}&hidezoomopt={{ hidezoomopt }}"></iframe>',
                        'params' => [
                            'autorun' => [
                                'type' => 'boolean',
                                'default' => 0,
                                'description' => 'Auto-start player',
                            ],
                            'closebutton' => [
                                'type' => 'boolean',
                                'default' => 1,
                                'description' => 'Close button',
                            ],
                            'logo' => [
                                'type' => 'boolean',
                                'own' => 0,
                                'default' => 1,
                                'description' => 'Show logo',
                                'paid' => true,
                                'reqPlanLevel' => 20,
                            ],
                            'autorotate' => [
                                'type' => 'boolean',
                                'default' => 0,
                                'description' => 'Autorotate',
                                'paid' => true,
                                'reqPlanLevel' => 30,
                            ],
                            'autorotatetime' => [
                                'type' => 'float',
                                'default' => 10,
                                'description' => 'Autorotate time, seconds',
                                'min' => 2,
                                'max' => 60,
                                'paid' => true,
                                'reqPlanLevel' => 30,
                            ],
                            'autorotatedelay' => [
                                'type' => 'float',
                                'default' => 2,
                                'description' => 'Autorotate delay, seconds',
                                'min' => 1,
                                'max' => 10,
                                'paid' => true,
                                'reqPlanLevel' => 30,
                            ],
                            'autorotatedir' => [
                                'type' => 'integer',
                                'default' => 1,
                                'description' => 'Autorotate direction',
                                'enum' => [
                                    'clockwise' => 1,
                                    'counter-clockwise' => -1,
                                ],
                                'paid' => true,
                                'reqPlanLevel' => 30,
                            ],
                            'hidefullscreen' => [
                                'type' => 'boolean',
                                'description' => 'Hide fullscreen',
                                'default' => 1,
                            ],
                            'hideautorotateopt' => [
                                'type' => 'boolean',
                                'own' => 0,
                                'default' => 1,
                                'invert' => true,
                                'description' => 'Autorotate button',
                                'paid' => true,
                                'reqPlanLevel' => 30,
                            ],
                            'hidesettingsbtn' => [
                                'type' => 'boolean',
                                'default' => 0,
                                'description' => 'Settings button',
                                'invert' => true,
                                'paid' => true,
                                'reqPlanLevel' => 30,
                            ],
                            'enableimagezoom' => [
                                'type' => 'boolean',
                                'default' => 1,
                                'description' => 'Enable zoom',
                                'paid' => true,
                                'reqPlanLevel' => 30,
                            ],
                            'zoomquality' => [
                                'type' => 'integer',
                                'default' => 1,
                                'enum' => [
                                    'SD' => 1,
                                    'HD' => 2,
                                ],
                                'description' => 'Zoom quality',
                                'paid' => true,
                                'reqPlanLevel' => 30,
                            ],
                            'hidezoomopt' => [
                                'type' => 'boolean',
                                'default' => 0,
                                'description' => 'Zoom button',
                                'paid' => true,
                                'invert' => true,
                                'reqPlanLevel' => 30,
                            ],
                            'width' => [
                                'type' => 'string',
                                'default' => '100%',
                                'description' => 'Width of embedded window (px or %)',
                            ],
                            'height' => [
                                'type' => 'string',
                                'default' => '600px',
                                'description' => 'Height of embedded window (px or %)',
                            ],
                        ],
                    ],
                ],
                'links' => [
                    'self' => 'https://api.cappasity.com/api/files/dd596de4-ae2b-4d66-a023-242ca7d86b51',
                    'owner' => 'https://api.cappasity.com/api/users/alice',
                    'player' => 'https://3d.cappasity.com/u/alice/dd596de4-ae2b-4d66-a023-242ca7d86b51',
                    'user' => 'https://3d.cappasity.com/u/alice',
                ],
            ],
        ];
        $mockedTransportResponse = $this->makeTransportResponseContainer(200, $mockedResponseData);
        $mockedClientResponse = $this->makeClientResponseContainer(
            $mockedTransportResponse,
            Client\Model\Response\Files\InfoGet::class
        );
        $this->expectResponseTransformed(
            [$mockedTransportResponse, Client\Model\Response\Files\InfoGet::class],
            $mockedClientResponse
        );

        $this->expectValidationPerformed(
            $requestParams,
            Client\Validator\Type\Request\Files\InfoGet::class
        );

        $this->expectRequestMade(
            [
                'GET',
                'https://api.cappasity.com/api/files/info/alice/dd596de4-ae2b-4d66-a023-242ca7d86b51',
                [
                    'headers' => [
                        'authorization' => "Bearer {$this->apiToken}",
                    ],
                    'timeout' => 5
                ]
            ],
            $mockedTransportResponse
        );

        $actualResponse = $client->getViewInfo($requestParams);
        $this->assertInstanceOf(Client\Model\Response\Container::class, $actualResponse);
        $this->assertInstanceOf(Client\Model\Response\Files\InfoGet::class, $actualResponse->getBodyData());
        /** @var Client\Model\Response\Files\InfoGet $actualResponseData */
        $actualResponseData = $actualResponse->getBodyData();
        $attributes = $actualResponseData->getData()->getAttributes();
        $this->assertInstanceOf(Client\Model\Response\Files\Common\File\Attributes::class, $attributes);
        $embed = $attributes->getEmbed();
        $this->assertInstanceOf(Client\Model\Response\Files\Common\File\Attributes\Embed::class, $embed);
        $embedParams = $embed->getParams();
        $this->assertInstanceOf(Client\Model\Response\Files\Common\File\Attributes\Embed\Params::class, $embedParams);
        $files = $attributes->getFiles();
        $this->assertCount(4, $files);
        $firstFile = $files[0];
        $this->assertInstanceOf(Client\Model\Response\Files\Common\File\Attributes\File::class, $firstFile);
        $links = $actualResponseData->getData()->getLinks();
        $this->assertInstanceOf(Client\Model\Response\Files\Common\File\Links::class, $links);
    }

    public function testGetPaymentsPlan()
    {
        $client = $this->makeClient();
        $requestParams = Client\Model\Request\Payments\Plans\PlanGet::fromData(
            'P-1AS44544Y0488105H5QI6O2I'
        );

        $mockedResponseData = [
            'meta' => [
                'id' => 'a3ef1a0a-c04a-444a-b447-c434351bfcf1',
            ],
            'data' => [
                'type' => 'plan',
                'id' => 'professional',
                'attributes' => [
                    'alias' => 'professional',
                    'level' => 30,
                ],
                'links' => [
                    'self' => 'https://api.cappasity.com/api/payments/plans/P-1AS44544Y0488105H5QI6O2I',
                ],
            ],
        ];
        $mockedTransportResponse = $this->makeTransportResponseContainer(200, $mockedResponseData);
        $mockedClientResponse = $this->makeClientResponseContainer(
            $mockedTransportResponse,
            Client\Model\Response\Payments\Plans\PlanGet::class
        );
        $this->expectResponseTransformed(
            [$mockedTransportResponse, Client\Model\Response\Payments\Plans\PlanGet::class],
            $mockedClientResponse
        );

        $this->expectValidationPerformed(
            $requestParams,
            Client\Validator\Type\Request\Payments\Plans\PlanGet::class
        );

        $this->expectRequestMade(
            [
                'GET',
                'https://api.cappasity.com/api/payments/plans/P-1AS44544Y0488105H5QI6O2I',
                [
                    'headers' => [
                        'authorization' => "Bearer {$this->apiToken}",
                    ],
                    'timeout' => 5
                ]
            ],
            $mockedTransportResponse
        );

        $actualResponse = $client->getPaymentsPlan($requestParams);
        $this->assertInstanceOf(Client\Model\Response\Container::class, $actualResponse);
        $this->assertInstanceOf(Client\Model\Response\Payments\Plans\PlanGet::class, $actualResponse->getBodyData());
        /** @var Client\Model\Response\Payments\Plans\PlanGet $actualResponseData */
        $actualResponseData = $actualResponse->getBodyData();

        $this->assertEquals('a3ef1a0a-c04a-444a-b447-c434351bfcf1', $actualResponseData->getMeta()->getId());
        $this->assertEquals('professional', $actualResponseData->getData()->getId());
        $this->assertEquals('plan', $actualResponseData->getData()->getType());
        $attributes = $actualResponseData->getData()->getAttributes();
        $this->assertInstanceOf(Client\Model\Response\Payments\Plans\PlanGet\Data\Attributes::class, $attributes);

        $this->assertEquals('professional', $attributes->getAlias());
        $this->assertEquals(30, $attributes->getLevel());


        $links = $actualResponseData->getData()->getLinks();

        $this->assertEquals(
            'https://api.cappasity.com/api/payments/plans/P-1AS44544Y0488105H5QI6O2I',
            $links->getSelf()
        );
    }

    public function testGetViewListIterator()
    {
        $client = $this->makeClient();

        // mocks
        $mockedResponseDataPage1 = $this->getViewListMockedResponse(1, 2, '698c86d4-e68e-4bc0-80b0-a58e57e59a5b');
        $mockedResponseDataPage2 = $this->getViewListMockedResponse(2, 2, '698c86d4-e68e-4bc0-80b0-a58e57e59a5c');
        $mockedTransportResponse1 = $this->makeTransportResponseContainer(200, $mockedResponseDataPage1);
        $mockedTransportResponse2 = $this->makeTransportResponseContainer(200, $mockedResponseDataPage2);
        $mockedClientResponse1 = $this->makeClientResponseContainer(
            $mockedTransportResponse1,
            Client\Model\Response\Files\ListGet::class
        );
        $mockedClientResponse2 = $this->makeClientResponseContainer(
            $mockedTransportResponse2,
            Client\Model\Response\Files\ListGet::class
        );

        $typeValidatorMock1 = $this->getMockBuilder(\Respect\Validation\Validator::class)->getMock();
        $typeValidatorMock2 = $this->getMockBuilder(\Respect\Validation\Validator::class)->getMock();

        $this->validatorMock
            ->method('buildByType')
            ->withConsecutive(
                [Client\Validator\Type\Request\Files\ListGet::class],
                [Client\Validator\Type\Request\Files\ListGet::class]
            )
            ->willReturnOnConsecutiveCalls(
                $typeValidatorMock1,
                $typeValidatorMock2
            );

        $this->validatorMock
            ->method('assert')
            ->withConsecutive(
                [$this->isInstanceOf(Client\Model\Request\Files\ListGet::class), $typeValidatorMock1],
                [$this->isInstanceOf(Client\Model\Request\Files\ListGet::class), $typeValidatorMock2]
            )
            ->willReturnOnConsecutiveCalls(
                true,
                true
            );

        $this->responseAdapterMock
            ->method('transform')
            ->withConsecutive(
                [$mockedTransportResponse1, Client\Model\Response\Files\ListGet::class],
                [$mockedTransportResponse2, Client\Model\Response\Files\ListGet::class]
            )
            ->willReturnOnConsecutiveCalls(
                $mockedClientResponse1,
                $mockedClientResponse2
            );

        $this->transportMock
            ->method('makeRequest')
            ->withConsecutive(
                [
                    'GET',
                    'https://api.cappasity.com/api/files',
                    [
                        'headers' => [
                            'authorization' => "Bearer {$this->apiToken}",
                        ],
                        'timeout' => 7,
                        'query' => [
                            'limit' => 1,
                        ],
                    ],
                ],
                [
                    'GET',
                    'https://api.cappasity.com/api/files',
                    [
                        'headers' => [
                            'authorization' => "Bearer {$this->apiToken}",
                        ],
                        'timeout' => 7,
                        'query' => [
                            'limit' => 1,
                            'offset' => 1,
                        ],
                    ],
                ]
            )
            ->willReturnOnConsecutiveCalls(
                $mockedTransportResponse1,
                $mockedTransportResponse2
            );

        $viewList = $client->getViewListIterator(Client\Model\Request\Files\ListGet::fromData(1));
        $fileIds = [];

        foreach ($viewList as $chunk) {
            $chunkFileIds = array_map(
                function (Client\Model\Response\Files\Common\File $file) {
                    return $file->getId();
                },
                $chunk->getBodyData()->getData()
            );
            array_push($fileIds, ...$chunkFileIds);
        }

        $this->assertEquals(['698c86d4-e68e-4bc0-80b0-a58e57e59a5b', '698c86d4-e68e-4bc0-80b0-a58e57e59a5c'], $fileIds);
    }

    public function testGetViewList()
    {
        $client = $this->makeClient();
        $requestParams = Client\Model\Request\Files\ListGet::fromData(1);
        $mockedResponseData = $this->getViewListMockedResponse(1, 410, '698c86d4-e68e-4bc0-80b0-a58e57e59a5b');
        $mockedTransportResponse = $this->makeTransportResponseContainer(200, $mockedResponseData);
        $mockedClientResponse = $this->makeClientResponseContainer(
            $mockedTransportResponse,
            Client\Model\Response\Files\ListGet::class
        );
        $this->expectResponseTransformed(
            [$mockedTransportResponse, Client\Model\Response\Files\ListGet::class],
            $mockedClientResponse
        );

        $this->expectValidationPerformed(
            $requestParams,
            Client\Validator\Type\Request\Files\ListGet::class
        );

        $this->expectRequestMade(
            [
                'GET',
                'https://api.cappasity.com/api/files',
                [
                    'headers' => [
                        'authorization' => "Bearer {$this->apiToken}",
                    ],
                    'timeout' => 7,
                    'query' => [
                        'limit' => 1,
                    ]
                ]
            ],
            $mockedTransportResponse
        );

        $actualResponse = $client->getViewList($requestParams);
        $this->assertInstanceOf(Client\Model\Response\Container::class, $actualResponse);
        $this->assertInstanceOf(Client\Model\Response\Files\ListGet::class, $actualResponse->getBodyData());
    }

    public function testGetViewListWithFullQuery()
    {
        $client = $this->makeClient();
        $requestParams = Client\Model\Request\Files\ListGet::fromData(
            1,
            1,
            'name',
            Client\Model\Request\Files\ListGet::ORDER_ASC,
            ['alias' => [Client\Model\Request\Files\ListGet::FILTER_MATCH => 'foobar']],
            ['tag1'],
            true
        );
        $mockedResponseData = $this->getViewListMockedResponse(2, 1, '698c86d4-e68e-4bc0-80b0-a58e57e59a5b');
        $mockedTransportResponse = $this->makeTransportResponseContainer(200, $mockedResponseData);
        $mockedClientResponse = $this->makeClientResponseContainer(
            $mockedTransportResponse,
            Client\Model\Response\Files\ListGet::class
        );
        $this->expectResponseTransformed(
            [$mockedTransportResponse, Client\Model\Response\Files\ListGet::class],
            $mockedClientResponse
        );

        $this->expectValidationPerformed(
            $requestParams,
            Client\Validator\Type\Request\Files\ListGet::class
        );

        $this->expectRequestMade(
            [
                'GET',
                'https://api.cappasity.com/api/files',
                [
                    'headers' => [
                        'authorization' => "Bearer {$this->apiToken}",
                    ],
                    'timeout' => 7,
                    'query' => [
                        'limit' => 1,
                        'offset' => 1,
                        'criteria' => 'name',
                        'order' => 'ASC',
                        'filter' => '{"alias":{"match":"foobar"}}',
                        'tags' => '["tag1"]',
                        'shallow' => '1'
                    ]
                ]
            ],
            $mockedTransportResponse
        );

        $actualResponse = $client->getViewList($requestParams);
        $this->assertInstanceOf(Client\Model\Response\Container::class, $actualResponse);
        $this->assertInstanceOf(Client\Model\Response\Files\ListGet::class, $actualResponse->getBodyData());
    }

    /**
     * @return Client
     */
    private function makeClient()
    {
        return new Client(
            $this->transportMock,
            $this->apiToken,
            $this->validatorMock,
            $this->responseAdapterMock,
            $this->config
        );
    }

    /**
     * @param $requestParams
     * @param $validatorType
     */
    private function expectValidationPerformed($requestParams, $validatorType)
    {
        $typeValidatorMock = $this->getMockBuilder(\Respect\Validation\Validator::class)->getMock();

        $this->validatorMock
            ->expects($this->once())
            ->method('buildByType')
            ->with($validatorType)
            ->willReturn($typeValidatorMock);

        $this->validatorMock
            ->expects($this->once())
            ->method('assert')
            ->with($requestParams, $typeValidatorMock);
    }

    /**
     * @param array $makeRequestArguments
     * @param ResponseContainer $willReturnResponse
     */
    private function expectRequestMade(
        array $makeRequestArguments,
        ResponseContainer $willReturnResponse
    ) {
        $this->transportMock
            ->expects($this->once())
            ->method('makeRequest')
            ->with(...$makeRequestArguments)
            ->willReturn($willReturnResponse);
    }

    /**
     * @param array $makeRequestArguments
     * @param \CappasitySDK\Transport\Exception\RequestException $willThrowException
     */
    private function expectRequestMadeAndFailed(
        array $makeRequestArguments,
        \CappasitySDK\Transport\Exception\RequestException $willThrowException
    ) {
        $this->transportMock
            ->expects($this->once())
            ->method('makeRequest')
            ->with(...$makeRequestArguments)
            ->willThrowException($willThrowException);
    }

    /**
     * @param array $transformArguments
     * @param $modelResponseContainer
     */
    private function expectResponseTransformed(array $transformArguments, $modelResponseContainer)
    {
        $this->responseAdapterMock
            ->expects($this->once())
            ->method('transform')
            ->with(...$transformArguments)
            ->willReturn($modelResponseContainer);
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

    /**
     * @param ResponseContainer $transportResponseContainer
     * @param $className
     * @return Client\Model\Response\Container
     */
    private function makeClientResponseContainer(ResponseContainer $transportResponseContainer, $className)
    {
        if (!method_exists($className, 'fromResponse')) {
            throw new \LogicException("Class {$className} missing required `fromResponse` method");
        }

        return new \CappasitySDK\Client\Model\Response\Container(
            200,
            [],
            $className::fromResponse($transportResponseContainer->getData()),
            $transportResponseContainer->getOriginalResponse()
        );
    }

    /**
     * Returns a <b>single</b> file list for easier testing
     */
    private function getViewListMockedResponse($currentPage, $totalPages, $fileId)
    {
        return [
            'meta' => [
                'id' => '698c86d4-e68e-4bc0-80b0-a58e57e59a5b',
                'page' => $currentPage,
                'pages' => $totalPages,
                'cursor' => $currentPage,
                'timers' =>
                    [
                        'list:pre-parse' => 0.144045,
                        'list:validate' => 0.082124,
                        'list:ms-files' => 60.096107,
                        'list:qs' => 0.13568,
                        'list:serialized' => 0.19285,
                        'list:$' => '60.66',
                    ],
            ],
            'links' => [
                'self' => 'https://api.cappasity3d.com/api/files?order=DESC&limit=1&filter=%257B%257D&pub=1&owner=cappasity',
                'next' => 'https://api.cappasity3d.com/api/files?order=DESC&limit=1&filter=%257B%257D&pub=1&owner=cappasity&offset=1',
            ],
            'data' => [
                [
                    'type' => 'file',
                    'id' => $fileId,
                    'attributes' =>
                        [
                            'public' => '1',
                            'contentLength' => 28010036,
                            'name' => 'danya_08',
                            'files' => [
                                [
                                    'contentLength' => 31347,
                                    'contentType' => 'image/jpeg',
                                    'md5Hash' => 'BdqzIQNCTuqnrJWncVJRLg==',
                                    'bucket' => 'cdn.cappasity3d.com',
                                    'type' => 'c-preview',
                                    'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/7f0fdc79-9ef1-45fb-ac3f-6cabe6e0385c.jpeg',
                                ],
                                [
                                    'contentLength' => 42696,
                                    'contentType' => 'image/vnd.cappasity',
                                    'md5Hash' => 'gmgAupRdc8kk5NllyHpWqA==',
                                    'bucket' => 'cdn.cappasity3d.com',
                                    'type' => 'c-pack',
                                    'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/a6681d99-e2cf-4042-9094-7a9416a7c2c4.pack',
                                ],
                                [
                                    'contentLength' => 6832050,
                                    'contentType' => 'image/vnd.cappasity',
                                    'md5Hash' => '2SuRRCzCqmZI17/qhSVyHg==',
                                    'bucket' => 'cdn.cappasity3d.com',
                                    'type' => 'c-pack',
                                    'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/e65f1bd1-2676-4b4a-9209-c6bd158c57b1.pack',
                                ],
                                [
                                    'contentLength' => 10411179,
                                    'contentType' => 'image/vnd.cappasity',
                                    'md5Hash' => 'c+YlOMWuKAF+PNgfzzpBew==',
                                    'bucket' => 'cdn.cappasity3d.com',
                                    'type' => 'c-pack',
                                    'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/84b0abc8-2545-4ee9-a734-4053cdea7438.pack',
                                ],
                                [
                                    'contentLength' => 10408574,
                                    'contentType' => 'image/vnd.cappasity',
                                    'md5Hash' => '5kkFhtQKTnswGd9DrP3azA==',
                                    'bucket' => 'cdn.cappasity3d.com',
                                    'type' => 'c-pack',
                                    'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/1832375c-9427-4e7a-807e-acb3ecc95b05.pack',
                                ],
                                [
                                    'contentLength' => 284190,
                                    'contentType' => 'image/vnd.cappasity',
                                    'md5Hash' => 'Btn5eFYLUZoTJo5X6dIpaw==',
                                    'bucket' => 'cdn.cappasity3d.com',
                                    'type' => 'c-pack',
                                    'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/f0e5d3a3-aeba-4744-ab79-26d56cca0f7f.pack',
                                ],
                            ],
                            'parts' => 6,
                            'tags' =>
                                [
                                    0 => 'Clothing',
                                    1 => 'Undergarment',
                                    2 => 'Briefs',
                                    3 => 'Photo shoot',
                                    4 => 'Fashion model',
                                    5 => 'Lingerie top',
                                    6 => 'Swimwear',
                                ],
                            'type' => 'object',
                            'uploadedAt' => 1551090243029,
                            'embed' => [
                                'code' => '<iframe allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" width="{{ width }}" height="{{ height }}" frameborder="0" style="border:0;" src="https://api.cappasity.com/api/player/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/embedded?autorun={{ autorun }}&closebutton={{ closebutton }}&logo={{ logo }}&analytics={{ analytics }}&uipadx={{ uipadx }}&uipady={{ uipady }}&autorotate={{ autorotate }}&autorotatetime={{ autorotatetime }}&autorotatedelay={{ autorotatedelay }}&autorotatedir={{ autorotatedir }}&hidefullscreen={{ hidefullscreen }}&hideautorotateopt={{ hideautorotateopt }}&hidesettingsbtn={{ hidesettingsbtn }}&enableimagezoom={{ enableimagezoom }}&zoomquality={{ zoomquality }}&hidezoomopt={{ hidezoomopt }}&arbutton={{ arbutton }}"></iframe>',
                                'params' => [
                                    'autorun' => [
                                        'type' => 'boolean',
                                        'default' => 0,
                                        'description' => 'Auto-start player',
                                    ],
                                    'closebutton' => [
                                        'type' => 'boolean',
                                        'default' => 1,
                                        'description' => 'Close button',
                                    ],
                                    'logo' => [
                                        'type' => 'boolean',
                                        'own' => 0,
                                        'default' => 1,
                                        'description' => 'Show logo',
                                        'paid' => true,
                                        'reqPlanLevel' => 20,
                                    ],
                                    'analytics' => [
                                        'type' => 'boolean',
                                        'default' => 1,
                                        'description' => 'Enable analytics',
                                    ],
                                    'uipadx' => [
                                        'type' => 'integer',
                                        'default' => 0,
                                        'description' => 'Horizontal (left, right) UI padding in pixels',
                                    ],
                                    'uipady' => [
                                        'type' => 'integer',
                                        'default' => 0,
                                        'description' => 'Vertical (top, bottom) UI padding in pixels',
                                    ],
                                    'autorotate' => [
                                        'type' => 'boolean',
                                        'default' => 0,
                                        'description' => 'Autorotate',
                                        'paid' => true,
                                        'reqPlanLevel' => 30,
                                    ],
                                    'autorotatetime' => [
                                        'type' => 'float',
                                        'default' => 10,
                                        'description' => 'Autorotate time, seconds',
                                        'min' => 2,
                                        'max' => 60,
                                        'paid' => true,
                                        'reqPlanLevel' => 30,
                                    ],
                                    'autorotatedelay' => [
                                        'type' => 'float',
                                        'default' => 2,
                                        'description' => 'Autorotate delay, seconds',
                                        'min' => 1,
                                        'max' => 10,
                                        'paid' => true,
                                        'reqPlanLevel' => 30,
                                    ],
                                    'autorotatedir' => [
                                        'type' => 'integer',
                                        'default' => 1,
                                        'description' => 'Autorotate direction',
                                        'enum' =>
                                            [
                                                'clockwise' => 1,
                                                'counter-clockwise' => -1,
                                            ],
                                        'paid' => true,
                                        'reqPlanLevel' => 30,
                                    ],
                                    'hidefullscreen' => [
                                        'type' => 'boolean',
                                        'description' => 'Hide fullscreen',
                                        'default' => 1,
                                        'paid' => true,
                                        'reqPlanLevel' => 30,
                                    ],
                                    'hideautorotateopt' => [
                                        'type' => 'boolean',
                                        'own' => 0,
                                        'default' => 1,
                                        'invert' => true,
                                        'description' => 'Autorotate button',
                                        'paid' => true,
                                        'reqPlanLevel' => 30,
                                    ],
                                    'hidesettingsbtn' => [
                                        'type' => 'boolean',
                                        'default' => 0,
                                        'description' => 'Settings button',
                                        'invert' => true,
                                        'paid' => true,
                                        'reqPlanLevel' => 30,
                                    ],
                                    'enableimagezoom' => [
                                        'type' => 'boolean',
                                        'default' => 1,
                                        'description' => 'Enable zoom',
                                        'paid' => true,
                                        'reqPlanLevel' => 30,
                                    ],
                                    'zoomquality' => [
                                        'type' => 'integer',
                                        'default' => 1,
                                        'enum' => [
                                            'SD' => 1,
                                            'HD' => 2,
                                        ],
                                        'description' => 'Zoom quality',
                                        'paid' => true,
                                        'reqPlanLevel' => 30,
                                    ],
                                    'hidezoomopt' => [
                                        'type' => 'boolean',
                                        'default' => 0,
                                        'description' => 'Zoom button',
                                        'paid' => true,
                                        'invert' => true,
                                        'reqPlanLevel' => 30,
                                    ],
                                    'arbutton' => [
                                        'type' => 'boolean',
                                        'default' => 1,
                                        'description' => 'AR button',
                                        'paid' => false,
                                    ],
                                    'width' => [
                                        'type' => 'string',
                                        'default' => '100%',
                                        'description' => 'Width of embedded window (px or %)',
                                    ],
                                    'height' => [
                                        'type' => 'string',
                                        'default' => '600px',
                                        'description' => 'Height of embedded window (px or %)',
                                    ],
                                ],
                            ],
                            'bucket' => 'cdn.cappasity3d.com',
                            'uploadType' => 'simple',
                            'backgroundColor' => '#FFFFFF',
                            'packed' => '1',
                            'c_ver' => '4.1.0',
                            'owner' => 'cappasity',
                        ],
                    'links' => [
                        'self' => 'https://api.cappasity.com/api/files/ffd3edb7-cfbc-4880-8287-a6dc7ca84579',
                        'owner' => 'https://api.cappasity.com/api/users/cappasity',
                        'player' => 'https://3d.cappasity.com/u/cappasity/ffd3edb7-cfbc-4880-8287-a6dc7ca84579',
                        'user' => 'https://3d.cappasity.com/u/cappasity',
                    ],
                ],
            ],
        ];
    }
}
