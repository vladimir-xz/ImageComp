<?php

namespace app\models;

use app\models\ImagesRepository;

class ImagesProcessor
{
    private $repository;
    private $successed;

    public function __construct($repositury = new ImagesRepository())
    {
        $this->successed = 0;
        $this->repository = $repositury;
    }

    private function addSuccessed($images)
    {
        $this->successed += $images->getAmountOfNew();
    }

    public function process($fromOffset = 0, $limitPerPequest = 5): int
    {
        if (!$records = $this->repository->getRecords($fromOffset, $limitPerPequest)) {
            return $this->successed;
        }
        foreach ($records as $images) {
            $this->checkImages($images);
            $this->repository->saveImages($images);
            $this->addSuccessed($images);
        }
        $nextOffset = $fromOffset + $limitPerPequest;
        return $this->process($nextOffset);
    }

    private function checkImages($images)
    {
        foreach ($images as $image) {
            if ($this->repository->ifExistUrl($image)) {
                continue;
            } elseif ($this->repository->ifExistHash($image)) {
                continue;
            }
            $images->addImageToSave($image);
        }
    }
}
