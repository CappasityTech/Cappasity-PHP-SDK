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

use CappasitySDK\Client;
use CappasitySDK\ReportableClient;

class ReportableClientTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \CappasitySDK\Client|\PHPUnit_Framework_MockObject_MockObject
     */
    private $clientMock;

    /**
     * @var \Raven_Client|\PHPUnit_Framework_MockObject_MockObject
     */
    private $ravenClientMock;

    public function setUp()
    {
        $this->clientMock = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->setMethods([
                'getEmbedCode',
                'registerSyncJob',
                'getPullJobList',
                'ackPullJobList',
                'getPullJobResult',
                'getUser',
                'getViewInfo',
                'getPaymentsPlan',
            ])
            ->getMock();

        $this->ravenClientMock = $this->getMockBuilder(\Raven_Client::class)
            ->disableOriginalConstructor()
            ->setMethods([
                'captureException',
            ])
            ->getMock();
    }

    /**
     * @expectedException \Exception
     */
    public function testRegisterSyncJob()
    {
        $client = new ReportableClient($this->clientMock, $this->ravenClientMock);

        $mockedException = new \Exception();

        $this->clientMock
            ->expects($this->once())
            ->method('registerSyncJob')
            ->willThrowException($mockedException);

        $this->ravenClientMock
            ->expects($this->once())
            ->method('captureException')
            ->with($mockedException);

        $client->registerSyncJob(Client\Model\Request\Process\JobsRegisterSyncPost::fromData(
            [
                [
                    'id' => 'inner-product-id',
                    'aliases' => ['Bear'],
                    'capp' => 'stub-file-id',
                ]
            ],
            'pull'
        ));
    }

    /**
     * @expectedException \Exception
     */
    public function testGetPullJobList()
    {
        $client = new ReportableClient($this->clientMock, $this->ravenClientMock);

        $mockedException = new \Exception();

        $this->clientMock
            ->expects($this->once())
            ->method('getPullJobList')
            ->willThrowException($mockedException);

        $this->ravenClientMock
            ->expects($this->once())
            ->method('captureException')
            ->with($mockedException);

        $client->getPullJobList(Client\Model\Request\Process\JobsPullListGet::fromData(null, null));
    }

    /**
     * @expectedException \Exception
     */
    public function testAckPullJobList()
    {
        $client = new ReportableClient($this->clientMock, $this->ravenClientMock);

        $mockedException = new \Exception();

        $this->clientMock
            ->expects($this->once())
            ->method('ackPullJobList')
            ->willThrowException($mockedException);

        $this->ravenClientMock
            ->expects($this->once())
            ->method('captureException')
            ->with($mockedException);

        $client->ackPullJobList(Client\Model\Request\Process\JobsPullAckPost::fromData(['a9673347-8f2e-4caa-83e9-4139d7473c2f:A1']));
    }

    /**
     * @expectedException \Exception
     */
    public function testGetPullJobResult()
    {
        $client = new ReportableClient($this->clientMock, $this->ravenClientMock);

        $mockedException = new \Exception();

        $this->clientMock
            ->expects($this->once())
            ->method('getPullJobResult')
            ->willThrowException($mockedException);

        $this->ravenClientMock
            ->expects($this->once())
            ->method('captureException')
            ->with($mockedException);

        $client->getPullJobResult(Client\Model\Request\Process\JobsPullResultGet::fromData('a9673347-8f2e-4caa-83e9-4139d7473c2f:A1'));
    }

    /**
     * @expectedException \Exception
     */
    public function testGetUser()
    {
        $client = new ReportableClient($this->clientMock, $this->ravenClientMock);

        $mockedException = new \Exception();

        $this->clientMock
            ->expects($this->once())
            ->method('getUser')
            ->willThrowException($mockedException);

        $this->ravenClientMock
            ->expects($this->once())
            ->method('captureException')
            ->with($mockedException);

        $client->getUser(new Client\Model\Request\Users\MeGet());
    }

    /**
     * @expectedException \Exception
     */
    public function testGetViewInfo()
    {
        $client = new ReportableClient($this->clientMock, $this->ravenClientMock);

        $mockedException = new \Exception();

        $this->clientMock
            ->expects($this->once())
            ->method('getViewInfo')
            ->willThrowException($mockedException);

        $this->ravenClientMock
            ->expects($this->once())
            ->method('captureException')
            ->with($mockedException);

        $client->getViewInfo(Client\Model\Request\Files\InfoGet::fromData(
            'alice',
            'dd596de4-ae2b-4d66-a023-242ca7d86b51'
        ));
    }

    /**
     * @expectedException \Exception
     */
    public function testGetPaymentsPlan()
    {
        $client = new ReportableClient($this->clientMock, $this->ravenClientMock);

        $mockedException = new \Exception();

        $this->clientMock
            ->expects($this->once())
            ->method('getPaymentsPlan')
            ->willThrowException($mockedException);

        $this->ravenClientMock
            ->expects($this->once())
            ->method('captureException')
            ->with($mockedException);

        $client->getPaymentsPlan(Client\Model\Request\Payments\Plans\PlanGet::fromData(
            'P-1AS44544Y0488105H5QI6O2I'
        ));
    }
}
