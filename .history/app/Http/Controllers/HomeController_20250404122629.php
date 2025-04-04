<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Cart;

use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home() 
    {
        $product = Product::all();

        if(Auth::id()) {
        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

      

        return view('home.index',compact('product','count'));
    }

    public function login_home() {
          $product = Product::all();

       if(Auth::id()) {
        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.index',compact('product','count'));
    }

    public function product_details($id)
{
    $data = Product::find($id);

      if(Auth::id()) {
        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

    return view('home.product_details',compact('data','count'));
}

public function add_cart(Request $request, $id)
{
    $product_id = $id;
    $user = Auth::user();
    $user_id = $user->id;
    
    // Lấy số lượng từ request, mặc định là 1 nếu không có
    $quantity = $request->quantity ?? 1;
    
    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $existing_cart = Cart::where('user_id', $user_id)
                         ->where('product_id', $product_id)
                         ->first();
    
    if ($existing_cart) {
        // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
        $existing_cart->quantity += $quantity;
        $existing_cart->save();
    } else {
        // Nếu chưa có, tạo mới
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->quantity = $quantity;
        $data->save();
    }

    toastr()->timeOut(10000)->closeButton()->addSuccess('Add product to cart successfully');
    return redirect()->back();
}
    public function mycart() {
       if (Auth::id())
{
    $user = Auth::user();
    $userid = $user->id;
    $count = Cart::where('user_id', $userid)->count();

    $cart = Cart::where('user_id',$userid)->get();
}

return view('home.mycart', compact('count','cart'));
    }

    public function remove_cart($id)
{
    Cart::find($id)->delete();
    return redirect()->back()->with('message', 'Product removed from cart successfully');
}

public function update_cart_quantity(Request $request, $id)
{
    $cart = Cart::find($id);
    $cart->quantity = $request->quantity;
    $cart->save();
    return redirect()->back()->with('message', 'Cart quantity updated successfully');
}
 public function view_shop(Request $request)
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