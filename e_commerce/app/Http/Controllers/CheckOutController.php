<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use App\Http\Requests\CheckoutRequest;

class CheckOutController extends Controller
{

    public function index()
    {
        return view('checkout');
    }

    public function store(CheckoutRequest $request)
    {   

        $contents = Cart::content()->map(function($item){
            return $item->model->slug.', '.$item->quantity;
        })->values()->toJson();

        try {

            $charge = Stripe::charges()->create([
                'amount' => Cart::total(),
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description'=>'Order',
                'receipt_email'=> $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                ],
            ]);
            //successful
            Cart::instance('default')->destroy();
            // return back()->with('success_message', 'Thank u! Your payment has been successful accepted!');
            return redirect()->route('Confirmation.index')->with('success_message', 'Thank u! Your payment has been successful accepted!');
        } catch (CardErrorException $e) {
            return back()->withErrors('Error!' . $e->getMessage());
        }
    }
}
