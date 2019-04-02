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

namespace CappasitySDK\Client\Model\Callback\Process;

use CappasitySDK\Client\Model\Response;

class JobsPushResultPost implements Response\DataInterface, \Iterator, \ArrayAccess, \Countable
{
    /**
     * @var int
     */
    private $position = 0;

    /**
     * @var JobsPushResultPost\SyncDataItem[]|mixed
     */
    private $matches = [];

    /**
     * @param JobsPushResultPost\SyncDataItem[] $matches
     */
    public function __construct(array $matches = [])
    {
        $this->position = 0;

        $className = self::class;
        array_walk($matches, function ($match) use ($className) {
            if (!$match instanceof JobsPushResultPost\SyncDataItem) {
                throw new \LogicException("Every sync item should be an instance of ${className}");
            }
        });

        $this->matches = $matches;
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return JobsPushResultPost\SyncDataItem
     */
    public function current()
    {
        return $this->matches[$this->position];
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->matches[$this->position]);
    }

    /**
     * @param int $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->matches[$offset]);
    }

    /**
     * @param int $offset
     * @return JobsPushResultPost\SyncDataItem|null
     */
    public function offsetGet($offset)
    {
        return isset($this->matches[$offset]) ? $this->matches[$offset] : null;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->matches);
    }

    /**
     * @param int $offset
     * @param JobsPushResultPost\SyncDataItem $value
     */
    public function offsetSet($offset, $value)
    {
        if (!$value instanceof JobsPushResultPost\SyncDataItem) {
            $className = self::class;
            throw new \LogicException("Every sync item should be an instance of ${className}");
        }

        if (is_null($offset)) {
            $this->matches[] = $value;
        } else {
            $this->matches[$offset] = $value;
        }
    }

    /**
     * @param int $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->matches[$offset]);
    }

    /**
     * @param array $body
     * @return JobsPushResultPost
     */
    public static function fromCallbackBody(array $body)
    {
        $data = array_map(function (array $item) {
            return new JobsPushResultPost\SyncDataItem(
                $item['id'],
                $item['uploadId'],
                array_key_exists('sku', $item) ? $item['sku'] : null,
                array_key_exists('capp', $item) ? $item['capp'] : null
            );
        }, $body);

        return new self($data);
    }
}
