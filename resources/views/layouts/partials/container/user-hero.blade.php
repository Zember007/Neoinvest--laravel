<div class="a1__wrapper">
    <div class="a1">
        <div class="a1-b">
            <div class="a1-col">
                @livewire('sidebar-profile-picture')
                <div class="a1-text">
                    <div class="a1-title">{{auth()->user()->full_name }}</div>
                    <div class="a1-subtitle">@lang('general.account')</div>
                    <a href="#" class="a1-text-link link-copy link-copy-hint">
                        <div class="link-copy-hint__text">@lang('general.copied_to_clipboard')</div>
                        <input type="text" class="link-copy-input" value="{{ route('ref', auth()->id()) }}">
                        <img src="/assets/icon-copy.svg" alt="copy">
                    </a>
                    <a href="{{ route('ig-story') }}" class="a1-text-link" target="_blank">
                        @lang('general.share_instagram')
                        <img src="/assets/icon-arrow-right.svg" alt="share">
                    </a>
                </div>
            </div>

            <div class="card _blue">
                <img src="/assets/card-logo.svg" alt="Neo Invest" class="card-logo">
                <div class="card-row">
                    <div class="card-balance">
                        <span>{{ format_money($userBalance) }}</span>
                        <span>USDT</span>
                    </div>
                    <a href="{{ route('finances') }}" class="card-btn">
                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2.1875C7.55373 2.1875 6.13993 2.61637 4.9374 3.41988C3.73486 4.22339 2.7976 5.36544 2.24413 6.70163C1.69067 8.03781 1.54586 9.50811 1.82801 10.9266C2.11017 12.3451 2.80661 13.648 3.82928 14.6707C4.85196 15.6934 6.15492 16.3898 7.57341 16.672C8.99189 16.9541 10.4622 16.8093 11.7984 16.2559C13.1346 15.7024 14.2766 14.7651 15.0801 13.5626C15.8836 12.3601 16.3125 10.9463 16.3125 9.5C16.3103 7.56129 15.5391 5.70263 14.1682 4.33176C12.7974 2.96088 10.9387 2.18974 9 2.1875V2.1875ZM11.8125 10.0625H9.5625V12.3125C9.5625 12.4617 9.50324 12.6048 9.39775 12.7102C9.29226 12.8157 9.14919 12.875 9 12.875C8.85082 12.875 8.70774 12.8157 8.60226 12.7102C8.49677 12.6048 8.4375 12.4617 8.4375 12.3125V10.0625H6.1875C6.03832 10.0625 5.89524 10.0032 5.78976 9.89775C5.68427 9.79226 5.625 9.64918 5.625 9.5C5.625 9.35082 5.68427 9.20774 5.78976 9.10225C5.89524 8.99676 6.03832 8.9375 6.1875 8.9375H8.4375V6.6875C8.4375 6.53832 8.49677 6.39524 8.60226 6.28975C8.70774 6.18426 8.85082 6.125 9 6.125C9.14919 6.125 9.29226 6.18426 9.39775 6.28975C9.50324 6.39524 9.5625 6.53832 9.5625 6.6875V8.9375H11.8125C11.9617 8.9375 12.1048 8.99676 12.2103 9.10225C12.3157 9.20774 12.375 9.35082 12.375 9.5C12.375 9.64918 12.3157 9.79226 12.2103 9.89775C12.1048 10.0032 11.9617 10.0625 11.8125 10.0625Z"
                                  fill="white"/>
                        </svg>
                    </a>
                </div>
                <div class="card-f">
                    <div class="card-text">@lang('general.my_balance')</div>
                    <div class="card-id">
                        ID:
                        <span>{{ auth()->user()->id }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="a1-f">
            <a href="#" class="a1-f-link link-copy link-copy-hint">
                <div class="link-copy-hint__text">@lang('general.copied_to_clipboard')</div>
                <input type="text" class="link-copy-input" value="{{ route('ref', auth()->id()) }}">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.4996 11.5001V2.5H4.49915" stroke="#0C212E" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M11.4995 4.5H2.49915V13.5H11.4995V4.5Z" stroke="#0C212E" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </a>
            <a href="{{ route('ig-story') }}" class="a1-f-link" target="_blank">
                <span>@lang('general.share_instagram')</span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.125 10H16.875" stroke="#0C212E" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M11.25 4.375L16.875 10L11.25 15.625" stroke="#0C212E" stroke-width="1.5"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div><!-- /.a1 -->
</div>