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

namespace CappasitySDK\Client\Model\Callback\Process\JobsPushResultPost;

class SyncDataItem
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string|bool
     */
    private $uploadId;

    /**
     * @var string|null
     */
    private $sku;

    /**
     * @var string|null
     */
    private $capp;

    /**
     * @param string $id
     * @param bool|string $uploadId
     * @param null|string $sku
     * @param null|string $capp
     */
    public function __construct($id, $uploadId, $sku, $capp)
    {
        $this->id = $id;
        $this->uploadId = $uploadId;
        $this->sku = $sku;
        $this->capp = $capp;
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
    public function setId($id): SyncDataItem
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getUploadId()
    {
        return $this->uploadId;
    }

    /**
     * @param bool|string $uploadId
     * @return $this
     */
    public function setUploadId($uploadId): SyncDataItem
    {
        $this->uploadId = $uploadId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param null|string $sku
     * @return $this
     */
    public function setSku($sku): SyncDataItem
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCapp(): ?string
    {
        return $this->capp;
    }

    /**
     * @param null|string $capp
     * @return $this
     */
    public function setCapp($capp): SyncDataItem
    {
        $this->capp = $capp;

        return $this;
    }
}
