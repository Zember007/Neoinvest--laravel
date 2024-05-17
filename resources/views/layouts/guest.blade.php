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

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dropdowns.js') }}" defer></script>
    <script src="{{ asset('js/modal.js') }}" defer></script>
    <script src="{{ asset('js/passRecovery.js') }}" defer></script>
    <script src="{{ asset('js/phone.js') }}" defer></script>
    <script src="{{ asset('js/timer.js') }}" defer></script>
    <script src="{{ asset('js/switchAuth.js') }}" defer></script>

    @include('layouts.partials.analytics')
</head>
<body>
<div class="root main-bg f-wrapper">
    <header class="f-header _mb">
        <a href="/">
            <img src="/assets/logo.svg" alt="Neo Invest" class="logo">
        </a>
        @include('layouts.partials.header.lang')
    </header>

    <x-notifications/>

    {{ $slot }}

    <div class="f-links">
        <a href="/docs/terms_of_use.pdf" target="_blank" class="f-link">@lang('general.agreement')</a>
        <a href="/docs/privacy_policy.pdf" target="_blank" class="f-link">@lang('general.policy')</a>
    </div>
</div>
@livewireScripts
</body>
</html>
