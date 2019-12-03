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
     * @var string
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
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     * @return $this
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * @return string
     */
    public function getMd5Hash()
    {
        return $this->md5Hash;
    }

    /**
     * @param string $md5Hash
     * @return $this
     */
    public function setMd5Hash($md5Hash)
    {
        $this->md5Hash = $md5Hash;

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
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     * @return $this
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }
}
