<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Cart;

use App\Models\Order;

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
public function view_shop()
{
    $product = Product::all();

        if(Auth::id()) {
        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

    return view('home.view_shop',compact('product','count'));
}
public function comfirm_order(Request $request)
{
    $name = $request->name;
    $address = $request->address;
    $phone = $request->phone;
    $userid = Auth::user()->id;
    $cart = Cart::where('user_id', $userid)->get();

    foreach ($cart as $carts)
{
    $order = new Order;
    $order->name = $name;
    $order->rec_address = $address;
    $order->phone = $phone;
    $order->user_id = $userid;
    $order->product_id = $carts->product_id;
    $order->save();
   
}

$cart_remove = Cart::where('user_id', $userid)->get();

foreach ($cart_remove as $remove)
{
    $data = Cart::find($remove->id);
    $data->delete();
}
 return redirect()->back();
}

}