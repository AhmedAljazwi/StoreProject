<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function cart() {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('user.cart', compact('carts'));
    }

    public function addCart($id) {
        $checkCart = Cart::where('inventory_id', $id)->first();
        if($checkCart) {
            return redirect('/')->with('failed', 'المنتج موجود في العربة بالفعل');
        }

        $cart = new Cart;
        $cart->inventory_id = $id;
        $cart->user_id = Auth::user()->id;
        $cart->quantity = 1;
        $cart->save();

        return redirect('/')->with('success', 'تمت إضافة المنتج للعربة بنجاح');
    }

    public function updateCart(Request $request, $id) {
        $request->validate([
            'quantity' => 'required',
        ],[
            'quantity.required' => 'الكمية مطلوبة',
        ]);

        $cart = Cart::find($id);
        if($cart) {
            $inventory = Inventory::where('product_id', $cart->inventory->product_id)->first();
            if($inventory) {
                if($inventory->quantity >= $request['quantity']) {
                    $cart->quantity = $request['quantity'];
                    $cart->save();
                    return redirect('/user/cart')->with('success', 'تم تحديث الكمية');
                }
                else {
                    return redirect('/user/cart')->with('failed', 'الكمية المتوفرة لا تكفي');
                }
            }
        }
    }
}
