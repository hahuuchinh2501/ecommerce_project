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
}
