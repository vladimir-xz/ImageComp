<?php

namespace app\models;

use app\models\ImagesRepository;

class ImagesProcessor
{
    private $repository;
    private $successed;
    private $saved = [];

    public function __construct($repositury = new ImagesRepository())
    {
        $this->successed = 0;
        $this->repository = $repositury;
    }

    private function addSuccessed($images)
    {
        $this->successed += $images->getAmountOfNew();
    }

    public function process(): int
    {
        if (!$records = $this->repository->getRecords()) {
            return $this->successed;
        }
        foreach ($records as $images) {
            $this->checkImages($images);
            $this->repository->saveImages($images);
            $this->addSuccessed($images);
        }
        return $this->process();
    }

    private function checkImages($images)
    {
        $this->saved[] = $images;
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
