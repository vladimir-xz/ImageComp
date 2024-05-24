<?php

namespace app\Tests;

require_once __DIR__ . '/../../models/Image.php';
require_once __DIR__ . '/../../models/Images.php';

use PHPUnit\Framework\TestCase;
use app\models\Images;
use app\models\Image;

final class ImagesTest extends TestCase
{
    private $images;

    public function setUp(): void
    {
        $record = (object) [
            'image_url' => json_encode(['image1.jpg', 'image2.jpg']),
            'ad_id' => '12345'
        ];
        $this->images = new Images($record);
    }

    public function testImagesInitialization()
    {
        $this->assertEquals('12345', $this->images->getAdID());
        $this->assertCount(2, $this->images);
        $this->assertInstanceOf(Image::class, $this->images->images[0]);
        $this->assertInstanceOf(Image::class, $this->images->images[1]);
    }

    public function testAddImageToSave()
    {
        $newImage = new Image('image3.jpg');
        $this->images->addImageToSave($newImage);

        $this->assertCount(1, $this->images->getImagesToSave());
        $this->assertEquals(1, $this->images->getAmountOfNew());
        $this->assertSame($newImage, $this->images->getImagesToSave()[0]);
    }

    public function testIterator()
    {
        $expectedImages = [
            new Image('image1.jpg'),
            new Image('image2.jpg')
        ];

        $index = 0;
        foreach ($this->images as $image) {
            $this->assertInstanceOf(Image::class, $image);
            $this->assertEquals($expectedImages[$index], $image);
            $index++;
        }

        $this->assertEquals(2, $index);
    }

    public function testMagicGet()
    {
        $record = (object) [
            'image_url' => json_encode(['image1.jpg', 'image2.jpg']),
            'ad_id' => '12345'
        ];
        $images = new Images($record);

        $this->assertEquals('12345', $images->__get('adId'));
        $this->assertCount(2, $images->__get('images'));
        $this->assertInstanceOf(Image::class, $images->__get('images')[0]);
    }
}
