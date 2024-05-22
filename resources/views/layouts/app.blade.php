<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.partials.favicon')

    <title>@yield('title') — {{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/new/app.min.css?v=2') }}">
    <link rel="stylesheet" href="{{ asset('css/new/style.promo.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}"> -->
    <style>
        .undisguise {
            background: white;
            position: absolute;
            top: 15px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 15px;
            border-radius: 20px;
            box-shadow: 0 7px 23px -11px rgb(0 0 0);
            font-weight: bold;
            color: #0C212E;
        }
    </style>

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dropdowns.js') }}" defer></script>
    <script src="{{ asset('js/linkCopy.js') }}" defer></script>
    <script src="{{ asset('js/mobileMenu.js') }}" defer></script>
    <script src="{{ asset('js/modal.js') }}" defer></script>
    <script src="{{ asset('js/passRecovery.js') }}" defer></script>
    <script src="{{ asset('js/phone.js') }}" defer></script>
    <script src="{{ asset('js/progressBar.js') }}" defer></script>
    <script src="{{ asset('js/promoProgressBar.js') }}" defer></script>
    <script src="{{ asset('js/rangeInput.js') }}" defer></script>
    <script src="{{ asset('js/switch.js') }}" defer></script>
    <script src="{{ asset('js/tableScroll.js') }}" defer></script>
    <script src="{{ asset('js/new/libs.min.js') }}" defer></script>
    <script src="{{ asset('js/new/common.js?v=2') }}" defer></script>

    @include('layouts.partials.analytics')
</head>

<body>

    @include('layouts.partials.header')

    <main class="main">
        <div class="page">
            <div class="container">

            @if(session()->has('disguised_admin_id'))
                <a href=" {{ route('logout') }}" class="undisguise">
                    @lang('general.undisguise')
                </a>
            @endif

                <div class="h1-small page__title">
                    <h1>Личный кабинет</h1>
                </div>
               <!--  <a href="{{ route('logout') }}" 
           class="nav-item"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">dsqnb</a>
           <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf 
        </form> -->
                <div class="row">
                    @include('layouts.partials.sidebar')
                    <div class="col-xl-9">
                        {{ $slot }}

                        <x-notifications />
                    </div>
                </div>

               <!--  @stack('modals') -->
            </div>
        </div>
    </main>

    @include('layouts.partials.footer')
   <!--  @livewireScripts -->
</body>
</html>
