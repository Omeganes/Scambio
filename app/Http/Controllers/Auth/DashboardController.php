<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the current user profile
     *
     * @return Response
     */
    public function view(): Response
    {
        return Inertia::render('Dashboard');
    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
