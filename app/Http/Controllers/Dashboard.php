<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\ListBreedsService;
use Illuminate\Contracts\View\View;

readonly class Dashboard
{
    /**
     * Dashboard constructor.
     */
    public function __construct(
        private ListBreedsService $listBreedsService
    ) {
    }

    /**
     * List all breeds in the dashboard
     */
    public function index(): View
    {
        return view('dashboard', ['breeds' => $this->listBreedsService->execute()]);
    }
}
