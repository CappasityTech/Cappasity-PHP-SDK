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

namespace CappasitySDK\Client\Model\Response\Files;

use CappasitySDK\Client\Model\Response;
use CappasitySDK\Client\ResponseModelAdapter\File as FileResponseModelAdapter;

class ListGet implements Response\DataInterface
{
    /**
     * @var ListGet\Meta
     */
    private $meta;

    /**
     * @var Response\Files\Common\File[]
     */
    private $data;

    /**
     * @var ListGet\Links
     */
    private $links;

    /**
     * @param ListGet\Meta $meta
     * @param Response\Files\Common\File[] $data
     * @param ListGet\Links $links
     */
    public function __construct(ListGet\Meta $meta, array $data, ListGet\Links $links)
    {
        $this->meta = $meta;
        $this->data = $data;
        $this->links = $links;
    }

    /**
     * @return ListGet\Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param ListGet\Meta $meta
     * @return $this
     */
    public function setMeta(ListGet\Meta $meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return Response\Files\Common\File[]
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param Response\Files\Common\File[] $data
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return ListGet\Links
     */
    public function getLinks(): ListGet\Links
    {
        return $this->links;
    }

    /**
     * @param ListGet\Links $links
     * @return $this
     */
    public function setLinks(ListGet\Links $links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * @param array $response
     * @return ListGet
     */
    public static function fromResponse(array $response)
    {
        $files = array_map(
            [FileResponseModelAdapter::class, 'transformFile'],
            $response['data']
        );

        ['self' => $self] = $response['links'];
        $next = $response['links']['next'] ?? null;
        $links = (new ListGet\Links())
            ->setSelf($self)
            ->setNext($next);

        [
            'id' => $id,
            'page' => $page,
            'pages' => $pages,
        ] = $response['meta'];
        $cursor = $response['meta']['cursor'] ?? null;

        return new self(
            new ListGet\Meta($id, $page, $pages, $cursor),
            $files,
            $links
        );
    }
}
