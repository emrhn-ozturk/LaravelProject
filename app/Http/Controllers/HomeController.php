<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        $categories = Category::all();
        
        return view('front.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('front.product', compact('product'));
    }
}