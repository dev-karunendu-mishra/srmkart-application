<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCartProduct(Request $request)
    {
        try {
            $cartItem = Cart::add('293ad', 'Product 1', 1, 9.99, 550);
            dd($cartItem);
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }
}
