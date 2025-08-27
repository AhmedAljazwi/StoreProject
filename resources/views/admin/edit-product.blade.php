@extends('admin.master')

@section('title', 'تعديل المنتج')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/update-product/'.$product->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input value="{{$product->name}}" name="name" type="text" class="form-control" placeholder="إسم المنتج">
                    <input value="{{$product->image}}" name="image" type="text" class="form-control mt-3" placeholder="صورة المنتج">

                    <select name="selectedCategory" id="" class="form-control mt-3">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-success mt-3">تعديل المنتج</button>
                </form>
            </div>
        </div>
    </div>
@endsection