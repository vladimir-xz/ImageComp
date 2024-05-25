<?php

namespace app\models\images;

class Images implements \Iterator
{
    private int $index = 0;
    protected int $newAmount = 0;
    protected string $adId;
    protected array $images;

    public function __construct(int $adId)
    {
        $this->images = [];
        $this->adId = $adId;
    }

    public function addImage(Image $image): void
    {
        $this->images[] = $image;
        $this->newAmount++;
    }

    public function getAdId(): int
    {
        return $this->adId;
    }

    public function getNewAnount(): int
    {
        return $this->newAmount;
    }

    public function __get($key)
    {
        return $this->$key;
    }

    public function rewind(): void
    {
        $this->index = 0;
    }

    public function current(): mixed
    {
        return $this->images[$this->key()];
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
        return isset($this->images[$this->index]);
    }
}
