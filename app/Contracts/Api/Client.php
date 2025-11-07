<?php

declare(strict_types=1);

namespace App\Contracts\Api;

interface Client
{
    /**
     * Return instance of breeds resource
     */
    public function breeds(): BreedsResource;

    /**
     * Return instance of images resource
     */
    public function images(): ImagesResource;
}
