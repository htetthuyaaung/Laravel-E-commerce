<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;





class ProductController extends Controller
{


    public function index(Request $request)
    {
        // if(request('search')){
        //     //search
        //     return Product::where('name','like', '%' . request('search') . '%')
        //     ->orderBy('id', 'desc')->paginate(5);
        // }else{
        //     return Product::orderBy('id', 'desc')->paginate(5);
        // }

        // $product = Product::query();

        // if (request('search')) {
        //     //search
        //     return $product->where('name', 'like', '%' . request('search') . '%')
        //     ->orderBy('id', 'desc')->paginate(5);
        // } else {
        //     return $product->orderBy('id', 'desc')->paginate(5);
        // }
        
        return Product::when(request('search'),function($query){
           $query-> where('name', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(5);
       
    }

    public function store(ProductStoreRequest $request)
    {
        
        $product = Product::create($request->only('name', 'price'));
        return $product;
    }


    public function show(Product $product)
    {
        // $product = Product::find($id);
        return $product;
    }


    public function update(ProductUpdateRequest $request, Product $product)
    {
        // $product = Product::find($id);
        $product->update($request->only('name', 'price'));
        return $product;
    }


    public function destroy(Product $product)
    {
        //route model binding လို့ခေါ်တယ်
        // $product = Product::find($id);
        $product->delete();
        return $product;
    }
}
