<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Category;

use Stripe;

use Session;

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
    
   
    $quantity = $request->quantity ?? 1;
    
    
    $existing_cart = Cart::where('user_id', $user_id)
                         ->where('product_id', $product_id)
                         ->first();
    
    if ($existing_cart) {
        
        $existing_cart->quantity += $quantity;
        $existing_cart->save();
    } else {
        
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
public function confirm_order(Request $request)
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
     $order->quantity = $carts->quantity;
    $order->save();
   
}

$cart_remove = Cart::where('user_id', $userid)->get();

foreach ($cart_remove as $remove)
{
    $data = Cart::find($remove->id);
    $data->delete();
}
 toastr()->timeOut(10000)->closeButton()->addSuccess('Orders successfully');
 return redirect()->back();
}
public function myorders() {
$user = Auth::user()->id;
$count = Cart::where('user_id', $user)->get()->count();
$order = Order::where('user_id',$user)->get();
return view('home.order', compact('count','order'));
}
public function delete_order($id)
{
    $order = Order::find($id);
    
   
    if (!$order) {
        return redirect()->back()->with('message', 'Order not found');
    }
    
    
    if ($order->user_id != Auth::id()) {
        return redirect()->back()->with('message', 'Unauthorized action');
    }
    
   
    $order->delete();
    
    // Redirect with success message
    return redirect()->back()->with('message', 'Order Deleted Successfully');
}
public function stripe($total)
{
    return view('home.stripe', compact('total'));
}

public function stripePost(Request $request)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
  
    $total = $request->input('total', 0);
    
    
    $amount = (int)($total * 100);
    
  
    $amount = max($amount, 50);

    Stripe\Charge::create([
        "amount" => $amount,
        "currency" => "usd",
        "source" => $request->stripeToken,
        "description" => "Payment for order"
    ]);

   $name = Auth::user()->name;
$phone = Auth::user()->phone;
$address = Auth::user()->address;
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
     $order->quantity = $carts->quantity;
     $order->payment_status = "paid";
    $order->save();
   
}

$cart_remove = Cart::where('user_id', $userid)->get();

foreach ($cart_remove as $remove)
{
    $data = Cart::find($remove->id);
    $data->delete();
}
 toastr()->timeOut(10000)->closeButton()->addSuccess('Orders successfully');
 return redirect('mycart');
}

public function view_contact()
{
    $product = Product::all();

        if(Auth::id()) {
        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

    return view('home.view_contact',compact('product','count'));
}

  public function search(Request $request)
    {
        $search_text = $request->input('search_text');
        
        // Validate the search text
        if(empty($search_text)) {
            return redirect()->back()->with('message', 'Please enter a search term');
        }
        
        // Search in product title, description, category, and brand
        $products = Product::where('title', 'LIKE', "%{$search_text}%")
                         ->orWhere('description', 'LIKE', "%{$search_text}%")
                         ->orWhere('category', 'LIKE', "%{$search_text}%")
                         ->orWhere('brand', 'LIKE', "%{$search_text}%")
                         ->paginate(9);
                         
        
        $count = 0;
        if(Auth::check()) {
            $count = Cart::where('user_id', Auth::id())->count();
        }
        
        return view('home.search_result', compact('products', 'search_text', 'count'));
    }
}