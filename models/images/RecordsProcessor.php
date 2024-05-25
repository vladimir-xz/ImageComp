<?php

namespace app\models\images;

class RecordsProcessor
{
    private $repository;
    private $successed;
    private $checker;

    public function __construct(
        $repository = new ImagesRepository(),
        $checker = new ImagesCheck()
    ) {
        $this->successed = 0;
        $this->repository = new $repository();
        $this->checker = new $checker();
    }

    public function process(int $fromOffset = 0, int $limitPerPequest = 5): int
    {
        if (!$records = $this->repository->getRecords($fromOffset, $limitPerPequest)) {
            return $this->successed;
        }
        foreach ($records as $record) {
            $new = $this->checker->findNew($record, $this->repository);
            $this->repository->save($new);
            $this->successed += $new->getNewAnount();
        }
        $nextOffset = $fromOffset + $limitPerPequest;
        return $this->process($nextOffset);
    }
}
