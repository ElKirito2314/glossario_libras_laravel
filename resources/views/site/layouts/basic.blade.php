<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Glossário Libras - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/img/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/img/favicon-32x32.png')  }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/img/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('/img/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ asset('/img/safari-pinned-tab.svg') }}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>

    <body>
        @include('site.layouts._partials.navbar')
        @yield('bloco_conteudo')
        @include('site.layouts._partials.rodape')
    </body>
</html>
