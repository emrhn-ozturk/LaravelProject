<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    public function index()
    {
        
        $products = Product::with(['category', 'user'])->get();
        return view('admin.products.index', compact('products'));
    }

    
    public function create()
    {
        
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        
        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(), // Ürünü şu an giriş yapmış olan adminin ID'sine bağla
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Ürün başarıyla eklendi.');
    }
}