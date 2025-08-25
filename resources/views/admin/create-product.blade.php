@extends('admin.master')

@section('title', 'إنشاء منتج جديد')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/store-product')}}" method="post">
                    @csrf
                    <input name="name" type="text" class="form-control" placeholder="إسم المنتج">
                    <input name="image" type="text" class="form-control mt-3" placeholder="صورة المنتج">

                    <select name="selectedCategory" id="" class="form-control mt-3">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary mt-3">حفظ المنتج</button>
                </form>
            </div>
        </div>
    </div>
@endsection