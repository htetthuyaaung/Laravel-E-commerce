<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{

    public function index()
    {
        $relatedproduct = Product::RelatedProducts()->get();
        return view('cart')->with('relatedproduct', $relatedproduct);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        Cart::add($request->id, $request->name, 1, $request->price)->associate('Product');

        return redirect()->route('Cart.index')->with('success_message', 'Item was added to your cart');
    }



    public function show($id)
    {
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
