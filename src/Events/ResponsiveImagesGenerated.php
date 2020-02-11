<?php

namespace Spatie\Medialibrary\Events;

use Illuminate\Queue\SerializesModels;
use Spatie\Medialibrary\Models\Media;

class ResponsiveImagesGenerated
{
    use SerializesModels;

    public Media $media;

    public function __construct(Media $media)
    {
        $this->media = $media;
    }
}
