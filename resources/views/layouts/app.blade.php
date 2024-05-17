<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.partials.favicon')

    <title>@yield('title') — {{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
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

    @include('layouts.partials.analytics')
</head>
<body>
<div class="root">
    @if(session()->has('disguised_admin_id'))
        <a href="{{ route('undisguise') }}" class="undisguise">
            @lang('general.undisguise')
        </a>
    @endif

    @include('layouts.partials.header')
    <div class="root__inner">
        @include('layouts.partials.sidebar')
        <div class="content main-bg">
            {{ $slot }}

            <x-notifications/>
        </div>
    </div>

    @stack('modals')
</div>

@livewireScripts
<script src="{{ asset('js/timer.js') }}"></script>
@include('layouts.partials.online-chat')
</body>
</html>
