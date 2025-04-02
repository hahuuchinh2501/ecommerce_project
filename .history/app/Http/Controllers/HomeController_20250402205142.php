<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home() 
    {
        return view('home.index');
    }
}
