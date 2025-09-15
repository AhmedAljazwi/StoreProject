@extends('admin.master')

@section('title', 'الطلبات')

@section('content')
    @foreach($bills as $bill)
        <div class="card mb-3">
            <div class="card-header">
                <div class="text-start">
                    <a class="btn btn-sm btn-success" href="{{url('/admin/edit-order/'.$bill->id)}}">تعديل طلبية</a>
                </div>
                <div>
                    رقم الطلبية: {{$bill->id}}
                </div>
                <div>
                    حالة الطلبية: {{$bill->status->name}}
                </div>
            </div>
            <div class="card-body">
                @foreach($bill->orders as $order)
                    <ul>
                        <li>{{$order->inventory->product->name}}</li>
                    </ul>
                @endforeach
            </div>
            <div class="card-footer">
                الإجمالي: {{$bill->total}} د.ل
            </div>
        </div>
    @endforeach
@endsection