@extends('admin.master')

@section('title', 'تعديل الطلبية')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/update-order/'.$bill->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <select name="selectedStatus" id="" class="form-control mt-3">
                        @foreach($statuses as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-success mt-3">تحديث الطلبية</button>
                </form>
            </div>
        </div>
    </div>
@endsection