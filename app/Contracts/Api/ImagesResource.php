<?php

declare(strict_types=1);

namespace App\Contracts\Api;

interface ImagesResource
{
    /**
     * Get image based on image ID
     */
    public function get(int $imageId): Image;
}
