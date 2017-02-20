<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset( 'css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/libs.min.css') }}">
</head>
<body>

@include('includes.header')

@include('includes.content')

@include('includes.footer')

<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/scripts.min.js') }}"></script>
<script src=" {{ asset('js/common.js') }}"></script>
</body>
</html>