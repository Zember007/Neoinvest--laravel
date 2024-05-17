@section('title')
    @lang('profile.title')
@endsection

<x-app-layout>
    <div class="content-row profile-row">
        @include('layouts.partials.container.user-hero')

        <div class="a2">
            <div class="box">
                <div class="box-row box-h">
                    <div class="box-icon">
                        <img src="/assets/icon-userplus.svg" alt="user">
                    </div>
                    <div class="box-row-text">
                        <div class="box-title">@lang('profile.mentor')</div>
                    </div>
                </div>
                @if(!is_null(auth()->user()->referrer_id))
                    @php
                        $referrer = auth()->user()->referrer
                    @endphp
                    <div class="box-label">{{ $referrer->full_name }}</div>
                    <div class="box-extrainfo _ttu">ID: {{ $referrer->id }}</div>
                @else
                    <div class="box-label">@lang('general.no_referrer')</div>
                @endif
            </div>

            <div class="box">
                <div class="box-row box-h">
                    <div class="box-icon">
                        <img src="/assets/icon-star.svg" alt="star">
                    </div>
                    <div class="box-row-text">
                        <div class="box-title">@lang('profile.your_star')</div>
                    </div>
                </div>
                <div class="box-label">{{ auth()->user()->star->level }}</div>
            </div>

            <div class="box _flex-grow _last">
                <div class="box-row box-h">
                    <div class="box-icon">
                        <img src="/assets/icon-dollar.svg" alt="dollar">
                    </div>
                    <div class="box-row-text">
                        <div class="box-title">@lang('profile.earned_from_partners')</div>
                    </div>
                </div>
                <div class="box-label">{{ format_money(auth()->user()->referral_bonuses) }} USDT</div>
                <div class="box-extrainfo">
                    <span class="_dark">+{{ format_money(auth()->user()->getReferralBonusesMonthly()) }} USDT</span> @lang('profile.last_month')
                </div>
            </div>

            <div class="box">
                <div class="box-row box-h">
                    <div class="box-icon">
                        <img src="/assets/icon-puzzle.svg" alt="puzzle">
                    </div>
                    <div class="box-row-text">
                        <div class="box-title">@lang('profile.my_partners')</div>
                    </div>
                </div>
                <div class="box-label">{{ auth()->user()->referrals()->count() }}</div>
                <div class="box-extrainfo">
                    <span class="_dark">+{{ auth()->user()->getPartnersMonthly() }}</span> @lang('profile.last_month')
                </div>
            </div>

            <div class="box _flex-grow _big _last">
                <div class="box-row box-row_big">
                    <div class="box_big-text">
                        <div class="box-row box-h">
                            <div class="box-icon">
                                <img src="/assets/icon-columns.svg" alt="columns">
                            </div>
                            <div class="box-row-text">
                                <div class="box-title">@lang('profile.partners_invested')</div>
                                <div class="box-subtitle">(@lang('profile.your_structure_turnover'))</div>
                            </div>
                        </div>
                        <div class="box-label">{{ format_money(auth()->user()->getReferralsPacketInvests()) }} USDT
                        </div>
                        <div class="box-extrainfo">
                            <span class="_dark">+{{ format_money(auth()->user()->getReferralsPacketInvestsMonthly()) }} USDT</span> @lang('profile.last_month')
                        </div>
                    </div>
                    <div class="prbar">
                        <img src="/assets/progressbar-base.svg" alt="gray" class="prbar-base">
                        <img src="/assets/progressbar-shadow.svg" alt="shadow" class="prbar-shadow">
                        <img src="/assets/progressbar-levels.svg" alt="levels" class="prbar-levels">
                        <div class="prbar-num _start">{{ auth()->user()->star->level }}</div>
                        <div class="prbar-num _end">{{ auth()->user()->getNextStar()->level ?? '' }}</div>
                        <div class="prbar-val">
                            <input type="hidden" class="prbar-input"
                                   value="{{ auth()->user()->getStarProgressPercentage() }}">
                            <div class="prbar-val-placeholder">
                                <span class="prbar-val-num">0</span>
                                %
                            </div>
                            <div class="prbar-val-dot"></div>
                        </div>

                        <svg class="prbar-progress" width="380" height="106" viewBox="0 0 380 106" fill="#EEEEEE"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="
                        M 13.4243 8.53195
                        C 14.9536 3.46613 19.6206 0 24.9123 0
                        H 347
                        L 360 52.0982
                        L 347 106
                        H 24.9123
                        C 19.6206 106 14.9536 102.534 13.4243 97.4681
                        L 1.04696 56.4681
                        C 0.364204 54.2064 0.364203 51.7936 1.04696 49.5319
                        L 13.4243 8.53195Z"
                                  fill="url(#paint0_linear)"
                            />
                            <defs>
                                <linearGradient id="paint0_linear" x1="0" y1="53" x2="277" y2="53"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#003FC4"/>
                                    <stop offset="1" stop-color="#3287FF"/>
                                </linearGradient>
                            </defs>
                        </svg>

                        <path d="M13.4243 8.53195C14.9536 3.46613 19.6206 0 24.9123 0H269L277.201 52.0982C277.399 53.358 277.395 54.6414 277.189 55.9L269 106H24.9123C19.6206 106 14.9536 102.534 13.4243 97.4681L1.04696 56.4681C0.364204 54.2064 0.364203 51.7936 1.04696 49.5319L13.4243 8.53195Z"
                              fill="url(#paint0_linear)"/>
                    </div>
                </div>
            </div>

            <div class="box _wide">
                <div class="box-row box-h">
                    <div class="box-icon">
                        <img src="/assets/icon-clock.svg" alt="clicon-clock.svg">
                    </div>
                    <div class="box-row-text">
                        <div class="box-title">@lang('profile.new_partners')</div>
                    </div>
                </div>
                <div class="box-label">{{ auth()->user()->getPartnersDaily() }}</div>
                <div class="box-extrainfo">
                    <span class="_dark">+{{ auth()->user()->getPartnersMonthly() }}</span> @lang('profile.last_month')
                </div>
            </div>
            <div class="box _wide _last">
                <div class="box-row box-h">
                    <div class="box-icon">
                        <img src="/assets/icon-briefcase.svg" alt="briefcase">
                    </div>
                    <div class="box-row-text">
                        <div class="box-title">@lang('profile.your_investments')</div>
                    </div>
                </div>
                <div class="box-label">{{ format_money(auth()->user()->packet_invests) }} USDT</div>
                <div class="box-extrainfo">
                    <span class="_dark">+{{ format_money(auth()->user()->getInvestmentsMonthly()) }} USDT</span> @lang('profile.last_month')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
