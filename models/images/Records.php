<?php

namespace app\models\images;

class Records implements \Iterator
{
    private int $index = 0;
    private array $records = [];

    public function __construct()
    {
        $this->records = [];
    }

    public function addRecord($record): void
    {
        $this->records[] = $record;
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
