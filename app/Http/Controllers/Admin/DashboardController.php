<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts   = Product::count();
        $totalCategories = Category::count();
        $totalStock      = Product::sum('stock');
        $totalValue      = Product::select(DB::raw('SUM(price * stock) as total_value'))->value('total_value') ?? 0;

        $recentProducts = Product::with('category')->latest()->take(6)->get();
        $categories     = Category::withCount('products')->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalStock',
            'totalValue',
            'recentProducts',
            'categories'
        ));
    }
}

