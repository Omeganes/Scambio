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
        auth()->user()->load([
            'products' => function ($q) {
                $q->orderBy('updated_at', 'desc');
            },
            'products.exchangeRequests'
        ]);

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


    /**
     * add credit from your credit card
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function credit(Request $request): \Illuminate\Http\Response
    {
        $user = auth()->user();
        if(!isset($user->account_number)) {
            Session::flash('warning','You need to add a credit card first!');
            return Inertia::location(route('home'));
        }

        $validated = $request->validate([
           'amount' => 'required|numeric|min:1'
        ]);

        $user->credit += $validated['amount'];
        $user->save();

        Session::flash('success','Amount has been transferred successfully!');
        return Inertia::location(route('home'));
    }
}
