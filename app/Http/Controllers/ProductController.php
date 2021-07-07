<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Category $category): \Inertia\Response
    {
        $categories = Category::all();
        $products = $category['products'];

        return Inertia::render('Products/Products', [
            'current_category' => $category,
            'products' => $products,
            'categories' => $categories
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(): \Inertia\Response
    {
        $categories = Category::get(['id', 'name']);
        return Inertia::render('Products/Create', [
            'categories' => $categories
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
//        TODO
        dd($request->all());
        $validated = Product::validate($request);
        $product = new Product($validated);
        auth()->user()->products()->save($product);
        Session::flash('success','Good added successfully!');
        return Inertia::location('/');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Inertia\Response
     */
    public function show(Product $product): \Inertia\Response
    {
        return Inertia::render('Products/Show',[
            'product' => $product,
            'owner' => $product['user']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
