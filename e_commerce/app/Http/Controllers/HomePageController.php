<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
   
    public function index()
    {
        $products = Product::inRandomOrder()->take(8)->get();

        return view('home')->with('products', $products);
    }

   
}
