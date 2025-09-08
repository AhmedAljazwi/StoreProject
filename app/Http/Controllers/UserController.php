<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function cart() {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('user.cart', compact('carts'));
    }

    public function addCart($id) {
        $cart = new Cart;
        $cart->inventory_id = $id;
        $cart->user_id = Auth::user()->id;
        $cart->quantity = 1;
        $cart->save();

        return redirect('/')->with('success', 'تمت إضافة المنتج للعربة بنجاح');
    }
}
