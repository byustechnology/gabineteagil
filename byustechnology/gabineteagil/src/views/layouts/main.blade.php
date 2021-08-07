<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>@yield('title', 'Olá') - {{ config('gabinete.title') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset(config('gabinete.assets') . '/svgs/favicon.svg') }}">
    
    @yield('meta')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <div id="app">

        <header class="bg-warning d-md-none p-4">
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('gabinete.dashboard') }}"><img src="{{ asset('assets/images/logotipo.png') }}" alt="Logotipo {{ config('app.name') }}" width="128"></a>
                <a href="#" class="sidebar-toggler" class="btn btn-primary"><i class="fas fa-bars fa-fw mr-1"></i> Menu</a>
            </div>
        </header>

        <!-- Navbar -->
        @include('gabinete::layouts.aside')

        <main>
            @yield('content')

            <!-- Footer -->
            @include('gabinete::layouts.footer')
        </main>

        @include('gabinete::errors.list')
        @include('gabinete::messages.list')
        @include('gabinete::messages.modal')

        <!-- Logout form -->
        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>

    @yield('scripts')
</body>

</html>