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

namespace CappasitySDK\Client\Model\Response\Files\Common\File;

class Attributes
{
    /**
     * @var string|null
     */
    private $alias;

    /**
     * @var string|null
     */
    private $backgroundColor;

    /**
     * @var string|null
     */
    private $backgroundImage;

    /**
     * @var string|null
     */
    private $bucket;

    /**
     * @var string|null
     */
    private $cVer;

    /**
     * @var integer|null
     */
    private $contentLength;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $owner;

    /**
     * @var string|null
     */
    private $packed;

    /**
     * @var integer|null
     */
    private $parts;

    /**
     * @var string|null
     */
    private $preview;

    /**
     * @var string|null
     */
    private $public;

    /**
     * @var string|null
     */
    private $simple;

    /**
     * @var int|null
     */
    private $startedAt;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $uploadId;

    /**
     * @var string|null
     */
    private $uploadType;

    /**
     * @var int|null
     */
    private $uploaded;

    /**
     * @var int|null
     */
    private $uploadedAt;

    /**
     * @var Attributes\Embed|null
     */
    private $embed;

    /**
     * @var Attributes\File[]|null
     */
    private $files;

    /**
     * @return string|null
     */
    public function getAlias(): ?string
    {
        return $this->alias;
    }

    /**
     * @param string|null $alias
     * @return $this
     */
    public function setAlias(?string $alias): Attributes
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string|null $backgroundColor
     * @return $this
     */
    public function setBackgroundColor(?string $backgroundColor): Attributes
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBackgroundImage(): ?string
    {
        return $this->backgroundImage;
    }

    /**
     * @param ?string $backgroundImage
     * @return $this
     */
    public function setBackgroundImage(?string $backgroundImage): Attributes
    {
        $this->backgroundImage = $backgroundImage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBucket(): ?string
    {
        return $this->bucket;
    }

    /**
     * @param string|null $bucket
     * @return $this
     */
    public function setBucket(?string $bucket): Attributes
    {
        $this->bucket = $bucket;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCVer(): ?string
    {
        return $this->cVer;
    }

    /**
     * @param string|null $cVer
     * @return $this
     */
    public function setCVer(?string $cVer): Attributes
    {
        $this->cVer = $cVer;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getContentLength(): ?int
    {
        return $this->contentLength;
    }

    /**
     * @param int|null $contentLength
     * @return $this
     */
    public function setContentLength(?int $contentLength): Attributes
    {
        $this->contentLength = $contentLength;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return $this
     */
    public function setName(?string $name): Attributes
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOwner(): ?string
    {
        return $this->owner;
    }

    /**
     * @param string|null $owner
     * @return $this
     */
    public function setOwner(?string $owner): Attributes
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPacked(): ?string
    {
        return $this->packed;
    }

    /**
     * @param string|null $packed
     * @return $this
     */
    public function setPacked(?string $packed): Attributes
    {
        $this->packed = $packed;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getParts(): ?int
    {
        return $this->parts;
    }

    /**
     * @param int|null $parts
     * @return $this
     */
    public function setParts(?int $parts): Attributes
    {
        $this->parts = $parts;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPreview(): ?string
    {
        return $this->preview;
    }

    /**
     * @param string|null $preview
     * @return $this
     */
    public function setPreview(?string $preview): Attributes
    {
        $this->preview = $preview;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPublic(): ?string
    {
        return $this->public;
    }

    /**
     * @param string|null $public
     * @return $this
     */
    public function setPublic(?string $public): Attributes
    {
        $this->public = $public;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSimple(): ?string
    {
        return $this->simple;
    }

    /**
     * @param string|null $simple
     * @return $this
     */
    public function setSimple(?string $simple): Attributes
    {
        $this->simple = $simple;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStartedAt(): ?int
    {
        return $this->startedAt;
    }

    /**
     * @param int|null $startedAt
     * @return $this
     */
    public function setStartedAt(?int $startedAt): Attributes
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return $this
     */
    public function setStatus(?string $status): Attributes
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return $this
     */
    public function setType(?string $type): Attributes
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUploadId(): ?string
    {
        return $this->uploadId;
    }

    /**
     * @param string|null $uploadId
     * @return $this
     */
    public function setUploadId(?string $uploadId): Attributes
    {
        $this->uploadId = $uploadId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUploadType(): ?string
    {
        return $this->uploadType;
    }

    /**
     * @param string|null $uploadType
     * @return $this
     */
    public function setUploadType(?string $uploadType): Attributes
    {
        $this->uploadType = $uploadType;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUploaded(): ?int
    {
        return $this->uploaded;
    }

    /**
     * @param int|null $uploaded
     * @return $this
     */
    public function setUploaded(?int $uploaded): Attributes
    {
        $this->uploaded = $uploaded;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUploadedAt(): ?int
    {
        return $this->uploadedAt;
    }

    /**
     * @param int|null $uploadedAt
     * @return $this
     */
    public function setUploadedAt(?int $uploadedAt): Attributes
    {
        $this->uploadedAt = $uploadedAt;

        return $this;
    }

    /**
     * @return Attributes\Embed|null
     */
    public function getEmbed(): ?Attributes\Embed
    {
        return $this->embed;
    }

    /**
     * @param Attributes\Embed|null $embed
     * @return $this
     */
    public function setEmbed(?Attributes\Embed $embed): Attributes
    {
        $this->embed = $embed;

        return $this;
    }

    /**
     * @return Attributes\File[]|null
     */
    public function getFiles(): ?array
    {
        return $this->files;
    }

    /**
     * @param Attributes\File[]|null $files
     * @return $this
     */
    public function setFiles(?array $files): Attributes
    {
        $this->files = $files;

        return $this;
    }
}
