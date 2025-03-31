<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use Flasher\Toastr\Laravel\FlasherToastrServiceProvider;

class AdminController extends Controller
{
    public function view_category() {
        return view('admin.category');
    }

    public function add_category(Request $request) {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        toastr()->success('category add successfully');

        return redirect()->back();
    }
}
