<?php

namespace app\models;

use app\models\Images;

class ImagesRecords implements \Iterator
{
    private int $index;
    private array $records;

    public function __construct($records)
    {
        $this->records = array_map(fn ($record) => new Images($record), $records);
    }

    public function rewind(): void
    {
        $this->index = 0;
    }

    public function current(): mixed
    {
        return $this->records[$this->key()];
    }

    public function key(): mixed
    {
        return $this->index;
    }

    public function next(): void
    {
        ++$this->index;
    }

    public function valid(): bool
    {
        return isset($this->records[$this->index]);
    }
}
