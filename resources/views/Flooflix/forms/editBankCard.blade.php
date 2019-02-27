@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
<!-- Main -->
<article class="min-88">
    @php
        $user = auth()->user('id');
    @endphp 
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4" id="bg">
                @include('Flooflix.partials.message')
                <header class="text-center">
                    <h1 class="mt-5 mx-2" id="title">Modifier votre carte</h1>
                </header>
                <form action="{{ action('BankCardController@update',$user) }}" class="mx-4 mt-4" method="POST">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="type">Type de carte</label>
                        <select name="type" id="type" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" value="{{ old('type') }}">
                            <option value="cb">CB</option>
                            <option value="visa">VISA</option>
                            <option value="mastercard">MASTERCARD</option>
                        </select>
                        @if ($errors->has('type'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('type')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="number">Numéro de carte</label>
                        <div class="input-group">
                            <input type="text" maxlength="4" minlength="4" name="number1" class="form-control {{ $errors->has('number1') ? ' is-invalid' : '' }}" value="{{ old('number1') }}" onkeyup="verif_nombre(this);" required>
                            <input type="text" maxlength="4" minlength="4" name="number2" class="form-control {{ $errors->has('number2') ? ' is-invalid' : '' }}" value="{{ old('number2') }}" onkeyup="verif_nombre(this);" required>
                            <input type="text" maxlength="4" minlength="4" name="number3" class="form-control {{ $errors->has('number3') ? ' is-invalid' : '' }}" value="{{ old('number3') }}" onkeyup="verif_nombre(this);" required> 
                            <input type="text" maxlength="4" minlength="4" name="number4" class="form-control {{ $errors->has('number4') ? ' is-invalid' : '' }}" value="{{ old('number4') }}" onkeyup="verif_nombre(this);" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cryptogram">Cryptogramme</label>
                        <input type="text" maxlength="3" minlength="3" name="cryptogram" class="form-control {{ $errors->has('cryptogram') ? ' is-invalid' : '' }}" value="{{ old('cryptogram') }}" id="cryptogram" onkeyup="verif_nombre(this);" required>
                        @if ($errors->has('cryptogram'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('cryptogram')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="month">Mois et année</label>
                        <input type="month" name="month" class="form-control {{ $errors->has('month') ? ' is-invalid' : '' }}" value="{{ old('month') }}" id="month" required>
                        @if ($errors->has('month'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('month')) }}</p>
                        @endif
                    </div>
                    <div class="row mt-4 justify-content-center">     
                        <div class="col col-auto">
                            <button type="submit" class="btn btn-color btn-md">Valider</button>
                        </div>   
                    </div>
                </form>
                <div class="row mt-5 justify-content-center">   
                    <div class="col col-auto">
                        <a href="{{ route('user.account') }}" id="link">Annuler</a>
                    </div>    
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/createBankCardScript.js"></script>
@endsection