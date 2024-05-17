<header class="h">
    <div class="h-block">
        <a href="/">
            <img src="/assets/logo.svg" alt="Neo Invest" class="h-logo">
        </a>
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
    <div class="h-block">
        <div class="h-btns">
            <a href="{{ route('finances', ['tab' => 'replenish']) }}" class="h-btn">
                @lang('general.replenish')
                <img src="/assets/icon-download.svg" alt="download">
            </a>
            <a href="{{ route('finances', ['tab' => 'withdraw']) }}" class="h-btn">
                @lang('general.withdraw')
                <img src="/assets/icon-upload.svg" alt="upload">
            </a>
        </div>
        @include('layouts.partials.header.lang')
    </div>
    <div class="menu">
        <svg width="40" height="40" viewBox="0 0 100 100">
            <path class="line line1"
                  d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058"></path>
            <path class="line line2" d="M 40,50 H 80"></path>
            <path class="line line3"
                  d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942"></path>
        </svg>
    </div>
</header>