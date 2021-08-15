<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app-creative.css') }}" id="light-style">
    <link rel="stylesheet" href="{{ asset('assets/css/app-creative-dark.css') }}" id="dark-style">

</head>
<body class="font-sans antialiased loading" data-layout="topnav" data-layout-config='{"darkMode":false}'>
<!-- Begin page -->
<div class="wrapper">
    <div class="content-page">
        <div class="content">
        @include('includes.header')
        @include('includes.navigation')

        <!-- Page Content -->
            <main class="container-fluid">
                <div class="container">
                    @include('layouts.flash')
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('assets/js/vendor.js') }}" defer></script>
<script src="{{ asset('assets/js/app.js') }}" defer></script>
</body>
@include('includes.footer')
</html>
