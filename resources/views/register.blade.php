@extends('master')

@section('title', 'حساب جديد')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/register')}}" method="post">
                    @csrf
                    <input name="name" type="text" class="form-control" placeholder="إسم التصنيف">
                    <button type="submit" class="btn btn-primary mt-3">حفظ التصنيف</button>
                </form>
            </div>
        </div>
    </div>
@endsection