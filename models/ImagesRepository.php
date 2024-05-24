<?php

namespace app\models;

use app\models\Ad;
use app\models\ImagesRecords;

class ImagesRepository
{
    private $currentOffset = 0;
    private $limit;
    private $db;

    public function __construct($limit = 1)
    {
        $this->limit = $limit;
        $this->db = Ad::find();
    }

    private function moveCurrentOffset(): void
    {
        $this->currentOffset += $this->limit;
    }

    public function getRecords()
    {
        $records = $this->db
            ->offset($this->currentOffset)
            ->limit($this->limit)
            ->where(['is not', 'image_url', null])
            ->all();
        if (!$records) {
            return false;
        }
        $this->moveCurrentOffset();
        return new ImagesRecords($records);
    }

    public function ifExistHash(Image $image): bool
    {
        return Ad::find()->where(['like', 'pictures', "%{$image->getHash()}%"])->exists();
    }

    public function ifExistUrl(Image $image): bool
    {
        return Ad::find()
            ->where(['like', 'image_url', "%{$image->getUrl()}%"])
            ->andWhere(['is not', 'pictures', null])
            ->exists();
    }

    public function saveImages(Images $images)
    {
        $hashes = [];
        foreach ($images->getImagesToSave() as $image) {
            $hashes[] = $image->getHash();
            file_put_contents("../storage/{$image->getBaseName()}", $image->getPicture());
        }
        // $jsonHashes = json_encode($hashes);
        // $record = Ad::findOne($images->getAdID());
        // $record->pictures = $jsonHashes;
        // $record->save();
    }
}
