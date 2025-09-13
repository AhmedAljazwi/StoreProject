<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Inventory;
use App\Models\Bill;
use App\Models\Order;
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

    public function deleteCart($id) {
        $cart = Cart::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if($cart) {
            $cart->delete();
            return redirect('/user/cart')->with('success', 'تم حذف العنصر');
        }
    }

    public function purchase() {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        if(sizeof($carts) <= 0) {
            return redirect('/user/cart')->with('failed', 'العربة فارغة');
        }
        else {
            $total = 0;
            foreach ($carts as $cart) {
                $total = $total + ($cart->quantity * $cart->inventory->price);
            }

            $bill = new Bill;
            $bill->total = $total;
            $bill->user_id = Auth::user()->id;
            $bill->status_id = 1;
            $bill->save();

            foreach($carts as $cart) {
                $order = new Order;
                $order->inventory_id = $cart->inventory_id;
                $order->quantity = $cart->quantity;
                $order->price = $cart->inventory->price;
                $order->bill_id = $bill->id;
                $order->save();

                $inventory = Inventory::where('id', $cart->inventory_id)->first();
                $inventory->quantity = $inventory->quantity - $cart->quantity;
                $inventory->save();
            }

            Cart::where('user_id', Auth::user()->id)->delete();

            return redirect('/user/orders/')->with('success', 'تم الطلب بنجاح');
        }
    }

    public function orders() {
        $bills = Bill::with('orders')->latest()->get();
        return view('user.orders', compact('bills'));
    }
}
