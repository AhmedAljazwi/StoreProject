@extends('master')

@section('title', 'تسجيل الدخول')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/login')}}" method="post">
                    @csrf
                    <input name="phone" type="text" class="form-control mb-3" placeholder="رقم الهاتف">
                    <input name="password" type="password" class="form-control mb-3" placeholder="كلمة المرور">
                    <button type="submit" class="btn btn-primary mt-3">تسجيل الدخول</button>
                </form>
            </div>
        </div>
    </div>
@endsection