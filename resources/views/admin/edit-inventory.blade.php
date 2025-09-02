@extends('admin.master')

@section('title', 'تعديل المنتج')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/update-inventory/'.$inventory->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input value="{{$inventory->quantity}}" name="quantity" type="text" class="form-control" placeholder="إسم المنتج">
                    <input value="{{$inventory->price}}" name="price" type="text" class="form-control mt-3" placeholder="صورة المنتج">

                    <button type="submit" class="btn btn-success mt-3">تعديل المنتج</button>
                </form>
            </div>
        </div>
    </div>
@endsection