<?php

namespace app\models\images;

use app\models\Ad;

class ImagesRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Ad::find();
    }

    public function getRecords(int $fromOffset, int $limitPerPequest): ?Records
    {
        $records = $this->db
            ->offset($fromOffset)
            ->limit($limitPerPequest)
            ->where(['is not', 'image_url', null])
            ->all();
        if (!$records) {
            return null;
        }
        $preparedRecords = $this->prepareRecords($records);
        return $preparedRecords;
    }

    private function prepareRecords($records): Records
    {
        $preparedRecords = new Records();
        foreach ($records as $record) {
            $images = new Images($record->ad_id);
            $urls = json_decode($record->image_url);
            array_map(fn ($url) => $images->addImage(new Image($url)), $urls);
            $preparedRecords->addRecord($images);
        }
        return $preparedRecords;
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

    public function save(Images $images): void
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
