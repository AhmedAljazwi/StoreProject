@extends('admin.master')

@section('title', 'التصنيفات')

@section('content')
  <a class="btn btn-primary" href="{{url('/admin/create-category')}}">تصنيف جديد</a>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الإسم</th>
      <th>عمليات</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>
              <a href="{{url('/admin/edit-category/'.$category->id)}}" class="btn btn-success" title="تعديل التصنيف">تعديل</a>
              <a onclick="return confirm('هل أنت متأكد؟');" href="{{url('/admin/delete-category/'.$category->id)}}" class="btn btn-danger">حذف</a>
            </td>
        </tr>
    @endforeach
    
  </tbody>
</table>
@endsection