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

namespace CappasitySDK\Transport\Exception;

use Exception;

class RequestException extends Exception
{
    /**
     * Is null when original request object is not available
     *
     * @var mixed|null
     */
    private $request;

    /**
     * @var mixed
     */
    private $response;

    /**
     * @return mixed|null
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed|null $request
     * @return $this
     */
    public function setRequest($request): RequestException
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     * @return $this
     */
    public function setResponse($response): RequestException
    {
        $this->response = $response;

        return $this;
    }
}
