<?php

namespace App\Contracts;

interface PetApi
{
    public function searchForPets(string $query = ''): \Illuminate\Support\Collection;

    public function getPet(string $id): ?\Illuminate\Support\Collection;

    public function getImage(string $id): ?string;
}
