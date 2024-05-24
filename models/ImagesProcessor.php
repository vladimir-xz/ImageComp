<?php

namespace app\models;

use app\models\ImagesRepository;

class ImagesProcessor
{
    private $repository;
    private $successed = 0;

    public function __construct($repositury = new ImagesRepository())
    {
        $this->repository = $repositury;
    }

    private function addSuccessed($amount)
    {
        $this->successed += $amount;
    }

    public function process()
    {
        while ($records = $this->repository->getRecords()) {
            $this->processRecords($records);
        };
        return $this->successed;
    }

    private function processRecords($records)
    {
        foreach ($records as $images) {
            $this->checkImages($images);
            $this->repository->saveImages($images);
            $this->addSuccessed($images->getAmountOfNew());
        }
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
