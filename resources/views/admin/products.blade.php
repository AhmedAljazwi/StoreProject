@extends('admin.master')

@section('title', 'المنتجات')

@section('content')
  <a class="btn btn-primary" href="{{url('/admin/create-product')}}">منتج جديد</a>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الإسم</th>
      <th>الصورة</th>
      <th>التصنيف</th>
      <th>عمليات</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>
              <img src="{{$product->image}}" alt="" width="15%" height="15%">
            </td>
            <td>{{$product->category_id}}</td>
            <td>
              <a href="{{url('/admin/edit-product/'.$product->id)}}" class="btn btn-success" title="تعديل التصنيف">تعديل</a>
              <a onclick="return confirm('هل أنت متأكد؟');" href="{{url('/admin/delete-product/'.$product->id)}}" class="btn btn-danger">حذف</a>
            </td>
        </tr>
    @endforeach
    
  </tbody>
</table>
@endsection