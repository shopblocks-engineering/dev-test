<?php

declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Support\Collection;

interface ListBreedsService
{
    /**
     * List breeds
     *
     * @return \Illuminate\Support\Collection<int, \App\Contracts\Api\Breed>
     */
    public function execute(): Collection;
}
