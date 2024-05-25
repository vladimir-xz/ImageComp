<?php

namespace app\models\images;

class ImagesProcessor
{
    private $repository;
    private $successed;
    private $imagesCheck;

    public function __construct(
        $repositury = new ImagesRepository(),
        $imagesCheck = new ImagesCheckForNew()
    ) {
        $this->successed = 0;
        $this->repository = $repositury;
        $this->imagesCheck = $imagesCheck;
    }

    private function addSuccessed(array $images): void
    {
        $this->successed += count($images);
    }

    public function process(int $fromOffset = 0, int $limitPerPequest = 5): int
    {
        if (!$records = $this->repository->getRecords($fromOffset, $limitPerPequest)) {
            return $this->successed;
        }
        foreach ($records as $images) {
            $newImages = $this->imagesCheck->findNewImages($images, $this->repository);
            $this->repository->saveImages($newImages);
            $this->addSuccessed(($newImages));
        }
        $nextOffset = $fromOffset + $limitPerPequest;
        return $this->process($nextOffset);
    }
}
