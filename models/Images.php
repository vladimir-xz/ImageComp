<?php

namespace app\models;

use app\models\Image;

class Images implements \Iterator
{
    private int $index = 0;
    private int $amountOfNew;
    protected string $adId;
    protected array $images;
    private array $newImages = [];

    public function __construct($record)
    {
        $jsonImages = json_decode($record->image_url);
        $this->images = array_map(fn($im) => new Image($im), $jsonImages);
        $this->amountOfNew = 0;
        $this->adId = $record->ad_id;
    }

    public function addImageToSave(Image $image)
    {
        $this->amountOfNew++;
        $this->newImages[] = $image;
    }

    public function getImagesToSave()
    {
        return $this->newImages;
    }

    public function getAmountOfNew()
    {
        return $this->amountOfNew;
    }

    public function getAdID()
    {
        return $this->adId;
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
