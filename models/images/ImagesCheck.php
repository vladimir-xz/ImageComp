<?php

namespace app\models\images;

class ImagesCheck
{
    public function findNew(Images $images, $repository)
    {
        $newImages = new Images($images->getAdId());
        foreach ($images as $image) {
            if ($repository->ifExistUrl($image)) {
                continue;
            } elseif ($repository->ifExistHash($image)) {
                continue;
            }
            $newImages->addImage($image);
        }
        return $newImages;
    }
}
