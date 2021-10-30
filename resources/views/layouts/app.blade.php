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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased bg-yellow-100">
    <div class="">
        @if ( isset($breadcrumb) )
            <!-- Page Header -->
            <header class="max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8 pt-8 lg:pt-16">{{ $breadcrumb }}</header>
        @endif 

        <!-- Page Content -->
        <main class="max-w-screen-lg mx-auto min-h-screen px-2 sm:px-6 lg:px-8 py-8 lg:py-16">
            {{ $slot }}
        </main>
    </div>
</body>

</html>