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

namespace CappasitySDK\Client\Model\Response\Files\Common\File;

class Links
{
    /**
     * @var string
     */
    private $self;

    /**
     * @var string
     */
    private $owner;

    /**
     * @var string
     */
    private $player;

    /**
     * @var string
     */
    private $user;

    /**
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * @param string $self
     * @return $this
     */
    public function setSelf($self): Links
    {
        $this->self = $self;

        return $this;
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     * @return $this
     */
    public function setOwner($owner): Links
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlayer(): string
    {
        return $this->player;
    }

    /**
     * @param string $player
     * @return $this
     */
    public function setPlayer($player): Links
    {
        $this->player = $player;

        return $this;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return $this
     */
    public function setUser($user): Links
    {
        $this->user = $user;

        return $this;
    }
}
