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
        $this->authorizeResource(ExchangeRequest::class, 'exchangeRequest');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return InertiaResponse
     */
    public function index(): InertiaResponse
    {
//        TODO
        auth()->user()->load(['exchangeRequests' => function($q) {
            $q->orderBy('updated_at', 'desc');
        }]);

        return Inertia::render('ExchangeRequests/Index', [
            'requests' => auth()->user()->exchangeRequests
        ]);
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
        $validated = ExchangeRequest::validate($request);
        ExchangeRequest::create($validated);

        Session::flash('success','Request sent successfully!');
        return Inertia::location(route('home'));
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
