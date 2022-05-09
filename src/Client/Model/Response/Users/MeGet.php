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

namespace CappasitySDK\Client\Model\Response\Users;

use CappasitySDK\Client\Model\Response;

class MeGet implements Response\DataInterface
{
    /**
     * @var MeGet\Meta
     */
    private $meta;

    /**
     * @var MeGet\Data
     */
    private $data;

    /**
     * @param MeGet\Meta $meta
     * @param MeGet\Data $data
     */
    public function __construct(MeGet\Meta $meta, MeGet\Data $data)
    {
        $this->meta = $meta;
        $this->data = $data;
    }

    /**
     * @param array $response
     * @return MeGet
     */
    public static function fromResponse(array $response)
    {
        $meta = new MeGet\Meta($response['meta']['id']);

        $userData = $response['data'];
        $attributesData = $userData['attributes'];

        $attributes = new MeGet\Data\Attributes(
            $attributesData['firstName'],
            $attributesData['lastName'],
            $attributesData['org'] ?? false,
            $attributesData['id'],
            $attributesData['username'],
            $attributesData['created'],
            $attributesData['alias'],
            $attributesData['plan'],
            $attributesData['agreement'],
            $attributesData['nextCycle'],
            $attributesData['models'],
            $attributesData['modelPrice'],
            $attributesData['subscriptionPrice'],
            $attributesData['subscriptionInterval'],
            $attributesData['mfa']
        );
        $linksData = $userData['links'];
        $links = new MeGet\Data\Links(
            $linksData['self'],
            $linksData['user']
        );
        $data = new MeGet\Data(
            $userData['type'],
            $userData['id'],
            $attributes,
            $links
        );

        return new self($meta, $data);
    }

    /**
     * @return MeGet\Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param MeGet\Meta $meta
     * @return $this
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return MeGet\Data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param MeGet\Data $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
