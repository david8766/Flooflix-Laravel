@if (\Session::has('message'))
    <div class="alert alert-success">
        <p class="p-0 m-0">{{ __(\Session::get('message')) }}</p>
    </div><br />
@endif
@if (\Session::has('messageError'))
    <div class="alert alert-danger">
        <p class="p-0 m-0">{{ __(\Session::get('messageError')) }}</p>
    </div><br />
@endif