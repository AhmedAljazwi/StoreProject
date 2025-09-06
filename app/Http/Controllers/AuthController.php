<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register() {
        return view('register');
    }

    public function registerUser(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ],[
            'name.required' => 'الإسم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'phone.required' => 'رقم الهاتف مطلوب',
            'password.required' => 'كلمة المرور مطلوبة',
        ]);

        $newUser = new User;
        $newUser->name = $request['name'];
        $newUser->email = $request['email'];
        $newUser->phone = $request['phone'];
        $newUser->password = $request['password'];
        $newUser->save();

        return redirect('/login')->with('success', 'تم إنشاء الحساب بنجاح');
    }
}
