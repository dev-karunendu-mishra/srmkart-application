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
            $cartItems = Cart::content();

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
                if (Cart::count() > 0) {
                    $res = Cart::search(function ($cartItem, $rowId) use ($product) {
                        return $cartItem->id === $product->id;
                    });
                    if(count($res) == 0) {
                        $status = true;
                        $message = $product->name.' added in cart.';
                        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => $quantity, 'price' => $product->price, 'weight' => 0, 'options' => ['productImage' => (! empty($product->images) ? $product->images->first()->path : null)]]);
                    } else {
                        // $status = false;
                        // $message = 'Product already exists in cart.';
                        $status = true;
                        $message = $product->name.' added in cart.';
                        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => $quantity, 'price' => $product->price, 'weight' => 0, 'options' => ['productImage' => (! empty($product->images) ? $product->images->first()->path : null)]]);
                    }
                } else {
                    $status = true;
                    $message = $product->name.' added in cart.';
                    Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => $quantity, 'price' => $product->price, 'weight' => 0, 'options' => ['productImage' => (! empty($product->images) ? $product->images->first()->path : null)]]);
                }
            }

            return response()->json(['status' => $status, 'message' => $message, 'cartItems' => Cart::content(), 'cartItemsCount' => Cart::count(), 'subTotal' => Cart::subTotal()]);
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function removeFromCart(Request $request)
    {
        try {
            if (Cart::count() > 0) {
                Cart::remove($request->rowId);
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
            if (Cart::count() > 0) {
                Cart::update($request->rowId, $request->quantity);
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
                if (Cart::count() > 0) {
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
