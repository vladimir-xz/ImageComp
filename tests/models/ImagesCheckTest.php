<?php

namespace app\Tests;

require_once __DIR__ . '/../../models/images/Image.php';
require_once __DIR__ . '/../../models/images/Images.php';
require_once __DIR__ . '/../../models/images/ImagesRepository.php';
require_once __DIR__ . '/../../models/images/ImagesCheck.php';

use PHPUnit\Framework\TestCase;
use app\models\images\Images;
use app\models\images\Image;
use app\models\images\ImagesRepository;
use app\models\images\ImagesCheck;

final class ImagesCheckTest extends TestCase
{
    private $images;
    private $checker;

    public function setUp(): void
    {
        $checker = new ImagesCheck();
        $image1 = new Image('image1.jpg');
        $image2 = new Image('image2.jpg');
        $images = new Images(100);
        $images->addImage($image1);
        $images->addImage($image2);
        $this->images = $images;
        $this->checker = $checker;
    }

    public function testFindNew()
    {
        $repositoryMock = $this->createMock(ImagesRepository::class);

        $repositoryMock->method('ifExistUrl')
        ->will($this->onConsecutiveCalls(false, false));

        $repositoryMock->method('ifExistHash')
        ->will($this->onConsecutiveCalls(true, false));

        $newImages = $this->checker->findNew($this->images, $repositoryMock);
        $this->assertEquals(100, $newImages->getAdId());
        $this->assertEquals('image2.jpg', $newImages->images[0]->getBaseName());
        $this->assertCount(1, $newImages->images);
    }
}
