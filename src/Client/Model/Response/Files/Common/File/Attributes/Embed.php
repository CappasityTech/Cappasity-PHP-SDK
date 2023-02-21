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

namespace CappasitySDK\Client\Model\Response\Files\Common\File\Attributes;

class Embed
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var Embed\Params
     */
    private $params;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode(string $code): Embed
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Embed\Params
     */
    public function getParams(): Embed\Params
    {
        return $this->params;
    }

    /**
     * @param Embed\Params $params
     * @return $this
     */
    public function setParams(Embed\Params $params): Embed
    {
        $this->params = $params;

        return $this;
    }
}
