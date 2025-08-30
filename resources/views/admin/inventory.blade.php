@extends('admin.master')

@section('title', 'المخزن')

@section('content')
  <a class="btn btn-primary" href="{{url('/admin/create-inventory')}}">منتج جديد</a>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الإسم</th>
      <th>الصورة</th>
      <th>التصنيف</th>
      <th>الكمية</th>
      <th>السعر</th>
      <th>عمليات</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($inventories as $inventory)
        <tr>
            <td>{{$inventory->id}}</td>
            <td>{{$inventory->product->name}}</td>
            <td>
              <img src="{{$inventory->product->image}}" alt="" width="15%" height="15%">
            </td>
            <td>{{$inventory->product->category->name}}</td>
            <td>
              <a href="{{url('/admin/edit-inventory/'.$inventory->id)}}" class="btn btn-success" title="تعديل المنتج">تعديل</a>
              <a onclick="return confirm('هل أنت متأكد؟');" href="{{url('/admin/delete-inventory/'.$inventory->id)}}" class="btn btn-danger">حذف</a>
            </td>
        </tr>
    @endforeach
    
  </tbody>
</table>
@endsection