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

namespace CappasitySDK\Client\Model\Response\Files\ListGet\Data\Attributes;

class File
{
    /**
     * Filename
     * @var string
     */
    private $filename;

    /**
     * Type
     * @var string
     */
    private $type;

    /**
     * File size
     * @var string @todo check actual type
     */
    private $contentLength;

    /**
     * File content type
     * @var string
     */
    private $contentType;

    /**
     * Content encoding of the file
     * @var null|string
     */
    private $contentEncoding;

    /**
     * Checksum
     * @var string
     */
    private $md5Hash;

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
    public function setFilename(string $filename)
    {
        $this->filename = $filename;

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
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getContentLength(): string
    {
        return $this->contentLength;
    }

    /**
     * @param string $contentLength
     * @return $this
     */
    public function setContentLength(string $contentLength)
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
    public function setContentType(string $contentType)
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getContentEncoding()
    {
        return $this->contentEncoding;
    }

    /**
     * @param null|string $contentEncoding
     * @return $this
     */
    public function setContentEncoding($contentEncoding)
    {
        $this->contentEncoding = $contentEncoding;

        return $this;
    }

    /**
     * @return string
     */
    public function getMd5Hash(): string
    {
        return $this->md5Hash;
    }

    /**
     * @param string $md5Hash
     * @return $this
     */
    public function setMd5Hash(string $md5Hash)
    {
        $this->md5Hash = $md5Hash;

        return $this;
    }
}
