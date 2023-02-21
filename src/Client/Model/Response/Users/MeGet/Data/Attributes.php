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

namespace CappasitySDK\Client\Model\Response\Users\MeGet\Data;

class Attributes
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var boolean
     */
    private $org;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var integer
     */
    private $created;

    /**
     * @var string
     */
    private $alias;

    /**
     * @var string
     */
    private $plan;

    /**
     * @var string
     */
    private $agreement;

    /**
     * @var integer
     */
    private $nextCycle;

    /**
     * @var integer
     */
    private $models;

    /**
     * @var integer
     */
    private $modelsPrice;

    /**
     * @var string|integer
     */
    private $subscriptionPrice;

    /**
     * @var string
     */
    private $subscriptionInterval;

    /**
     * @var boolean
     */
    private $mfa;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param bool $org
     * @param string $id
     * @param string $username
     * @param int $created
     * @param string $alias
     * @param string $plan
     * @param string $agreement
     * @param int $nextCycle
     * @param int $models
     * @param int $modelsPrice
     * @param string|integer $subscriptionPrice
     * @param string $subscriptionInterval
     * @param bool $mfa
     */
    public function __construct(
        $firstName,
        $lastName,
        $org,
        $id,
        $username,
        $created,
        $alias,
        $plan,
        $agreement,
        $nextCycle,
        $models,
        $modelsPrice,
        $subscriptionPrice,
        $subscriptionInterval,
        $mfa
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->org = $org;
        $this->id = $id;
        $this->username = $username;
        $this->created = $created;
        $this->alias = $alias;
        $this->plan = $plan;
        $this->agreement = $agreement;
        $this->nextCycle = $nextCycle;
        $this->models = $models;
        $this->modelsPrice = $modelsPrice;
        $this->subscriptionPrice = $subscriptionPrice;
        $this->subscriptionInterval = $subscriptionInterval;
        $this->mfa = $mfa;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName(string $firstName): Attributes
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName(string $lastName): Attributes
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return bool
     */
    public function getOrg(): bool
    {
        return $this->org;
    }

    /**
     * @param bool $org
     * @return $this
     */
    public function setOrg($org): Attributes
    {
        $this->org = $org;

        return $this;
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
     * @return $this
     */
    public function setId(string $id): Attributes
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username): Attributes
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreated(): int
    {
        return $this->created;
    }

    /**
     * @param int $created
     * @return $this
     */
    public function setCreated($created): Attributes
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     * @return $this
     */
    public function setAlias(string $alias): Attributes
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlan(): string
    {
        return $this->plan;
    }

    /**
     * @param string $plan
     * @return $this
     */
    public function setPlan(string $plan): Attributes
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * @return string
     */
    public function getAgreement(): string
    {
        return $this->agreement;
    }

    /**
     * @param string $agreement
     * @return $this
     */
    public function setAgreement(string $agreement): Attributes
    {
        $this->agreement = $agreement;

        return $this;
    }

    /**
     * @return int
     */
    public function getNextCycle(): int
    {
        return $this->nextCycle;
    }

    /**
     * @param int $nextCycle
     * @return $this
     */
    public function setNextCycle($nextCycle): Attributes
    {
        $this->nextCycle = $nextCycle;

        return $this;
    }

    /**
     * @return int
     */
    public function getModels(): int
    {
        return $this->models;
    }

    /**
     * @param int $models
     * @return $this
     */
    public function setModels($models): Attributes
    {
        $this->models = $models;

        return $this;
    }

    /**
     * @return int
     */
    public function getModelsPrice(): int
    {
        return $this->modelsPrice;
    }

    /**
     * @param int $modelsPrice
     * @return $this
     */
    public function setModelsPrice($modelsPrice): Attributes
    {
        $this->modelsPrice = $modelsPrice;

        return $this;
    }

    /**
     * @return string|integer
     */
    public function getSubscriptionPrice()
    {
        return $this->subscriptionPrice;
    }

    /**
     * @param string|integer $subscriptionPrice
     * @return $this
     */
    public function setSubscriptionPrice($subscriptionPrice): Attributes
    {
        $this->subscriptionPrice = $subscriptionPrice;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriptionInterval(): string
    {
        return $this->subscriptionInterval;
    }

    /**
     * @param string $subscriptionInterval
     * @return $this
     */
    public function setSubscriptionInterval(string $subscriptionInterval): Attributes
    {
        $this->subscriptionInterval = $subscriptionInterval;

        return $this;
    }

    /**
     * @return bool
     */
    public function getMfa(): bool
    {
        return $this->mfa;
    }

    /**
     * @param bool $mfa
     * @return $this
     */
    public function setMfa($mfa): Attributes
    {
        $this->mfa = $mfa;

        return $this;
    }
}
