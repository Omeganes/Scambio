<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ExchangeRequestController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(ExchangeRequest::class, 'request');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Product $product
     * @return InertiaResponse
     */
    public function index(Product $product): InertiaResponse
    {
        return Inertia::render('ExchangeRequests/Index', [
            'product' => $product->load('exchangeRequests')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Product $product
     * @return Response|InertiaResponse
     */
    public function create(Product $product): Response|InertiaResponse
    {
        $ownedProducts = auth()->user()->products;

        if($ownedProducts->count() === 0) {
            Session::flash('warning',"You don't have any items to exchange! :(");
            return Inertia::location(route('home'));
        }

        return Inertia::render('ExchangeRequests/Create', [
            'product' => $product,
            'ownedProducts' => $ownedProducts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $validated = ExchangeRequest::validate($request);
        ExchangeRequest::create($validated);

        Session::flash('success','Request sent successfully!');
        return Inertia::location(route('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $req
     * @param Product $product
     * @param ExchangeRequest $request
     * @return Response
     */
    public function update(Request $req, Product $product, ExchangeRequest $request): Response
    {
        $request->acceptDeal();

        return Inertia::location(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $req
     * @param Product $product
     * @param ExchangeRequest $request
     * @return Response
     */
    public function destroy(Request $req, Product $product, ExchangeRequest $request): Response
    {
        $request->rejectDeal();

        return Inertia::location(route('home'));
    }
}
