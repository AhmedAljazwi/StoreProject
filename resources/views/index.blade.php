@extends('master')

@section('title', 'Home')

@section('content')
    <div class="container mt-5">
        <div class="justify-content-center">
            <div class="row">
                @foreach($inventories as $inventory)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="fw-bold text-center">{{$inventory->product->name}}</h5>
                                <div class="d-flex container text-center">
                                    <img class="mx-auto d-block" width="40%" height="100%" src="{{$inventory->product->image}}" alt="">
                                </div>
                                <h6 class="fw-bold text-end">{{$inventory->price}} د.ل</h6>
                                <a @if(Auth::user()) href="{{url('/user/add-cart/'.$inventory->id)}}" @else href="{{url('/register')}}" @endif><i class="bi bi-cart3" style="font-size: 24px;"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection