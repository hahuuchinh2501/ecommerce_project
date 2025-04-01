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

    $image = $request->image;

if ($image)
{
    $imagename = time() . '.' . $image->getClientOriginalExtension();

    $request->image->move('products', $imagename);

    $data->image = $imagename;
}

    $data->save();
    
    return redirect()->back();
}
}
