<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan halaman utama (Home)
    public function home()
    {
        $categories = Category::withCount('products')->get();
        $products = Product::with('category')->latest()->take(6)->get();

        return view('home', compact('categories', 'products'));
    }

    // Menampilkan halaman daftar seluruh produk (bisa difilter per kategori)
    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategory = null;

        $query = Product::with('category')->latest();

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
            $selectedCategory = Category::find($request->category);
        }

        $products = $query->get();

        return view('products.index', compact('products', 'categories', 'selectedCategory'));
    }

    // Menampilkan halaman detail produk berdasarkan ID
    public function show(Product $product)
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }
}