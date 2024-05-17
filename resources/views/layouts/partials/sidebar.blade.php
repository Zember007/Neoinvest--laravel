@php
    $items = [
        'profile',
        'finances',
        'investments',
        // 'auto-program',
        // 'housing-program',
        'partners',
        'referral-system',
        'settings',
    ]
@endphp

<div class="sb">
    <div class="sb-bar _lg-hidden">

        <div class="sb-bar-row sb-bar-block">
            <div class="h-data">
                <div class="h-data-value">
                    <span>{{ format_money(auth()->user()->daily_income, 2) }}</span>
                    <span>USDT</span>
                </div>
                <div class="h-data-label">@lang('general.daily_income')</div>
            </div>
            <div class="h-data">
                <div class="h-data-value">
                    <span>{{ format_money($userBalance) }}</span>
                    <span>USDT</span>
                </div>
                <div class="h-data-label">@lang('general.balance')</div>
            </div>
        </div>

        <div class="sb-bar-row">
            @include('layouts.partials.header.lang')
            <a href="{{ route('finances', ['tab' => 'replenish']) }}" class="sb-bar-link">
                <img src="/assets/icon-download.svg" alt="download">
            </a>
            <a href="{{ route('finances', ['tab' => 'withdraw']) }}" class="sb-bar-link">
                <img src="/assets/icon-upload.svg" alt="download">
            </a>
        </div>
    </div>

    <nav class="nav">
        @foreach($items as $item)
            <a href="{{ route($item) }}" class="nav-item @if(request()->routeIs($item)) active @endif">
                <div class="nav-icon">
                    @include("layouts.partials.sidebar.$item-svg")
                </div>
                <div class="nav-text">@lang("$item.title")</div>
            </a>
        @endforeach
        <a href="{{ route('logout') }}"
           class="nav-item"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="nav-icon">
                @include("layouts.partials.sidebar.logout-svg")
            </div>
            <div class="nav-text">
                @lang('general.logout')
            </div>
        </a>
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf
        </form>
    </nav>
    <div class="infoblock">
        <img src="/assets/tech-support.png" alt="tech support" class="infoblock-icon">
        <div class="infoblock-title">@lang('general.support_title')</div>
        <div class="infoblock-desc">@lang('general.support_description')</div>
    </div>
</div>