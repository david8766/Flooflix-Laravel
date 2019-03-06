<!-- Header -->
<!-- Banner -->
<header role="banner">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" role="navigation">
        <a class="navbar-brand" href="{{ route('home')}}"><img src="../../images/flooflix.png" class="img-fluid" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        @php
            $user = auth()->user('id');
        @endphp 
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if (!is_null($user))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories') }}">{{ __('FILMS') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.account') }}">{{ __("MON COMPTE") }}</a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.collection') }}">{{ __("MA COLLECTION") }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories')}}">{{ __('FILMS') }}</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.login') }}">{{ __("S'IDENTIFIER") }}</a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.register') }}">{{ __("S'INSCRIRE")}} </a>
                    </li> 
                @endif
                @if (!is_null($user) && $user->role_id == '2')
                    <li class="nav-item">
                        <a class="nav-link" href="/GestionDuSite" target="_blank">{{ __("GESTION DU SITE") }}</a>
                    </li>                  
                @endif                           
            </ul>
            @if (!is_null($user))       
            <div>
                <a href="/logout" class="mr-3 azure hover-coral" data-toggle="tooltip" data-placement="bottom" title="Se déconnecter">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            <div>
                <a href="{{ route('show.shoppingCart') }}" class="mr-3 azure hover-coral" data-toggle="tooltip" data-placement="bottom" title="Panier">
                    <i class="fas fa-cart-arrow-down"></i>
                </a>
            </div>
            @endif
            <form action="{{ action('MovieController@showMovieByResearch') }}" class="form-inline my-2 my-lg-0" role="search" method="POST">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="titre du film" aria-label="Search">
                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Rechercher</button>
            </form>  
        </div>
    </nav>
</header>