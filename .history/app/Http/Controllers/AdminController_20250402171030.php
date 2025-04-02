<?php

namespace App\Http\Controllers;

use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;


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
}
