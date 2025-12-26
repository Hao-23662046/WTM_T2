<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class HomeController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();
        return view('home', ['products' => $products]);
    }
}
