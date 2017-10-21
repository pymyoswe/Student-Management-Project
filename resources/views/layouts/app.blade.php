<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{'Student Management'}}</title>

    <!-- Styles -->
    <link href="{{asset('fontAwesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/app.css')}}" rel="stylesheet">

    <!-- Scripts -->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">

        @include('partial/navBar')
        @yield('content')
        @include('footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('bootstrap/js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap/js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}" type="text/javascript"></script>
</body>
</html>
