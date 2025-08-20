@extends('admin.master')

@section('title', 'التصنيفات')

@section('content')
  <a class="btn btn-primary" href="{{url('/admin/create-category')}}">تصنيف جديد</a>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الإسم</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
        </tr>
    @endforeach
    
  </tbody>
</table>
@endsection