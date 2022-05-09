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

namespace CappasitySDK\Client\Model\Response\Files\Common\File\Attributes;

class File
{
    /**
     * @var integer
     */
    private $contentLength;

    /**
     * @var string
     */
    private $contentType;

    /**
     * @var string|null
     */
    private $md5Hash;

    /**
     * @var string
     */
    private $bucket;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $filename;

    /**
     * @return int
     */
    public function getContentLength(): int
    {
        return $this->contentLength;
    }

    /**
     * @param int $contentLength
     * @return $this
     */
    public function setContentLength($contentLength): File
    {
        $this->contentLength = $contentLength;

        return $this;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     * @return $this
     */
    public function setContentType(string $contentType): File
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMd5Hash(): string
    {
        return $this->md5Hash;
    }

    /**
     * @param string|null $md5Hash
     * @return $this
     */
    public function setMd5Hash(string $md5Hash): File
    {
        $this->md5Hash = $md5Hash;

        return $this;
    }

    /**
     * @return string
     */
    public function getBucket(): string
    {
        return $this->bucket;
    }

    /**
     * @param string $bucket
     * @return $this
     */
    public function setBucket(string $bucket): File
    {
        $this->bucket = $bucket;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): File
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     * @return $this
     */
    public function setFilename(string $filename): File
    {
        $this->filename = $filename;

        return $this;
    }
}
