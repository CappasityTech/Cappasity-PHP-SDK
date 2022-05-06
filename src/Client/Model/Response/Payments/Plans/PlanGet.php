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

namespace CappasitySDK\Client\Model\Response\Payments\Plans;

use CappasitySDK\Client\Model\Response;

class PlanGet implements Response\DataInterface
{
    /**
     * @var PlanGet\Meta
     */
    private $meta;

    /**
     * @var PlanGet\Data
     */
    private $data;

    /**
     * @param PlanGet\Meta $meta
     * @param PlanGet\Data $data
     */
    public function __construct(PlanGet\Meta $meta, PlanGet\Data $data)
    {
        $this->meta = $meta;
        $this->data = $data;
    }

    /**
     * @return PlanGet\Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param PlanGet\Meta $meta
     * @return $this
     */
    public function setMeta(PlanGet\Meta $meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return PlanGet\Data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param PlanGet\Data $data
     * @return $this
     */
    public function setData(PlanGet\Data $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param array $response
     * @return PlanGet
     */
    public static function fromResponse(array $response)
    {
        $attributesData = $response['data']['attributes'];
        $linksData = $response['data']['links'];

        $attributes = (new PlanGet\Data\Attributes())
            ->setAlias($attributesData['alias'])
            ->setLevel($attributesData['level'])
        ;

        $links = (new PlanGet\Data\Links())
            ->setSelf($linksData['self'])
        ;

        return new self(
            new PlanGet\Meta($response['meta']['id']),
            new PlanGet\Data(
                $response['data']['id'],
                $response['data']['type'],
                $attributes,
                $links
            )
        );
    }
}
