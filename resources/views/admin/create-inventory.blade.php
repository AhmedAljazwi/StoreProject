@extends('admin.master')

@section('title', 'إنشاء منتج جديد')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/store-inventory')}}" method="post">
                    @csrf
                    <input name="price" type="text" class="form-control" placeholder="سعر المنتج">
                    <input name="quantity" type="text" class="form-control mt-3" placeholder="كمية المنتج">

                    <select name="selectedProduct" id="" class="form-control mt-3">
                        @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary mt-3">حفظ المنتج</button>
                </form>
            </div>
        </div>
    </div>
@endsection