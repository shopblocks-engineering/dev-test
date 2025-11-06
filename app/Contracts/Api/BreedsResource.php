<?php

declare(strict_types=1);

namespace App\Contracts\Api;

use Illuminate\Support\Collection;

interface BreedsResource
{
    /**
     * Get breed based on breed ID
     */
    public function get(int $breedId): Breed;

    /**
     * List breeds
     *
     * @return \Illuminate\Support\Collection<int, \App\Http\Services\CatApi\Dto\Breed>
     */
    public function list(): Collection;
}
