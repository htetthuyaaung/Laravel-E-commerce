<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   
    public function index()
    {
        // $users = User::paginate(15)->fragment('users');
        $products = Product::paginate(9)->fragment('products');
        $popularproduct = Product::inRandomOrder()->take(5)->get();
        return view('shop')->with([
            'products'=> $products,
            'popularproduct' => $popularproduct
        ]);
    }

   
    public function create()
    {
        
    }

 
     
    public function store(Request $request)
    {
        
    }

    
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedproduct = Product::where('slug','!=', $slug)->inRandomOrder()->take(5)->get();
        return view('detail')->with([
            'product' => $product,
            'relatedproduct' => $relatedproduct
        ]);
    }

  
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
