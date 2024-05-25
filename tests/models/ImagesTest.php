<?php

namespace app\Tests;

require_once __DIR__ . '/../../models/images/Image.php';
require_once __DIR__ . '/../../models/images/Images.php';

use PHPUnit\Framework\TestCase;
use app\models\images\Images;
use app\models\images\Image;

final class ImagesTest extends TestCase
{
    private $images;

    public function setUp(): void
    {
        $this->images = new Images(12345);
    }

    public function testAddImage()
    {
        $image1 = new Image('image1.jpg');
        $image2 = new Image('image2.jpg');
        $this->images->addImage($image1);
        $this->images->addImage($image2);
        $this->assertEquals(2, $this->images->getNewAnount());
        $this->assertInstanceOf(Image::class, $this->images->images[0]);
        $this->assertInstanceOf(Image::class, $this->images->images[1]);
    }

    public function testGetAdId()
    {
        $this->assertEquals(12345, $this->images->getAdID());
    }
}
