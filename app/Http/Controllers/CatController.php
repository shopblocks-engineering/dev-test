<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\CatService;
use Illuminate\View\View;


class CatController extends Controller
{
    private CatService $catService;

    /**
     * Constructor to initialize the CatService.
     */
    public function __construct(CatService $catService)
    {
        $this->catService = $catService;
    }

    /**
     * Display a listing of cat breeds.
     *
     */
    public function index(): View
    {
        $breeds = $this->catService->allBreeds();

        return view('cats.index', compact('breeds'));
    }

    /**
     * Display the specified cat breed.
     */
    public function show(string $breedId): RedirectResponse|View
    {
        $breed = $this->catService->findBreedById($breedId);

        if (!$breed) {
            return redirect()->away("https://http.cat/404");
        }

        return view('cats.show', compact('breed'));
    }
}
