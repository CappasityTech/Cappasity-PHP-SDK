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

namespace CappasitySDK;

use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;
use Exception;
use Generator;
use Sentry\State\HubInterface as SentryHubInterface;

class ReportableClient implements ClientInterface
{
    const CAPPASITY_DSN = 'https://6d68c26b33a34f008359c8647f02a110@sentry.io/1282472';

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var SentryHubInterface
     */
    private $sentryHub;

    /**
     * @param ClientInterface $client
     * @param SentryHubInterface $sentryHub
     */
    public function __construct(ClientInterface $client, SentryHubInterface $sentryHub)
    {
        $this->client = $client;
        $this->sentryHub = $sentryHub;
    }

    /**
     * @param Request\Process\JobsRegisterSyncPost $params
     * @return Response\Container
     * @throws Exception
     */
    public function registerSyncJob(Request\Process\JobsRegisterSyncPost $params): Response\Container
    {
        try {
            return $this->client->registerSyncJob($params);
        } catch (Exception $e) {
            $this->sentryHub->captureException($e);

            throw $e;
        }
    }

    /**
     * @param Request\Process\JobsPullListGet $params
     * @return Response\Container
     * @throws Exception
     */
    public function getPullJobList(Request\Process\JobsPullListGet $params): Response\Container
    {
        try {
            return $this->client->getPullJobList($params);
        } catch (Exception $e) {
            $this->sentryHub->captureException($e);

            throw $e;
        }
    }

    /**
     * @param Request\Process\JobsPullAckPost $params
     * @return Response\Container
     * @throws Exception
     */
    public function ackPullJobList(Request\Process\JobsPullAckPost $params): Response\Container
    {
        try {
            return $this->client->ackPullJobList($params);
        } catch (Exception $e) {
            $this->sentryHub->captureException($e);

            throw $e;
        }
    }

    /**
     * @param Request\Process\JobsPullResultGet $params
     * @return Response\Container
     * @throws Exception
     */
    public function getPullJobResult(Request\Process\JobsPullResultGet $params): Response\Container
    {
        try {
            return $this->client->getPullJobResult($params);
        } catch (Exception $e) {
            $this->sentryHub->captureException($e);

            throw $e;
        }
    }


    /**
     * @param Request\Users\MeGet $params
     * @return Response\Container
     * @throws Exception
     */
    public function getUser(Request\Users\MeGet $params): Response\Container
    {
        try {
            return $this->client->getUser($params);
        } catch (Exception $e) {
            $this->sentryHub->captureException($e);

            throw $e;
        }
    }

    /**
     * @param Request\Files\ListGet $params
     * @return Response\Container
     *
     * @throws Exception
     */
    public function getViewList(Request\Files\ListGet $params): Response\Container
    {
        try {
            return $this->client->getViewList($params);
        } catch (Exception $e) {
            $this->sentryHub->captureException($e);

            throw $e;
        }
    }

    /**
     * @param Request\Files\ListGet $params
     * @return Generator
     * @throws Exception
     */
    public function getViewListIterator(Request\Files\ListGet $params): Generator
    {
        try {
            return $this->client->getViewListIterator($params);
        } catch (Exception $e) {
            $this->sentryHub->captureException($e);

            throw $e;
        }
    }

    /**
     * @param Request\Files\InfoGet $params
     * @return Response\Container
     * @throws Exception
     */
    public function getViewInfo(Request\Files\InfoGet $params): Response\Container
    {
        try {
            return $this->client->getViewInfo($params);
        } catch (Exception $e) {
            $this->sentryHub->captureException($e);

            throw $e;
        }
    }

    /**
     * @param Request\Payments\Plans\PlanGet $params
     * @return Response\Container
     * @throws Exception
     */
    public function getPaymentsPlan(Request\Payments\Plans\PlanGet $params): Response\Container
    {
        try {
            return $this->client->getPaymentsPlan($params);
        } catch (Exception $e) {
            $this->sentryHub->captureException($e);

            throw $e;
        }
    }
}
