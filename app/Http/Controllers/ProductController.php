<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    // //
    public function filter(Request $request)
    {
        $query = Products::query();

        if ($request->has('size_id')) {
            $query->whereHas('setItems', function ($q) use ($request) {
                $q->where('size_id', $request->size_id);
            });
        }

        if ($request->has('color_id')) {
            $query->whereHas('setItems', function ($q) use ($request) {
                $q->where('color_id', $request->color_id);
            });
        }

        $products = $query->get();

        return response()->json($products);
    }
    public function index(Request $request)
    {
        $query = Products::query();

        if ($request->has('size_id')) {
            $query->whereHas('setItems', function ($q) use ($request) {
                $q->where('size_id', $request->size_id);
            });
        }

        if ($request->has('color_id')) {
            $query->whereHas('setItems', function ($q) use ($request) {
                $q->where('color_id', $request->color_id);
            });
        }

        $products = $query->with('setItems.color', 'setItems.size')->get();

        return Inertia::render('Product/Index', [
            'products' => $products,
            'sizes' => \App\Models\Size::all(),
            'colors' => \App\Models\Colors::all(),
        ]);
    }
}
