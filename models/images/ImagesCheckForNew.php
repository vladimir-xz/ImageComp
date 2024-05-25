<?php

namespace app\models\images;

class ImagesCheckForNew
{
    public function findNewImages(Images $images, $repository)
    {
        $newImages = [];
        foreach ($images as $image) {
            if ($repository->ifExistUrl($image)) {
                continue;
            } elseif ($repository->ifExistHash($image)) {
                continue;
            }
            $newImages[] = $image;
        }
        return $newImages;
    }
}
