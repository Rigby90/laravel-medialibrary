<?php

namespace Spatie\Medialibrary\Tests\Unit\ImageGenerators;

use Spatie\Medialibrary\ImageGenerators\FileTypes\Webp;
use Spatie\Medialibrary\Tests\TestCase;

class WebpTest extends TestCase
{
    /** @test */
    public function it_can_convert_a_webp()
    {
        $imageGenerator = new Webp();

        if (! $imageGenerator->requirementsAreInstalled()) {
            $this->markTestSkipped('Skipping webp test because requirements to run it are not met');
        }

        $media = $this->testModelWithoutMediaConversions->addMedia($this->getTestWebp())->toMediaCollection();

        $this->assertTrue($imageGenerator->canConvert($media));

        $imageFile = $imageGenerator->convert($media->getPath());

        $this->assertEquals('image/png', mime_content_type($imageFile));
    }
}
