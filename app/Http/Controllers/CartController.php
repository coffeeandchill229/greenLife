<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helper\CartHelper;

class CartController extends Controller
{
    function add(CartHelper $cart, $id, Request $request)
    {
        if ($id) {
            $product = Product::find($id);
            $quantity = $request->quantity;

            $cart->add($product, $quantity);

            if ($request->quantity) {
                return back();
            }

            return response()->json(['total_quantity' => count($cart->items)]);
        }
    }
    function delete(CartHelper $cart, $id)
    {
        $cart->delete($id);
        return back();
    }
    function update(Request $request, CartHelper $cart)
    {
        $data = $request->all();
        unset($data['_token']);
        $cart->update($data);
        return back();
    }
    function remove(CartHelper $cart)
    {
        $cart->remove();
        return back();
    }
}
