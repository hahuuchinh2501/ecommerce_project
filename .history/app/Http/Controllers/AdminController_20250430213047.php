<?php

namespace App\Http\Controllers;

use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Order;
 use Barryvdh\DomPDF\Facade\Pdf;
 use App\Models\User;
 use App\Models\Contact;


use Flasher\Toastr\Laravel\FlasherToastrServiceProvider;
use function Flasher\Toastr\Prime\toastr;

class AdminController extends Controller
{
    public function view_category() {
        $data = Category::all();

        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request) {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('create category success');

        return redirect()->back();
    }

    public function delete_category($id)
{
    $data = Category::find($id);

    $data->delete();

    toastr()->timeOut(10000)->closeButton()->addSuccess('Category Deleted Successfully');

    return redirect()->back();
}
    public function edit_category($id) {
        $data = Category::find($id);

        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request, $id)
{
    $data = Category::find($id);

    $data->category_name = $request->category;

    $data->save();

      toastr()->timeOut(10000)->closeButton()->addSuccess('update category success');

    return redirect('/view_category');
}
 public function view_brand() {
        $data = Brand::all();

        return view('admin.brand',compact('data'));
    }

    public function add_brand(Request $request) {
        $brand = new Brand;

        $brand->brand_name = $request->brand;

        $brand->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Brand created successfully');

        return redirect()->back();
    }

    public function delete_brand($id)
    {
        $data = Brand::find($id);

        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Brand Deleted Successfully');

        return redirect()->back();
    }
    
    public function edit_brand($id) {
        $data = Brand::find($id);

        return view('admin.edit_brand',compact('data'));
    }

    public function update_brand(Request $request, $id)
    {
        $data = Brand::find($id);

        $data->brand_name = $request->brand;

        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Brand updated successfully');

        return redirect('/view_brand');
    }


     public function add_product() {

       $category = Category::all();

       $brand = Brand::all();

        return view('admin.add_product',compact('category','brand'));
    }

    public function upload_product(Request $request)
{
    $data = new Product;
    
    $data->title = $request->title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->quantity = $request->qty;
    $data->category = $request->category;
    $data->brand = $request->brand;


      $image1 = $request->image1;
    if ($image1)
    {
        $imagename1 = time() . '_1.' . $image1->getClientOriginalExtension();
        $request->image1->move('products', $imagename1);
        $data->image1 = $imagename1;
    }
    
    // Process image2
    $image2 = $request->image2;
    if ($image2)
    {
        $imagename2 = time() . '_2.' . $image2->getClientOriginalExtension();
        $request->image2->move('products', $imagename2);
        $data->image2 = $imagename2;
    }
    
    // Process image3
    $image3 = $request->image3;
    if ($image3)
    {
        $imagename3 = time() . '_3.' . $image3->getClientOriginalExtension();
        $request->image3->move('products', $imagename3);
        $data->image3 = $imagename3;
    }


    $data->save();

     toastr()->timeOut(10000)->closeButton()->addSuccess('Add product successfully');
    
    return redirect()->back();
}

    public function view_product() {
        $product = Product::paginate(3);
        return view('admin.view_product',compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

         if ($data->image1) {
        $image1_path = public_path('products/' . $data->image1);
        if (file_exists($image1_path) && is_file($image1_path)) {
            unlink($image1_path);
        }
    }
    
    if ($data->image2) {
        $image2_path = public_path('products/' . $data->image2);
        if (file_exists($image2_path) && is_file($image2_path)) {
            unlink($image2_path);
        }
    }
    
    if ($data->image3) {
        $image3_path = public_path('products/' . $data->image3);
        if (file_exists($image3_path) && is_file($image3_path)) {
            unlink($image3_path);
        }
    }

     

        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('product deleted Successfully');

        return redirect()->back();
    }

    public function update_product($id) {
        $data = Product::find($id);

        $category = Category::all();

        $brand = Brand::all();

        return view('admin.update_page',compact('data','category','brand'));
    }

    public function edit_product(Request $request, $id)
{
    $data = Product::find($id);

    $data->title = $request->title;

    $data->description = $request->description;

    $data->price = $request->price;

    $data->quantity = $request->quantity;

    $data->category = $request->category;

    $data->brand = $request->brand;

    $image1 = $request->image1;
    if ($image1)
    {
        $imagename1 = time() . '_1.' . $image1->getClientOriginalExtension();
        $request->image1->move('products', $imagename1);
        $data->image1 = $imagename1;
    }
    
    // Handle image2
    $image2 = $request->image2;
    if ($image2)
    {
        $imagename2 = time() . '_2.' . $image2->getClientOriginalExtension();
        $request->image2->move('products', $imagename2);
        $data->image2 = $imagename2;
    }
    
    // Handle image3
    $image3 = $request->image3;
    if ($image3)
    {
        $imagename3 = time() . '_3.' . $image3->getClientOriginalExtension();
        $request->image3->move('products', $imagename3);
        $data->image3 = $imagename3;
    }
$data->save();

  toastr()->timeOut(10000)->closeButton()->addSuccess('edit product Successfully');

return redirect('/view_product');
}


    public function product_search(Request $request)
{
    $search = $request->search;

    $product = Product::where('title', 'LIKE', '%' . $search . '%')->orWhere('category','LIKE','%' . $search . '%')->orWhere('brand','LIKE','%' . $search . '%')->paginate(3);

    return view('admin.view_product', compact('product'));
}
public function view_order() {
    $data = Order::all();

    return view('admin.order',compact('data'));
}
public function on_delivery($id)
{
    $data = Order::find($id);
    $data->status = 'On Delivery';
    $data->save();
    return redirect('/view_orders');
}
public function delivered($id)
{
    $data = Order::find($id);
    $data->status = 'Delivered';
    $data->save();
    return redirect('/view_orders');
}

    public function print_pdf($id) {

        $data=Order::find($id);

            $pdf = Pdf::loadView('admin.invoice',compact('data'));
            return $pdf->download('invoice.pdf');
    }
    public function view_users()
{
    $users = User::all();
    return view('admin.users', compact('users'));
}
public function delete_user($id)
{
    $user = User::find($id);
    
  
    if (!$user) {
        toastr()->timeOut(10000)->closeButton()->addError('User not found');
        return redirect()->back();
    }
    
  
    if ($user->id == auth()->id()) {
        toastr()->timeOut(10000)->closeButton()->addError('You cannot delete your own account');
        return redirect()->back();
    }
    
    $user->delete();
    
    toastr()->timeOut(10000)->closeButton()->addSuccess('User deleted successfully');
    
    return redirect()->back();
}
  public function view_contacts()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.view_contacts', compact('contacts'));
    }
    
    
    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true]);
        
        return redirect()->back()->with('success', 'Message marked as read');
    }
    
    
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        return view('admin.show_contact', compact('contact'));
    }
    
 
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.view_contacts')->with('success', 'Message deleted successfully');
    }


    // Add this to your existing AdminController.php

public function sales_report()
{
    // Get all completed orders (delivered status and paid)
    $completedOrders = Order::where('status', 'Delivered')
                           ->where('payment_status', 'paid')
                           ->get();
    
    // Initialize sales data array
    $salesData = [];
    $totalRevenue = 0;
    
    // Process each order to get product details and calculate revenue
    foreach ($completedOrders as $order) {
        $product = Product::find($order->product_id);
        
        if ($product) {
            $productId = $product->id;
            $productPrice = $product->price;
            $orderQuantity = $order->quantity;
            $revenue = $productPrice * $orderQuantity;
            
            // Add to total revenue
            $totalRevenue += $revenue;
            
            // If product already exists in the array, update quantities and revenue
            if (isset($salesData[$productId])) {
                $salesData[$productId]['quantity'] += $orderQuantity;
                $salesData[$productId]['revenue'] += $revenue;
            } else {
                // Add new product to the array
                $salesData[$productId] = [
                    'id' => $productId,
                    'title' => $product->title,
                    'price' => $productPrice,
                    'quantity' => $orderQuantity,
                    'revenue' => $revenue,
                    'category' => $product->category,
                    'brand' => $product->brand
                ];
            }
        }
    }
    
    // Convert associative array to indexed array for easier usage in the view
    $salesData = array_values($salesData);
    
    // Sort by revenue (highest to lowest)
    usort($salesData, function($a, $b) {
        return $b['revenue'] - $a['revenue'];
    });
    
    // Get categories for filtering
    $categories = Category::all();
    $brands = Brand::all();
    
    return view('admin.sales_report', compact('salesData', 'totalRevenue', 'categories', 'brands'));
}

public function filter_sales_report(Request $request)
{
    // Get filter parameters
    $category = $request->category;
    $brand = $request->brand;
    $date_from = $request->date_from;
    $date_to = $request->date_to;
    
    // Base query
    $query = Order::where('status', 'Delivered')
                 ->where('payment_status', 'paid');
    
    // Apply date filters if provided
    if ($date_from && $date_to) {
        $query->whereBetween('created_at', [$date_from, $date_to]);
    } else if ($date_from) {
        $query->where('created_at', '>=', $date_from);
    } else if ($date_to) {
        $query->where('created_at', '<=', $date_to);
    }
    
    $completedOrders = $query->get();
    
    // Initialize sales data array
    $salesData = [];
    $totalRevenue = 0;
    
    // Process each order
    foreach ($completedOrders as $order) {
        $product = Product::find($order->product_id);
        
        if ($product) {
            // Apply category and brand filters at the product level
            if (($category && $product->category != $category) || 
                ($brand && $product->brand != $brand)) {
                continue; // Skip this product if it doesn't match the filters
            }
            
            $productId = $product->id;
            $productPrice = $product->price;
            $orderQuantity = $order->quantity;
            $revenue = $productPrice * $orderQuantity;
            
            // Add to total revenue
            $totalRevenue += $revenue;
            
            // If product already exists in the array, update quantities and revenue
            if (isset($salesData[$productId])) {
                $salesData[$productId]['quantity'] += $orderQuantity;
                $salesData[$productId]['revenue'] += $revenue;
            } else {
                // Add new product to the array
                $salesData[$productId] = [
                    'id' => $productId,
                    'title' => $product->title,
                    'price' => $productPrice,
                    'quantity' => $orderQuantity,
                    'revenue' => $revenue,
                    'category' => $product->category,
                    'brand' => $product->brand
                ];
            }
        }
    }
    
    // Convert associative array to indexed array
    $salesData = array_values($salesData);
    
    // Sort by revenue (highest to lowest)
    usort($salesData, function($a, $b) {
        return $b['revenue'] - $a['revenue'];
    });
    
    // Get categories and brands for filtering
    $categories = Category::all();
    $brands = Brand::all();
    
    return view('admin.sales_report', compact('salesData', 'totalRevenue', 'categories', 'brands', 'category', 'brand', 'date_from', 'date_to'));
}


}
