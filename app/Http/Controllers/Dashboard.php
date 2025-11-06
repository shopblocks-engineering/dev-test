<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

readonly class Dashboard
{
    /**
     * List all breeds in the dashboard
     */
    public function index(): View
    {
        return view('dashboard');
    }
}
