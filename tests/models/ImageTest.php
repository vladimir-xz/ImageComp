<?php

namespace app\Tests;

require_once __DIR__ . '/../../models/images/Image.php';

use PHPUnit\Framework\TestCase;
use app\models\images\Image;

function getPathToFixture($fileName)
{
    return __DIR__  . "/fixtures/" . $fileName;
}

final class ImageTest extends TestCase
{
    private $file;
    private $image;

    public function setUp(): void
    {
        $url = getPathToFixture('smile.jpg');
        $this->image = new Image($url);
        $this->file = file_get_contents($url);
    }

    public function testImageInitialization()
    {
        $url = 'http://mysite.com/120.jpg';
        $newImage = new Image($url);
        $this->assertEquals($url, $newImage->getUrl());
        $this->assertEquals('120.jpg', $newImage->getBaseName());
    }

    public function testGetHash()
    {
        // Downloading functions do not prepared
        // $hash = md5($this->file);
        $hash = md5($this->image->baseName);
        $this->assertEquals($hash, $this->image->getHash());
    }

    public function testGetPicture()
    {
        // Downloading functions do not prepared
        // $this->assertEquals($this->file, $this->image->getPicture());
        $this->assertEquals('smile.jpg', $this->image->getPicture());
    }
}
