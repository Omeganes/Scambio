<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;
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

    /**
     * view the form to edit the user profile
     *
     * @return Response
     */
    public function edit(): Response
    {
        return Inertia::render('Auth/EditProfile');
    }

    public function update(Request $request)
    {
        dd($request->all());
    }
}
