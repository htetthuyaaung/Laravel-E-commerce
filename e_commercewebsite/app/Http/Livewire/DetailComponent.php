<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class DetailComponent extends Component
{

    public $product;
    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        
        return view('livewire.detail-component')->layout("layouts.index");
    }
      

    //   public function render()
    // {
    //     // $products = Product::where('id')->firstOrFail();

    //     return view('livewire.detail-component')->layout('layouts.index');
    // }
}
//   public function show($slug)
//     {
//         $product = Product::where('slug', $slug)->firstOrFail();

//         return view('livewire.detail-component')->with('product', $product);
//     }