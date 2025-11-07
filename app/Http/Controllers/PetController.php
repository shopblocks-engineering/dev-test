<?php

namespace App\Http\Controllers;

use App\Contracts\PetApi;
use App\Services\CatService;

class PetController extends Controller
{
    public function __construct(protected CatService $petService)
    {

    }

    /**
     * Display a listing of all the pets.
     */
    public function index()
    {
        $pets = $this->petService->searchForPets()->map(function ($pet) {
            $pet['path'] = '/pets/' . $pet['id'];
            return $pet;
        });

        return view('dashboard', compact('pets'));
    }

    /**
     * Display the individual pet.
     */
    public function show(string $id)
    {
        $pet = $this->petService->getPet($id);
        if (!$pet) {
            abort(404);
        }
        $image = $this->petService->getImage($pet['reference_image_id']);
        return view('show', compact('pet', 'image'));
    }
}
