<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $categories = Category::orderBy('name')->get();

        return Inertia::render('Categories/Categories', [
            'categories' => $categories
        ]);
    }



    /**
     * Display a listing of the resource.
     *
     */
    public function show(Category $category): \Inertia\Response
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

}
