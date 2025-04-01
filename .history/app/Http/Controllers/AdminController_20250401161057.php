<?php

namespace App\Http\Controllers;

use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Http\Request;

use App\Models\Category;

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

    return redirect('/view_category');
}
}
