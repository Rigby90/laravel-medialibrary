<?php

namespace Spatie\Medialibrary\ImageGenerators\FileTypes;

use Illuminate\Support\Collection;
use Imagick;
use ImagickPixel;
use Spatie\Medialibrary\Conversion\Conversion;
use Spatie\Medialibrary\ImageGenerators\BaseGenerator;

class Svg extends BaseGenerator
{
    public function convert(string $file, Conversion $conversion = null): string
    {
        $imageFile = pathinfo($file, PATHINFO_DIRNAME).'/'.pathinfo($file, PATHINFO_FILENAME).'.jpg';

        $image = new Imagick();
        $image->readImage($file);
        $image->setBackgroundColor(new ImagickPixel('none'));
        $image->setImageFormat('jpg');

        file_put_contents($imageFile, $image);

        return $imageFile;
    }

    public function requirementsAreInstalled(): bool
    {
        return class_exists('Imagick');
    }

    public function supportedExtensions(): Collection
    {
        return collect('svg');
    }

    public function supportedMimeTypes(): Collection
    {
        return collect('image/svg+xml');
    }
}
