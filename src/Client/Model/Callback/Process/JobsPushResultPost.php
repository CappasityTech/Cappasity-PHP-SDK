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

namespace CappasitySDK\Client\Model\Callback\Process;

use ArrayAccess;
use CappasitySDK\Client\Model\Response;
use Countable;
use Iterator;
use LogicException;

class JobsPushResultPost implements Response\DataInterface, Iterator, ArrayAccess, Countable
{
    /**
     * @var int
     */
    private $position = 0;

    /**
     * @var JobsPushResultPost\SyncDataItem[]|mixed
     */
    private $matches;

    /**
     * @param JobsPushResultPost\SyncDataItem[] $matches
     */
    public function __construct(array $matches = [])
    {
        $className = self::class;
        array_walk($matches, function ($match) use ($className) {
            if (!$match instanceof JobsPushResultPost\SyncDataItem) {
                throw new LogicException("Every sync item should be an instance of {$className}");
            }
        });

        $this->matches = $matches;
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @return JobsPushResultPost\SyncDataItem
     */
    public function current(): JobsPushResultPost\SyncDataItem
    {
        return $this->matches[$this->position];
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @return void
     */
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->matches[$this->position]);
    }

    /**
     * @param mixed|int $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->matches[$offset]);
    }

    /**
     * @param mixed|int $offset
     * @return JobsPushResultPost\SyncDataItem|null
     */
    public function offsetGet($offset): ?JobsPushResultPost\SyncDataItem
    {
        return isset($this->matches[$offset]) ? $this->matches[$offset] : null;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->matches);
    }

    /**
     * @param mixed|int $offset
     * @param mixed|JobsPushResultPost\SyncDataItem $value
     */
    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof JobsPushResultPost\SyncDataItem) {
            $className = self::class;
            throw new LogicException("Every sync item should be an instance of {$className}");
        }

        if (is_null($offset)) {
            $this->matches[] = $value;
        } else {
            $this->matches[$offset] = $value;
        }
    }

    /**
     * @param mixed|int $offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->matches[$offset]);
    }

    /**
     * @param array $body
     * @return JobsPushResultPost
     */
    public static function fromCallbackBody(array $body): JobsPushResultPost
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
