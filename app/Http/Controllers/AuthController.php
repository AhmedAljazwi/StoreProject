<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function login() {
        return view('login');
    }

    public function check(Request $request) {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ],[
            'phone.required' => 'رقم الهاتف مطلوب',
            'password.required' => 'كلمة المرور مطلوبة',
        ]);

        $cred = $request->only('phone', 'password');
        if(Auth::attempt($cred)) {
            if(Auth::user()->is_admin == 1) {
                return redirect('admin/home');
            }
            elseif(Auth::user()->is_admin == 0) {
                return redirect('/');
            }
        }
        else {
            return redirect('/login')-with('failed', 'البيانات غير صحيحة');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
