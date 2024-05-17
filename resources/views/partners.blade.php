@section('title')
    @lang('partners.title')
@endsection

<x-app-layout>
    <div class="content-row profile-row">
        <div class="page-title _lg-hidden">@lang('partners.title')</div>
        @include('layouts.partials.container.user-hero')

        <div class="par__wrapper">
            <div class="par-title">@lang('partners.title')</div>

            <div class="par-block">
                <div class="par-block-title">@lang('partners.your_partners')</div>
                <div class="par-block-subtitle">@lang('partners.by_line'):</div>
                <div class="switch-wrapper">
                    <div class="par-switch switch scroll-mobile" data-scroll-width="620">
                        <input type="hidden" class="switch-value" value="line1">
                        @for($line = 1; $line <= 9; $line++)
                            <div class="par-switch-item switch-item @if($line === 1) active @endif"
                                 data-value="line{{ $line }}"
                                 data-box-id="line{{ $line }}"
                            >
                                {{ $line }}<span>@lang('partners.line')</span>
                            </div>
                        @endfor
                    </div>
                    @for($line = 1; $line <= 9; $line++)
                        <div class="switch-box @if($line === 1) active @endif" data-box-id="line{{ $line }}">
                            @if($leveledReferrals->has($line))
                                <div class="table-wrapper par-table__wrapper">
                                    <table class="table _fixed par-table">
                                        <thead>
                                        <tr>
                                            <th>@lang('partners.name')</th>
                                            <th>@lang('partners.contacts')</th>
                                            <th>ID</th>
                                            <th>@lang('partners.star')</th>
                                            <th>@lang('partners.mentor')</th>
                                            <th>@lang('partners.turnover')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($leveledReferrals->get($line) as $referral)
                                            <tr>
                                                <td>{{ $referral->full_name }}</td>
                                                <td>{{ $referral->contacts ?? '—' }}</td>
                                                <td>{{ $referral->id }}</td>
                                                <td>{{ $referral->star->level }}</td>
                                                <td>{{ $referral->referrer->full_name }}</td>
                                                <td>{{ format_money($referral->getReferralsPacketInvests()) }} USDT
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="table-wrapper par-table__wrapper par-notparts">
                                    <div class="par-notparts__placeholder">
                                        <div class="par-notparts-title">@lang('partners.no_partners') @lang('partners.on_line', ['line' => $line])</div>
                                        <div class="par-notparts-desc">@lang('partners.no_partners_description')</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endfor
                </div>
            </div>

            <div class="par-row">
                <div class="par-block par-hist">
                    <div class="par-block-title">@lang('partners.history')</div>

                    @forelse($history as $historyEntry)
                        <div class="par-hist-row">
                            <div class="par-hist-label">
                                @if($historyEntry->get('is_star_transaction'))
                                    @lang('partners.you_have_received_bonus_from')
                                    <span class="_gray">{{ $historyEntry->get('referred_name') }}</span>
                                @elseif($historyEntry->get('is_star_bonus'))
                                    @lang('partners.your_star_increased')
                                @endif
                            </div>
                            <div class="par-hist-val">{{ format_money($historyEntry->get('amount')) }} USDT</div>
                            <div class="par-hist-line">
                                @if($historyEntry->get('is_star_transaction'))
                                    {{ $historyEntry->get('referral_level') }} @lang('partners.line')
                                @elseif($historyEntry->get('is_star_bonus'))
                                    {{ $historyEntry->get('level') }} @lang('partners.star_lowercase')
                                @endif
                            </div>
                            <div
                                    class="par-hist-date">{{ $historyEntry->get('created_at')->format('d.m.Y H:i')  }}</div>
                        </div>
                    @empty
                        <div>@lang('partners.history_empty')</div>
                    @endforelse
                </div>
                <div class="par-block par-mentor">
                    <div class="par-block-title">@lang('partners.your_mentor')</div>
                    <div class="par-mentor-row">
                        @if(!is_null(auth()->user()->referrer_id))
                            @php
                                $referrer = auth()->user()->referrer
                            @endphp
                            <div class="par-mentor-avatar"
                                 style="background-image: url('{{ $referrer->profile_photo_url }}');background-size: cover;background-position: center;"
                            >
                            </div>
                            <div class="par-mentor-text">
                                <div class="par-mentor-name">{{ $referrer->full_name }}</div>
                                <div class="par-mentor-id">ID: {{ $referrer->id }}</div>
                            </div>
                        @else
                            <div class="par-mentor-avatar">
                                <img src="/assets/icon-user.svg" alt="mentor" class="par-mentor-avatar__placeholder"
                                     style="width: 50%">
                            </div>
                            <div class="par-mentor-text">
                                <div class="par-mentor-name">@lang('general.no_referrer')</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="par-block">
                <div class="par-block-title">@lang('partners.your_partners')</div>
                <div class="par-block-subtitle">@lang('partners.on_star'):</div>
                <div class="switch-wrapper">
                    <div class="par-switch switch _stars scroll-mobile" data-scroll-width="1201">
                        <input type="hidden" class="switch-value" value="star1">

                        @for($star = 0; $star <= 9; $star++)
                            <div class="par-switch-item switch-item stars @if($star === 0) active @endif"
                                 data-value="star{{$star}}" data-box-id="star{{ $star }}">
                                @if($star === 0)
                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 16C4.63748 16 2.8875 15.28 1.74998 13.84C0.612469 12.4 0 10.48 0 8C0 5.59998 0.612531 3.60001 1.74998 2.16C2.88744 0.720001 4.63748 0 7 0C9.36252 0 11.1125 0.720001 12.25 2.16C13.3875 3.60001 14 5.51999 14 8C14 10.4 13.3875 12.4 12.25 13.84C11.1125 15.28 9.36252 16 7 16ZM4.54994 4.23996C4.02495 5.19998 3.76243 6.39997 3.76243 7.99994C3.76243 9.51993 4.02495 10.8 4.54994 11.7599C5.07492 12.7199 5.94997 13.1999 6.99994 13.1999C8.13745 13.1999 8.92496 12.7199 9.44994 11.7599C9.97492 10.7999 10.2374 9.59992 10.2374 7.99994C10.2374 6.47995 9.97492 5.19993 9.44994 4.23996C8.92496 3.27994 8.0499 2.79996 6.99994 2.79996C5.86248 2.87995 5.07498 3.35999 4.54994 4.23996Z"
                                              fill="white"/>
                                    </svg>
                                @elseif($star === 9)
                                    @lang('partners.director')
                                @else
                                    @for($starC = 0; $starC < $star; $starC++)
                                        <svg class="par-switch-star" width="14" height="14" viewBox="0 0 14 14"
                                             fill="none"
                                             xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path d="M13.9479 5.08814C13.8855 4.89215 13.7654 4.71952 13.6034 4.59279C13.4414 4.46605 13.245 4.39109 13.0397 4.37769L9.32781 4.11792L7.95086 0.650635C7.87634 0.458947 7.74566 0.29424 7.57593 0.178096C7.4062 0.061953 7.20535 -0.000209103 6.99969 -0.000244141H6.99871C6.79337 0.000122117 6.59291 0.0624427 6.42356 0.178569C6.2542 0.294695 6.12383 0.459221 6.04949 0.650635L4.65203 4.13794L0.960623 4.37769C0.755368 4.39109 0.55892 4.46605 0.396909 4.59279C0.234898 4.71952 0.114847 4.89215 0.0524198 5.08814C-0.0134369 5.28691 -0.0179169 5.5009 0.0395629 5.70226C0.0970428 5.90361 0.213819 6.08299 0.374685 6.21704L3.21453 8.61743L2.3698 11.9402C2.31158 12.164 2.32229 12.4002 2.40052 12.6178C2.47876 12.8355 2.62088 13.0244 2.80828 13.1599C2.98921 13.2915 3.20557 13.3657 3.42921 13.3726C3.65285 13.3796 3.87341 13.3191 4.06218 13.199L6.99187 11.343C6.99578 11.3401 6.99968 11.3381 7.00847 11.343L10.1608 13.3401C10.332 13.4494 10.5321 13.5046 10.7351 13.4983C10.9381 13.492 11.1345 13.4246 11.2985 13.3049C11.4683 13.1822 11.5971 13.011 11.668 12.8139C11.7389 12.6167 11.7487 12.4027 11.696 12.2L10.7985 8.57007L13.6257 6.21704C13.7865 6.08299 13.9033 5.90361 13.9608 5.70226C14.0183 5.5009 14.0138 5.28691 13.9479 5.08814Z"
                                                  fill="white"/>
                                        </svg>
                                    @endfor
                                @endif
                            </div>
                        @endfor
                    </div>
                    @for($star = 0; $star <= 9; $star++)
                        <div class="switch-box @if($star === 0) active @endif" data-box-id="star{{ $star }}">
                            <div class="table-wrapper par-table__wrapper">
                                @if($starredReferrals->has($star))
                                    <table class="table _fixed par-table">
                                        <thead>
                                        <tr>
                                            <th>@lang('partners.name')</th>
                                            <th>@lang('partners.contacts')</th>
                                            <th>ID</th>
                                            <th>@lang('partners.star')</th>
                                            <th>@lang('partners.mentor')</th>
                                            <th>@lang('partners.turnover')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($starredReferrals->get($star) as $referral)
                                            <tr>
                                                <td>{{ $referral->full_name }}</td>
                                                <td>{{ $referral->contacts ?? '—' }}</td>
                                                <td>{{ $referral->id }}</td>
                                                <td>{{ $referral->star->level }}</td>
                                                <td>{{ $referral->referrer->full_name }}</td>
                                                <td>{{ format_money($referral->getReferralsPacketInvests()) }} USDT
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="table-wrapper par-table__wrapper par-notparts">
                                        <div class="par-notparts__placeholder">
                                            <div class="par-notparts-title">@lang('partners.no_partners') @lang('partners.with_star', ['star' => $star === 9 ? trans('partners.director') : $star])</div>
                                            <div class="par-notparts-desc">@lang('partners.no_partners_description')</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
