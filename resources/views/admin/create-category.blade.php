@extends('admin.master')

@section('title', 'إنشاء تصنيف جديد')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/store-catgeory')}}" method="post">
                    @csrf
                    <input name="name" type="text" class="form-control" placeholder="إسم التصنيف">
                    <button type="submit" class="btn btn-primary">حفظ التصنيف</button>
                </form>
            </div>
        </div>
    </div>
@endsection