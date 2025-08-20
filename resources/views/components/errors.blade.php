@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div class="mb-2">
                {{$error}}
            </div>
        @endforeach
    </div>
@endif