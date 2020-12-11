<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        // return view('livewire.home-component')->layout('layouts.index');
        $products = Product::limit(8)->get();
        return view('livewire.home-component', ['products' => $products])->layout("layouts.index");
    }
}
