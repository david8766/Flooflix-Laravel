@extends('admin.layouts.base')
@section('content')
<body class="bg-black azure font-alfa">
   <div class="container mt-5"> 
      <header>
         <h1>Développement de sites : administrer la base de données</h1>
      </header>
      <ul class="mt-5">
         <li>
            <a href="/website" class="azure" id="hover-red">{{ __('Voir la liste des sites') }}</a>
         </li>
         <li>
            <a href="/page" class="azure" id="hover-red">{{ __('Voir la liste des pages') }}</a>
         </li>
         <li>
            <a href="/font" class="azure" id="hover-red">{{ __('Voir la liste des polices') }}</a>
         </li>
         <li>
            <a href="/color" class="azure" id="hover-red">{{ __('Voir la liste des couleurs') }}</a>
         </li>
         <li>
            <a href="/picture" class="azure" id="hover-red">{{ __('Voir la liste des images') }}</a>
         </li>
         <li>
            <a href="/text" class="azure" id="hover-red">{{ __('Voir la liste des textes') }}</a>
         </li>
         <li>
            <a href="{{ route('admin.logout') }}" class="azure" id="hover-red">{{ __('se déconnecter') }}</a>
         </li>
      </ul>
   </div>  
</body>
@endsection