@extends('master')

@section('title', 'العربة')

@section('content')
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">إسم المنتج</th>
      <th>الكمية</th>
      <th>السعر</th>
      <th>عمليات</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($carts as $cart)
        <tr>
            <td>{{$cart->inventory->product->name}}</td>
            <td>
              
            </td>
        </tr>
    @endforeach
    
  </tbody>
</table>
@endsection