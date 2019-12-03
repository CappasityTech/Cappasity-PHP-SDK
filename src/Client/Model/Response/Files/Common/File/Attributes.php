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

namespace CappasitySDK\Client\Model\Response\Files\Common\File;

class Attributes
{
    /**
     * @var string
     */
    private $alias;

    /**
     * @var string
     */
    private $backgroundColor;

    /**
     * @var string
     */
    private $backgroundImage;

    /**
     * @var string
     */
    private $bucket;

    /**
     * @var string
     */
    private $cVer;

    /**
     * @var integer
     */
    private $contentLength;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $owner;

    /**
     * @var string
     */
    private $packed;

    /**
     * @var integer
     */
    private $parts;

    /**
     * @var string
     */
    private $preview;

    /**
     * @var string
     */
    private $public;

    /**
     * @var string
     */
    private $simple;

    /**
     * @var integer
     */
    private $startedAt;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $uploadId;

    /**
     * @var string
     */
    private $uploadType;

    /**
     * @var integer
     */
    private $uploaded;

    /**
     * @var integer
     */
    private $uploadedAt;

    /**
     * @var Attributes\Embed
     */
    private $embed;

    /**
     * @var Attributes\File[]
     */
    private $files;

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     * @return $this
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $backgroundColor
     * @return $this
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * @return string
     */
    public function getBackgroundImage()
    {
        return $this->backgroundImage;
    }

    /**
     * @param string $backgroundImage
     * @return $this
     */
    public function setBackgroundImage($backgroundImage)
    {
        $this->backgroundImage = $backgroundImage;

        return $this;
    }

    /**
     * @return string
     */
    public function getBucket()
    {
        return $this->bucket;
    }

    /**
     * @param string $bucket
     * @return $this
     */
    public function setBucket($bucket)
    {
        $this->bucket = $bucket;

        return $this;
    }

    /**
     * @return string
     */
    public function getCVer()
    {
        return $this->cVer;
    }

    /**
     * @param string $cVer
     * @return $this
     */
    public function setCVer($cVer)
    {
        $this->cVer = $cVer;

        return $this;
    }

    /**
     * @return int
     */
    public function getContentLength()
    {
        return $this->contentLength;
    }

    /**
     * @param int $contentLength
     * @return $this
     */
    public function setContentLength($contentLength)
    {
        $this->contentLength = $contentLength;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     * @return $this
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return string
     */
    public function getPacked()
    {
        return $this->packed;
    }

    /**
     * @param string $packed
     * @return $this
     */
    public function setPacked($packed)
    {
        $this->packed = $packed;

        return $this;
    }

    /**
     * @return int
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * @param int $parts
     * @return $this
     */
    public function setParts($parts)
    {
        $this->parts = $parts;

        return $this;
    }

    /**
     * @return string
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * @param string $preview
     * @return $this
     */
    public function setPreview($preview)
    {
        $this->preview = $preview;

        return $this;
    }

    /**
     * @return string
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * @param string $public
     * @return $this
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * @return string
     */
    public function getSimple()
    {
        return $this->simple;
    }

    /**
     * @param string $simple
     * @return $this
     */
    public function setSimple($simple)
    {
        $this->simple = $simple;

        return $this;
    }

    /**
     * @return int
     */
    public function getStartedAt()
    {
        return $this->startedAt;
    }

    /**
     * @param int $startedAt
     * @return $this
     */
    public function setStartedAt($startedAt)
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

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
    public function getUploadId()
    {
        return $this->uploadId;
    }

    /**
     * @param string $uploadId
     * @return $this
     */
    public function setUploadId($uploadId)
    {
        $this->uploadId = $uploadId;

        return $this;
    }

    /**
     * @return string
     */
    public function getUploadType()
    {
        return $this->uploadType;
    }

    /**
     * @param string $uploadType
     * @return $this
     */
    public function setUploadType($uploadType)
    {
        $this->uploadType = $uploadType;

        return $this;
    }

    /**
     * @return int
     */
    public function getUploaded()
    {
        return $this->uploaded;
    }

    /**
     * @param int $uploaded
     * @return $this
     */
    public function setUploaded($uploaded)
    {
        $this->uploaded = $uploaded;

        return $this;
    }

    /**
     * @return int
     */
    public function getUploadedAt()
    {
        return $this->uploadedAt;
    }

    /**
     * @param int $uploadedAt
     * @return $this
     */
    public function setUploadedAt($uploadedAt)
    {
        $this->uploadedAt = $uploadedAt;

        return $this;
    }

    /**
     * @return Attributes\Embed
     */
    public function getEmbed()
    {
        return $this->embed;
    }

    /**
     * @param Attributes\Embed $embed
     * @return $this
     */
    public function setEmbed(Attributes\Embed $embed)
    {
        $this->embed = $embed;

        return $this;
    }

    /**
     * @return Attributes\File[]
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param Attributes\File[] $files
     * @return $this
     */
    public function setFiles($files)
    {
        $this->files = $files;

        return $this;
    }
}
