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
            </td>
        </tr>
    @endforeach
    
  </tbody>
</table>
@endsection