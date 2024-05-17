@section('title')
    @lang('referral-system.title')
@endsection

<x-app-layout>
    <div class="content-row profile-row">
        @include('layouts.partials.container.user-hero')

        <div class="ref__wrapper">
            <div class="ref-title">@lang('referral-system.title')</div>
            <div class="ref-warning">@lang('referral-system.subtitle')</div>

            @foreach($stars as $star)
                <div class="ref-block">
                    <div class="ref-row">
                        <div class="ref-box">
                            <div class="ref-box-row ref-box-h">
                                <div class="ref-box-icon">
                                    <img src="/assets/icon-star.svg" alt="star">
                                </div>
                                <div class="ref-box-row-text">
                                    <div class="ref-box-title">@lang('referral-system.star')</div>
                                </div>
                            </div>
                            <div class="ref-box-label">
                                @if($star->level === 9)
                                    @lang('partners.director')
                                @else
                                    {{ $star->level }}
                                @endif
                            </div>
                        </div>
                        <div class="ref-box">
                            <div class="ref-box-row ref-box-h">
                                <div class="ref-box-icon">
                                    <img src="/assets/icon-briefcase.svg" alt="briefcase">
                                </div>
                                <div class="ref-box-row-text">
                                    <div class="ref-box-title">@lang('referral-system.turnover_fl')</div>
                                    <div class="ref-box-subtitle">(@lang('referral-system.to_next_line'))</div>
                                </div>
                            </div>
                            <div class="ref-box-label">{{ format_money($star->min_turnover_fl) }} USDT</div>
                        </div>
                        <div class="ref-box">
                            <div class="ref-box-row ref-box-h">
                                <div class="ref-box-icon">
                                    <img src="/assets/icon-nameplate.svg" alt="nameplate">
                                </div>
                                <div class="ref-box-row-text">
                                    <div class="ref-box-title">@lang('referral-system.turnover')</div>
                                    <div class="ref-box-subtitle">(@lang('referral-system.to_next_line'))</div>
                                </div>
                            </div>
                            <div class="ref-box-label">{{ format_money($star->min_turnover) }} USDT</div>
                        </div>
                        <div class="ref-box">
                            <div class="ref-box-row ref-box-h">
                                <div class="ref-box-icon">
                                    <img src="/assets/icon-medal.svg" alt="medal">
                                </div>
                                <div class="ref-box-row-text">
                                    <div class="ref-box-title">@lang('referral-system.bonus')</div>
                                </div>
                            </div>
                            <div class="ref-box-label">{{ format_money($star->bonus) }} USDT</div>
                        </div>
                    </div>
                    <div class="ref-box _big">
                        <div class="ref-box-row ref-box-h">
                            <div class="ref-box-icon">
                                <img src="/assets/icon-star.svg" alt="star">
                            </div>
                            <div class="ref-box-row-text">
                                <div class="ref-box-title">@lang('referral-system.referral_bonus')</div>
                            </div>
                        </div>
                        <div class="ref-box-items">
                            @foreach($star->referral_bonus_percentage as $line => $percentage)
                                <div class="ref-box-item">
                                    <div class="ref-box-item-label">{{ $percentage }}%</div>
                                    <div class="ref-box-item-desc">{{ $line }} @lang('referral-system.line')</div>
                                </div>
                            @endforeach
                            @if($star->monthly_turnover_bonus_percentage > 0)
                                <div class="ref-box-item">
                                    <div class="ref-box-item-label">
                                        {{ $star->monthly_turnover_bonus_percentage }}%
                                    </div>
                                    <div class="ref-box-item-desc">
                                        @lang('referral-system.monthly_turnover_bonus_percentage')
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>