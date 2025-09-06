@extends('master')

@section('title', 'حساب جديد')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/register')}}" method="post">
                    @csrf
                    <input name="name" type="text" class="form-control mb-3" placeholder="الإسم الكامل">
                    <input name="email" type="text" class="form-control mb-3" placeholder="البريد الإلكتروني">
                    <input name="phone" type="text" class="form-control mb-3" placeholder="رقم الهاتف">
                    <input name="password" type="password" class="form-control mb-3" placeholder="كلمة المرور">
                    <button type="submit" class="btn btn-primary mt-3">تسجيل</button>
                </form>
            </div>
        </div>
    </div>
@endsection