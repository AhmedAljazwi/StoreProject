@if($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        <div class="mb-2">
            {{$error}}
        </div>
    </div>
    @endforeach
@endif