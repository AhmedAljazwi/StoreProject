@extends('master')

@section('title', 'العربة')

@section('content')
    <table class="table">
  <thead>
    <tr>
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
            <td>{{$cart->quantity}}</td>
            <td>{{$cart->inventory->price}} د.ل</td>
            <td>
              <form action="{{url('/user/update-cart/'.$cart->id)}}" method="post">
                @csrf
                <input type="text" name="quantity" class="form-control">
                <button type="submit" class="btn btn-success btn-sm">تحديث الكمية</button>
              </form>
              <a href="{{url('/user/delete-cart/'.$cart->id)}}" class="btn btn-danger btn-sm my-1">إزالة</a>
            </td>
        </tr>
    @endforeach
    
  </tbody>
</table>

<div class="card">
  <div class="card-body">
    @php
      $total = 0;
      foreach($carts as $cart) {
        $total = $total + ($cart->inventory->price * $cart->quantity);
      }
    @endphp

    الإجمالي: {{$total}} د.ل
  </div>
  @if(sizeof($carts) > 0)
    <div class="card-footer">
      <a href="{{url('/user/purchase')}}" class="btn btn-success">شراء</a>
    </div>
  @endif
</div>

@endsection