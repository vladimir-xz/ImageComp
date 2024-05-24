<?php

namespace app\Tests;

require_once __DIR__ . '/../../models/Image.php';
require_once __DIR__ . '/../../models/Images.php';
require_once __DIR__ . '/../../models/ImagesProcessor.php';
require_once __DIR__ . '/../../models/ImagesRepository.php';


use PHPUnit\Framework\TestCase;
use app\models\ImagesProcessor;
use app\models\ImagesRepository;
use app\models\Images;
use app\models\Image;

class ImagesProcessorTest extends TestCase
{
    public function testProcess()
    {
        $repositoryMock = $this->createMock(ImagesRepository::class);

        $imagesMock = $this->createMock(Images::class);

        $imageMock = $this->createMock(Image::class);

        $imagesMock->method('current')
            ->willReturn($imageMock);
        $imagesMock->method('key')
            ->willReturn(0);
        $imagesMock->method('valid')
            ->willReturnOnConsecutiveCalls(true, false);

        $repositoryMock->method('getRecords')
            ->will($this->onConsecutiveCalls([$imagesMock], null));

        $repositoryMock->expects($this->once())
            ->method('saveImages')
            ->with($imagesMock);

        $imagesMock->method('getAmountOfNew')
            ->willReturn(1);

        $repositoryMock->method('ifExistUrl')
            ->willReturn(false);
        $repositoryMock->method('ifExistHash')
            ->willReturn(false);

        $imagesMock->expects($this->once())
            ->method('addImageToSave')
            ->with($this->isInstanceOf(Image::class));

        $processor = new ImagesProcessor($repositoryMock);

        $result = $processor->process();
        $this->assertEquals(1, $result);
    }
}
