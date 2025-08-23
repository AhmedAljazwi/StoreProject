@extends('admin.master')

@section('title', 'تعديل التصنيف')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/update-category/'.$category->id)}}" method="post">
                    @csrf
                    @method('put')
                    <input name="name" value="{{$category->name}}" type="text" class="form-control" placeholder="إسم التصنيف">
                    <button type="submit" class="btn btn-success mt-3">تعديل التصنيف</button>
                </form>
            </div>
        </div>
    </div>
@endsection