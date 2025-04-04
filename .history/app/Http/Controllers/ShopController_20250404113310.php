<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ShopController extends Controller
{
     public function index(Request $request)
    {
        // Start with a base query
        $query = Product::query();
        
        // Apply search if provided
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }
        
        // Apply category filter if provided
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }
        
        // Apply sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        } else {
            // Default sorting
            $query->orderBy('created_at', 'desc');
        }
        
        // Get paginated results
        $products = $query->paginate(12);
        
        // Get all categories for the filter dropdown
        $categories = Category::all();
        
        return view('shop.index', compact('products', 'categories'));
    }
}
