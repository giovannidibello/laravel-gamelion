<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- includo l'icona --}}
    <link rel="icon" href="{{ Vite::asset('resources/img/favicon.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">  
    <title>@yield('title')</title>

    @vite(["resources/sass/app.scss" , "resources/js/app.js" ])
</head>
<body>

    @include('partials.header')

    <div class="container mt-3 mb-3">
              

        @yield('content')

    </div>        
</body>
</html>