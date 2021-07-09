<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ExchangeRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Product $product
     * @return InertiaResponse
     */
    public function create(Product $product): InertiaResponse
    {
        $ownedProducts = auth()->user()->products;
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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param ExchangeRequest $exchangeRequest
     * @return Response
     */
    public function show(ExchangeRequest $exchangeRequest): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ExchangeRequest $exchangeRequest
     * @return Response
     */
    public function edit(ExchangeRequest $exchangeRequest): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ExchangeRequest $exchangeRequest
     * @return Response
     */
    public function update(Request $request, ExchangeRequest $exchangeRequest): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ExchangeRequest $exchangeRequest
     * @return Response
     */
    public function destroy(ExchangeRequest $exchangeRequest): Response
    {
        //
    }
}
