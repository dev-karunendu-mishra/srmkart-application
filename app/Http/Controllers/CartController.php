<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cartItems = Cart::instance('karunendu')->content();

            return view('default.cart', compact('cartItems'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function addToCartProduct(Request $request)
    {
        try {
            $product = Food::where('uuid', $request->uuid)->first();
            if ($product == null) {
                $status = false;
                $message = 'Product not found';
            } else {
                $quantity = ! empty($request->quantity) ? $request->quantity : 1;
                if (Cart::instance('karunendu')->count() > 0) {
                    $status = true;
                    $message = 'product already added in cart.';
                    $cartItem = Cart::instance('karunendu')->add(['id' => $product->id, 'name' => $product->name, 'qty' => $quantity, 'price' => $product->price, 'weight' => 0, 'options' => ['productImage' => (! empty($product->images) ? $product->images->first()->path : null)]]);
                } else {
                    $status = true;
                    $message = $product->name.' added in cart.';
                    $cartItem = Cart::instance('karunendu')->add(['id' => $product->id, 'name' => $product->name, 'qty' => $quantity, 'price' => $product->price, 'weight' => 0, 'options' => ['productImage' => (! empty($product->images) ? $product->images->first()->path : null)]]);
                }
            }

            return response()->json(['status' => $status, 'message' => $message, 'cartItems' => Cart::instance('karunendu')->content(), 'cartItemsCount' => Cart::instance('karunendu')->count(), 'subTotal' => Cart::instance('karunendu')->subTotal()]);
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function removeFromCart(Request $request)
    {
        try {
            if (Cart::instance('karunendu')->count() > 0) {
                Cart::instance('karunendu')->remove($request->rowId);
                $status = true;
                $message = 'Product removed from cart.';
            } else {
                $status = false;
                $message = 'Cart is empty.';
            }

            return response()->json(['status' => $status, 'message' => $message]);
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function updateQuantity(Request $request)
    {
        try {
            if (Cart::instance('karunendu')->count() > 0) {
                Cart::instance('karunendu')->update($request->rowId, $request->quantity);
                $status = true;
                $message = 'Quantity updated successfully';
            } else {
                $status = false;
                $message = 'Cart is empty.';
            }

            return response()->json(['status' => $status, 'message' => $message]);
        } catch (\Throwable $th) {
            print_r($th->getMessage());

            return response()->status(500)->json(['status' => false, 'message' => 'Unable to update quantity']);
        }
    }

    public function clearCart(Request $request)
    {
        try {
            $product = Food::where('uuid', $request->uuid)->first();
            if ($product == null) {
                $status = false;
                $message = 'Product not found';
            } else {
                if (Cart::instance('karunendu')->count() > 0) {
                    $status = true;
                    $message = 'product already added in cart.';
                    $cartItem = Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'weight' => 0, 'options' => ['productImage' => (! empty($product->images) ? $product->images->first()->path : null)]]);
                } else {
                    $status = true;
                    $message = $product->name.' added in cart.';
                    $cartItem = Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'weight' => 0, 'options' => ['productImage' => (! empty($product->images) ? $product->images->first()->path : null)]]);
                }
            }

            return response()->json(['status' => $status, 'message' => $message, 'product' => $product]);
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }
}
