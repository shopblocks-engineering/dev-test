<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\GetBreedService;
use App\Contracts\GetImageService;
use Illuminate\Contracts\View\View;

readonly class Breed
{
    /**
     * Breed constructor.
     */
    public function __construct(
        private GetBreedService $getBreedService,
        private GetImageService $getImageService
    ) {
    }

    /**
     * Show single breed
     */
    public function index(string $breedId): View
    {
        $breed = $this->getBreedService->execute($breedId);
        if (null === $breed) {
            abort(404);
        }

        return view('breed', ['breed' => $breed, 'image' => $this->getImageService->execute($breed->imageId)]);
    }
}
