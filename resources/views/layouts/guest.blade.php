<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.partials.favicon')

    <title>@yield('title') — {{ config('app.name', 'Laravel') }}</title>
 
    <!-- <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/new/app.min.css') }}">

    @livewireStyles

    <!-- <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dropdowns.js') }}" defer></script>
    <script src="{{ asset('js/modal.js') }}" defer></script>
    <script src="{{ asset('js/passRecovery.js') }}" defer></script>
    <script src="{{ asset('js/phone.js') }}" defer></script>
    <script src="{{ asset('js/timer.js') }}" defer></script>
    <script src="{{ asset('js/switchAuth.js') }}" defer></script> -->
    <script src="{{ asset('js/new/libs.min.js') }}" defer></script>
    <script src="{{ asset('js/new/common.js') }}" defer></script>

    @include('layouts.partials.analytics')
</head>

<body>
    <div class="root main-bg f-wrapper">

        <header class="header">
            <div class="container">
                <div class="row g-0 align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header__main">
                            <button class="sandwich header__sandwich js-toggle-menu">
                                <span class="sandwich__inner"></span>
                            </button>
                            <a href="/" class="logo header__logo">
                                <img src="/img/new/logo-accent.svg" alt="World Smart" class="logo__img">
                            </a>
                            <nav class="header__nav">
                                <ul>
                                    <li><a href="about.html">О нас</a></li>
                                    <li><a href="tools.html" class="active">Инструменты</a></li>
                                    <li><a href="referals.html">Рефералы</a></li>
                                    <li><a href="partners.html">Партнерство</a></li>
                                    <li><a href="review.html">Отзывы</a></li>
                                    <li><a href="news.html">Акции🔥</a></li>
                                </ul>

                                @include('layouts.partials.header.lang')
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
        </header>
        <x-notifications />

        <main>

            {{ $slot }}

        </main>
       <!--  <div class="f-links">
            <a href="/docs/terms_of_use.pdf" target="_blank" class="f-link">@lang('general.agreement')</a>
            <a href="/docs/privacy_policy.pdf" target="_blank" class="f-link">@lang('general.policy')</a>
        </div> -->
        <footer class="footer">
            <div class="footer__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="footer__content">
                                <a href="/" class="logo footer__content-logo">
                                    <img src="/img/new/logo-accent.svg" alt="World Smart" class="logo__img">
                                </a>
                                <div class="footer__content-descr">Международная инвестиционная платформа с реальными
                                    отзывами</div>
                                <div class="socials footer__content-socials">
                                    <a href="#" class="socials__item socials__item-telegram" target="_blank"></a>
                                    <a href="#" class="socials__item socials__item-x" target="_blank"></a>
                                    <a href="#" class="socials__item socials__item-facebook" target="_blank"></a>
                                    <a href="#" class="socials__item socials__item-youtube" target="_blank"></a>
                                    <a href="#" class="socials__item socials__item-linkedin" target="_blank"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="footer__col">
                                <div class="footer__col-title">Навигация</div>
                                <div class="footer__col-content">
                                    <nav class="footer__col-nav">
                                        <ul>
                                            <li><a href="main.html">Главная</a></li>
                                            <li><a href="tools.html">Инструменты</a></li>
                                            <li><a href="referals.html">Рефералы</a></li>
                                            <li><a href="partners.html">Партнерство</a></li>
                                            <li><a href="review.html">Отзывы</a></li>
                                            <li><a href="news.html">Акции🔥</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="footer__col">
                                <div class="footer__col-title">Пользователям</div>
                                <div class="footer__col-content">
                                    <nav class="footer__col-nav">
                                        <ul>
                                            <li><a href="account.html">Личный кабинет</a></li>
                                            <li><a href="account-deposit.html">Депозит</a></li>
                                            <li><a href="account-withdraw.html">Вывод</a></li>
                                            <li><a href="account-exchange.html">Обмен</a></li>
                                            <li><a href="account-exchange.html">Поддержка</a></li>
                                            <li><a href="confirm.html">Пользовательское соглашение</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer__col">
                                <div class="footer__col-title">Связь с нами и подписка</div>
                                <div class="footer__col-content">
                                    <a href="tel:+780444200420" class="link link-default footer__col-phone">+78 044 420
                                        0 420</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-3">
                            <div class="footer__bottom-policy">2024 © Все права защищены</div>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="policy.html" class="link link-default-lt footer__bottom-link">Политика
                                конфидиенцальности</a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="cookie.html" class="link link-default-lt footer__bottom-link">Правила использования
                                и coockies</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @livewireScripts
</body>

</html>