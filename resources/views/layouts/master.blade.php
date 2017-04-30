<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
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