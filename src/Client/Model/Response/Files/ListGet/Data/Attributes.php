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

namespace CappasitySDK\Client\Model\Response\Files\ListGet\Data;

class Attributes
{
    /**
     * Custom name of the file
     * @var string
     */
    private $name;

    /**
     * File description
     * @var string
     */
    private $description;

    /**
     * Some link for a given file
     * @var null|string
     */
    private $website;

    /**
     * When file upload has started
     * @var integer
     */
    private $startedAt;

    /**
     * When file upload has been completed
     * @var integer
     */
    private $uploadedAt;

    /**
     * Status of the file, `pending`, `uploaded` ot `processed`
     * @var string
     */
    private $status;

    /**
     * Owner of the file - either email or alias
     * @var string
     */
    private $owner;

    /**
     * Size of complete bundle in bytes
     * @var integer
     */
    private $contentLength;

    /**
     * This field will be present if file is public
     * @var null|string @todo which type?
     */
    private $public;

    /**
     * If error has happened during processing, its code will be here
     * @var null|string
     */
    private $error;

    /**
     * @var Attributes\File[]
     */
    private $files;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param null|string $website
     * @return $this
     */
    public function setWebsite(?string $website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return int
     */
    public function getStartedAt(): int
    {
        return $this->startedAt;
    }

    /**
     * @param int $startedAt
     * @return $this
     */
    public function setStartedAt(int $startedAt)
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getUploadedAt(): int
    {
        return $this->uploadedAt;
    }

    /**
     * @param int $uploadedAt
     * @return $this
     */
    public function setUploadedAt(int $uploadedAt)
    {
        $this->uploadedAt = $uploadedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     * @return $this
     */
    public function setOwner(string $owner)
    {
        $this->owner = $owner;

        return $this;
    }

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
    public function setContentLength(int $contentLength)
    {
        $this->contentLength = $contentLength;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * @param null|string $public
     * @return $this
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param null|string $error
     * @return $this
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @return Attributes\File[]
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @param Attributes\File[] $files
     * @return $this
     */
    public function setFiles(array $files)
    {
        $this->files = $files;

        return $this;
    }
}
