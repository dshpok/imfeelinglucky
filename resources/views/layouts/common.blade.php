<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Imfeelinglucky</title>

    <!-- Fonts -->
    <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
    <meta name="_meta" content="{{ csrf_token() }}">

</head>
<body>
<div>
    <main>
        @yield('content')
    </main>
</div>

@include('layouts.scripts')

{{--@yield('scripts')--}}

</body>
</html>
