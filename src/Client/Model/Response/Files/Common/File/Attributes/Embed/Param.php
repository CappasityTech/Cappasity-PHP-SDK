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

namespace CappasitySDK\Client\Model\Response\Files\Common\File\Attributes\Embed;

class Param
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $description;

    /**
     * @var mixed
     */
    private $default;

    /**
     * @var boolean
     */
    private $paid = false;

    /**
     * @var integer|null
     */
    private $reqPlanLevel = null;

    /**
     * @var int|null
     */
    private $min = null;

    /**
     * @var int|null
     */
    private $max = null;

    /**
     * @var boolean
     */
    private $invert = false;

    /**
     * @var string[]|int[]|null
     */
    private $enum = null;

    /**
     * @var boolean
     */
    private $own = false;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     * @return $this
     */
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @return bool
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * @param bool $paid
     * @return $this
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getReqPlanLevel()
    {
        return $this->reqPlanLevel;
    }

    /**
     * @param int|null $reqPlanLevel
     * @return $this
     */
    public function setReqPlanLevel($reqPlanLevel)
    {
        $this->reqPlanLevel = $reqPlanLevel;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param int|null $min
     * @return $this
     */
    public function setMin($min)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param int|null $max
     * @return $this
     */
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * @return bool
     */
    public function getInvert()
    {
        return $this->invert;
    }

    /**
     * @param bool $invert
     * @return $this
     */
    public function setInvert($invert)
    {
        $this->invert = $invert;

        return $this;
    }

    /**
     * @return int[]|null|string[]
     */
    public function getEnum()
    {
        return $this->enum;
    }

    /**
     * @param int[]|null|string[] $enum
     * @return $this
     */
    public function setEnum($enum)
    {
        $this->enum = $enum;

        return $this;
    }

    /**
     * @return bool
     */
    public function getOwn()
    {
        return $this->own;
    }

    /**
     * @param bool $own
     * @return $this
     */
    public function setOwn($own)
    {
        $this->own = $own;

        return $this;
    }
}
