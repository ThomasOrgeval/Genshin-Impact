<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Genshin Impact' }}</title>

    <meta name="description"
          content="This site allows you to know how many resources you need to improve a character as well as calculations based on Genshin Impact">

    <meta property="og:title" content="Genshin Impact">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://genshin.thomasorgeval.fr">
    <meta property="og:image" content="{{ asset('favicon.png') }}">
    <meta property="og:description"
          content="This site allows you to know how many resources you need to improve a character as well as calculations based on Genshin Impact">

    <link rel="shortcut icon" type="image" href="{{ asset('favicon.png') }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select.css') }}">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="bg-dark">
@include('layouts/modal')
<header>
    @include('layouts/header')
</header>
<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4">
        @include('flash::message')
        @yield('content')
    </div>

    <footer>
        @include('layouts/footer')
    </footer>
</main>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/select.js') }}"></script>

</body>
</html>
