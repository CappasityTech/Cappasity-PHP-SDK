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

use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;

interface ClientInterface
{
    /**
     * @param Request\Process\JobsRegisterSyncPost $params
     * @return Response\Container
     */
    public function registerSyncJob(Request\Process\JobsRegisterSyncPost $params): Response\Container;

    /**
     * @param Request\Process\JobsPullListGet $params
     * @return Response\Container
     */
    public function getPullJobList(Request\Process\JobsPullListGet $params): Response\Container;

    /**
     * @param Request\Process\JobsPullAckPost $params
     * @return Response\Container
     */
    public function ackPullJobList(Request\Process\JobsPullAckPost $params): Response\Container;

    /**
     * @param Request\Process\JobsPullResultGet $params
     * @return Response\Container
     */
    public function getPullJobResult(Request\Process\JobsPullResultGet $params): Response\Container;

    /**
     * @param Request\Users\MeGet $params
     * @return Response\Container
     */
    public function getUser(Request\Users\MeGet $params): Response\Container;

    /**
     * @param Request\Files\ListGet $params
     * @return Response\Container
     */
    public function getViewList(Request\Files\ListGet $params): Response\Container;

    /**
     * @param Request\Files\ListGet $params
     * @return \Generator
     */
    public function getViewListIterator(Request\Files\ListGet $params): \Generator;

    /**
     * @param Request\Files\InfoGet $params
     * @return Response\Container
     */
    public function getViewInfo(Request\Files\InfoGet $params): Response\Container;

    /**
     * @param Request\Payments\Plans\PlanGet $params
     * @return Response\Container
     */
    public function getPaymentsPlan(Request\Payments\Plans\PlanGet $params): Response\Container;
}
