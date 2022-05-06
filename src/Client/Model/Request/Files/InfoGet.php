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

namespace CappasitySDK\Client\Model\Request\Files;

use CappasitySDK\Client\Model\Request;

class InfoGet implements Request\RequestParamsInterface
{
    /**
     * @var string
     */
    private $userAlias;

    /**
     * @var string
     */
    private $viewId;

    /**
     * @param string $userAlias
     * @param string $viewId
     */
    public function __construct($userAlias, $viewId)
    {
        $this->userAlias = $userAlias;
        $this->viewId = $viewId;
    }

    /**
     * @return string
     */
    public function getUserAlias()
    {
        return $this->userAlias;
    }

    /**
     * @param string $userAlias
     * @return $this
     */
    public function setUserAlias($userAlias)
    {
        $this->userAlias = $userAlias;

        return $this;
    }

    /**
     * @return string
     */
    public function getViewId()
    {
        return $this->viewId;
    }

    /**
     * @param string $viewId
     * @return $this
     */
    public function setViewId($viewId)
    {
        $this->viewId = $viewId;

        return $this;
    }

    /**
     * @param $userAlias
     * @param $viewId
     *
     * @return InfoGet
     */
    public static function fromData($userAlias, $viewId)
    {
        return new self($userAlias, $viewId);
    }
}
