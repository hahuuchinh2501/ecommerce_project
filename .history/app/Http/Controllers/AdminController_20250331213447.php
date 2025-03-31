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
        return view('admin.category');
    }

    public function add_category(Request $request) {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

          Toastr::success('Category added successfully', 'Success');

        return redirect()->back();
    }
}
