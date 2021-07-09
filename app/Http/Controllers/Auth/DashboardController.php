<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        auth()->user()->load(['products' => function ($q) {
            $q->orderBy('updated_at', 'desc');
        }]);

        return Inertia::render('Dashboard', [
            'products' => auth()->user()->products
        ]);
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): \Illuminate\Http\Response
    {
        $validated = User::validate($request);
        auth()->user()->update($validated);


        Session::flash('success','Profile updated successfully!');
        return Inertia::location(route('home'));
    }
}
