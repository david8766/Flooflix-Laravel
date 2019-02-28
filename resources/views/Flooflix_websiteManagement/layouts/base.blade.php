<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Styles CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/base.css') }}" rel="stylesheet">
        @if(isset($fonts) && !is_null($fonts) && !empty($fonts))
            @foreach ($fonts as $font)
            <link href="{{ $font->link }}" rel="stylesheet">
            @endforeach
        @endif
        <link href="https://fonts.googleapis.com/css?family=Srisakdi" rel="stylesheet">
        
        <!-- Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <title>Flooflix</title>
    </head>  
    <body class="min-100">
        @yield("content")
    </body>
</html>