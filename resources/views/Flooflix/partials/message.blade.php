@if (\Session::has('message'))
    <div class="alert alert-success text-center m-0">
        <p class="p-0 m-0 font-alfa">{{ __(\Session::get('message')) }}</p>
    </div>
@endif
@if (\Session::has('messageError'))
    <div class="alert alert-danger text-center m-0">
        <p class="p-0 m-0 font-alfa">{{ __(\Session::get('messageError')) }}</p>
    </div>
@endif