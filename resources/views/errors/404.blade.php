<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.partials.favicon')

    <title>404 — {{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">

    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dropdowns.js') }}" defer></script>
</head>
<body>
<div class="root main-bg f-wrapper">
    <header class="f-header _mb">
        <a href="/">
            <img src="/assets/logo.svg" alt="Neo Invest" class="logo">
        </a>
        @include('layouts.partials.header.lang')
    </header>

    <div class="res4__wrap">
        <img src="/assets/404.png" alt="404" class="res4-pic">
        <div class="res4-text">
            <div class="res4-title">@lang('general.not_found_title')</div>
            <div class="res4-desc">@lang('general.not_found_description')</div>
            <a href="{{ route('profile') }}" class="btn btn__submit" style="margin-top: 20px">
                @lang('general.to_home')
            </a>
        </div>
    </div>
</div>
</body>
</html>
