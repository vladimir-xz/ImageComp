<?php

namespace app\models\images;

use app\models\Ad;
use app\models\images\ImagesRecords;

class ImagesRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Ad::find();
    }

    public function getRecords(int $fromOffset, int $limitPerPequest)
    {
        $records = $this->db
            ->offset($fromOffset)
            ->limit($limitPerPequest)
            ->where(['is not', 'image_url', null])
            ->all();
        if (!$records) {
            return false;
        }
        $recordsOfImages = array_map(fn($record) => new Images($record), $records);
        return $recordsOfImages;
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

    public function saveImages(array $images): void
    {
        $hashes = [];
        foreach ($images as $image) {
            $hashes[] = $image->getHash();
            file_put_contents("../storage/{$image->getBaseName()}", $image->getPicture());
        }
        // $jsonHashes = json_encode($hashes);
        // $record = Ad::findOne($images->getAdID());
        // $record->pictures = $jsonHashes;
        // $record->save();
    }
}