<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi | Perpustakaan</title>
    {{-- web icon --}}
    <link rel="shortcut icon" href="{{ asset('logo/logoweb.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/boots/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <style>
        .wlcm{
            color: #ffffff;
            font-family: "Font Welcome";
        }
        a{
            font-family: "a-josep";
        }
    </style>
    @yield('style')
</head>
<body style="background-color:  #040b14">
    {{-- navbar --}}
    <div class="py-1">
        @include('layouts.partials.navbar')
    </div>
    {{-- student content --}}
    <div class="container">
        <div class="py-4">
            @yield('content')
        </div>
    </div>
    <!-- Swal Vendor -->
    @include('sweetalert::alert')
    {{-- script link --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/boots/bootstrap.min.js') }}"></script>
    {{-- my script --}}
    @yield('script')
</body>
</html>
