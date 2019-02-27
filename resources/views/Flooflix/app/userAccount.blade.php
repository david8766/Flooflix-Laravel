@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
@php
    $user = auth()->user('id');
@endphp
<!-- Main -->
<article class="min-88">
    @include('Flooflix.partials.message')
    <div class="row text-center">
        <div class="col-lg-4 mt-5 px-5">
            <!-- First card-->
            <div class="card min-60">
                <div class="card-body">
                    <h4 class="card-title border-style pt-4 pb-4">{{ __('VOS INFORMATIONS') }}</h4>
                    <p class="card-text mt-5">{{ $user->login }}</p>
                    <p class="card-text">{{ $user->last_name .' '.$user->first_name }}</p>
                    <p class="card-text">{{ $user->email }}</p>
                    <p class="card-text">{{ $user->birth_date }}</p>
                    <div class="">
                        <a href="{{ route('purchase.history') }}" id="historic">{{ __("Voir l'historique des achats") }}</a>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('user.edit', $user) }}" class="btn btn-color btn-md">{{ __('MODIFIER') }}</a>
                    <hr>
                    <small>
                        <a href="/SupprimerVotreCompte" class="delete-link">{{ __('Supprimer mon compte') }}</a>
                    </small>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-5 px-5">
            <!-- Second card-->
            <div class="card min-60">
                <div class="card-body">
                    <h4 class="card-title border-style pt-4 pb-4">{{ __('VOTRE CARTE BANCAIRE') }}</h4>
                    @if ($user->bank_card_id == null)
                        <p class="card-text mt-5">{{ __('Pas de carte bancaire enregistrée') }}</p>   
                    @else
                    <p class="card-text mt-5">{{ strtoupper($bankCard->type) }}</p>
                    @endif
                    @if ($user->bank_card_id == null)
                        {{ '' }}
                    @else
                        <p class="card-text mt-5">N°{{ substr(decrypt($bankCard->number),0,4) }}-{{ substr(decrypt($bankCard->number),4,4) }}-XXXX-XXXX</p>
                    @endif
                </div>
                @if ($user->bank_card_id == null)
                <div class="card-footer ">
                    <a href="/AjouterUneCarteBancaire" class="btn btn-color btn-md">AJOUTER</a>
                </div>    
                @else
                <div class="card-footer ">
                    <a href=" {{ route('bankCard.edit') }}" class="btn btn-color btn-md">MODIFIER</a>
                    <hr>
                    <small>
                        <a href="#" class="delete-link">Supprimer cette carte</a>
                    </small>
                </div>   
                @endif
            </div>
        </div>
        <div class="col-lg-4 mt-5 px-5">
            <!-- Third card -->
            <div class="card min-60" id="">
                <div class="card-body">
                    <h4 class="card-title border-style pt-4 pb-4">VOS CREDITS</h4>
                    <p class="card-text mt-5">Total:</p>
                    <p class="display-4 card-text">{{ $user->credits }} <i class="fas fa-euro-sign"></i></p>
                </div>
                <div class="card-footer ">
                    <a href="{{ route('user.credits') }}" class="btn btn-color btn-md">AJOUTER DES CREDITS</a>
                </div>
            </div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/userAccount.js"></script>
@endsection