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

class ListGet implements Response\DataInterface
{
    /**
     * @var ListGet\Meta
     */
    private $meta;

    /**
     * @var ListGet\Data
     */
    private $data;

    /**
     * @param ListGet\Meta $meta
     * @param ListGet\Data $data
     */
    public function __construct(ListGet\Meta $meta, ListGet\Data $data)
    {
        $this->meta = $meta;
        $this->data = $data;
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
     * @return ListGet\Data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param ListGet\Data $data
     * @return $this
     */
    public function setData(ListGet\Data $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param array $response
     * @return ListGet
     */
    public static function fromResponse(array $response)
    {
        $attributesData = $response['data']['attributes'];
        $linksData = $response['data']['links'];

        $files = array_map(
            function (array $file) {
                return (new ListGet\Data\Attributes\File())
                    ->setType($file['type'])
                    ->setFilename($file['filename'])
                    ->setContentLength($file['contentLength'])
                    ->setContentType($file['contentType'])
                    ->setContentEncoding($file['contentEncoding'])
                    ->setMd5Hash($file['md5Hash']);
            },
            $attributesData['files']
        );

        $attributes = (new ListGet\Data\Attributes())
            ->setName($attributesData['name'])
            ->setDescription($attributesData['description'])
            ->setWebsite($attributesData['website'])
            ->setStartedAt($attributesData['startedAt'])
            ->setUploadedAt($attributesData['uploadedAt'])
            ->setStatus($attributesData['status'])
            ->setOwner($attributesData['owner'])
            ->setContentLength($attributesData['length'])
            ->setPublic($attributesData['public'])
            ->setError($attributesData['error'])
            ->setFiles($files);
        ;

        $links = (new ListGet\Data\Links())
            ->setSelf($linksData['self'])
            ->setOwner($linksData['owner'])
        ;

        $meta = $response['meta'];

        return new self(
            new ListGet\Meta($meta['id'], $meta['page'], $meta['pages'], $meta['cursor']),
            new ListGet\Data(
                $response['data']['id'],
                $response['data']['type'],
                $attributes,
                $links
            )
        );
    }
}
