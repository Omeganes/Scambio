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
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index(Category $category): \Inertia\Response
    {
        $categories = Category::all();

        $category->load(['products' => function ($q) {
            $q->orderBy('updated_at', 'desc');
        }]);

        return Inertia::render('Products/Index', [
            'current_category' => $category,
            'products' => $category['products'],
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
        $validated = Product::validate($request);
        $validated['images'] = self::saveImages($validated['images']);
        $product = new Product($validated);
        auth()->user()->products()->save($product);
        Session::flash('success','Item added successfully!');
        return Inertia::location(route('home'));
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
     * @return \Inertia\Response
     */
    public function edit(Product $product): \Inertia\Response
    {
        $categories = Category::get(['id', 'name']);
        return Inertia::render('Products/Edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function update(Request $request, Product $product): Response
    {
        $validated = Product::validate($request);
        if( empty($validated['images']) ) {
            unset($validated['images']);
        } else {
            $validated['images'] = self::saveImages($validated['images']);
        }
        $product->update($validated);

        Session::flash('success','Item updated successfully!');
        return Inertia::location(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product): Response
    {
        $product->delete();

        Session::flash('info','Item deleted successfully!');
        return Inertia::location(route('home'));
    }

    /**
     * Save an array of images
     *
     * @param $images
     * @return array
     */
    private static function saveImages($images): array
    {
        $imagesArr = [];
        foreach ($images as $image) {
            $path = $image->store('images', 'public');
            array_push($imagesArr, asset('storage/' . $path));
        }
        return $imagesArr;
    }
}
