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

namespace CappasitySDK\Client\Model\Request\Payments\Plans;

use CappasitySDK\Client;

class PlanGet implements Client\Model\Request\RequestParamsInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id): PlanGet
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param $id
     *
     * @return PlanGet
     */
    public static function fromData($id): PlanGet
    {
        return new self($id);
    }
}
