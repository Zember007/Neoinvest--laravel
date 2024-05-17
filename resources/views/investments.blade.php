@section('title')
    @lang('investments.title')
@endsection

<x-app-layout>
    <div class="content-row profile-row">
        @include('layouts.partials.container.user-hero')

        <div class="inv__wrapper">
            @if($packets->count() > 0)
                <div class="inv">
                    <div class="inv-title">@lang('investments.your_packets')</div>
                    <div class="table-wrapper inv-table__wrapper">
                        <table class="table inv-table">
                            <thead>
                            <tr>
                                <th>@lang('investments.name')</th>
                                <th>@lang('investments.daily_percentage')</th>
                                <th>@lang('investments.dividendum')</th>
                                <th>@lang('investments.invested')</th>
                                <th>@lang('investments.valid_until')</th>
                                <th>@lang('investments.reinvestment')</th>
                                <th>@lang('investments.closing')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($packets as $packet)
                                @php
                                    $packetOption = $packetOptions->first(fn ($option) => $option->id === $packet->packet_option_id)
                                @endphp
                                <tr>
                                    <td>@lang('investments.packets.' . $packetOption->name)</td>
                                    <td>{{ $packetOption->percentage }}%</td>
                                    <td>{{ $packet->earned }} USDT</td>
                                    <td>{{ $packet->invested }} USDT</td>
                                    <td>{{ optional($packet->expires_at)->format('d.m.Y H:i') ?? trans('investments.unlimited') }}</td>
                                    <td>
                                        @if($packetOption->is_reinvestable)
                                            <x-modals.invest :packet-option="$packetOption" :is-reinvesting="true"
                                                             :packet="$packet">
                                                <button class="btn-modal table-btn _blue">
                                                    @lang('investments.reinvest')
                                                </button>
                                            </x-modals.invest>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @if($packetOption->is_refundable)
                                            <div class="btn-modal__wrapper">
                                                <button class="btn-modal table-btn _red">
                                                    @lang('investments.close')
                                                </button>
                                                <div class="modal__wrapper" data-modal="package_close_confirm">
                                                    <div class="modal confirm">
                                                        <div class="modal-close js-modal-close">
                                                            <img src="/assets/icon-modal-close.svg" alt="close">
                                                        </div>
                                                        <div class="modal__inner">
                                                            <div class="modal-title">@lang('investments.closing_notice')
                                                            </div>
                                                            @if($packetOption->is_refundable)
                                                                <div class="modal-desc _gray">
                                                                    @lang('investments.closing_refund_notice')
                                                                </div>
                                                            @endif
                                                            <form action="{{ route('investments.close') }}"
                                                                  method="POST"
                                                                  class="modal-btns">
                                                                @csrf
                                                                <input type="hidden" name="packet_id"
                                                                       value="{{ $packet->id }}">

                                                                <button type="button"
                                                                        class="btn btn__submit modal-btn btn_undo js-modal-close">
                                                                    @lang('general.no')
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn__submit modal-btn btn_do">
                                                                    @lang('general.yes')
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div><!-- modal -->
                                            </div>
                                        @else
                                            —
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <div class="inv">
                <div class="inv-title">@lang('investments.buy_packets')</div>
                <div class="inv-row">
                    @foreach($packetOptions as $packetOption)
                        <div class="inv-card @if($packetOption->is_disabled) inv-card_disabled @endif">
                            @if($packetOption->is_disabled)
                                <div class="inv-card-placeholder">@lang('investments.coming_soon')</div>
                            @endif

                            @if($packetOption->is_disabled)
                                <div class="inv-card-backdrop">
                                    @endif

                                    <img src="/assets/package-neo-{{ $packetOption->name }}.png"
                                         alt="{{ $packetOption->name }}"
                                         class="inv-card-icon">
                                    <div class="inv-card-title">@lang('investments.packets.' . $packetOption->name)</div>
                                    <div class="inv-card-row">
                                        <div class="inv-card-label">@lang('investments.expiration_date'):</div>
                                        <div class="inv-card-value">
                                            @if($packetOption->is_indefinite)
                                                @lang('investments.unlimited')
                                            @else
                                                {{ $packetOption->duration_days }} @lang('investments.days')
                                            @endif
                                        </div>
                                    </div>
                                    <div class="inv-card-row">
                                        <div class="inv-card-label">@lang('investments.min_investment_sum'):</div>
                                        <div class="inv-card-value">{{ $packetOption->min_invest }} USDT</div>
                                    </div>
                                    <div class="inv-card-row">
                                        <div class="inv-card-label">@lang('investments.daily_percentage'):</div>
                                        <div class="inv-card-value">{{ $packetOption->percentage }}
                                            % @lang('investments.weekdays_only')</div>
                                    </div>
                                    <div class="inv-card-row">
                                        <div class="inv-card-label">@lang('investments.earnings'):</div>
                                        <div class="inv-card-value">@lang('investments.daily')</div>
                                    </div>
                                    <div class="inv-card-row">
                                        <div class="inv-card-label">@lang('investments.payback'):</div>
                                        <div class="inv-card-value">
                                            @if($packetOption->is_refundable)
                                                @lang('general.yes')
                                            @else
                                                @lang('general.no')
                                            @endif
                                            <div class="hint hint__inv-card">
                                                <div class="hint__text">
                                                    @if($packetOption->is_refundable)
                                                        @lang('investments.refundable_hint')
                                                    @else
                                                        @lang('investments.non_refundable_hint')
                                                    @endif
                                                </div>
                                                <img src="/assets/icon-question.svg" alt="more">
                                            </div>
                                        </div>
                                    </div>
                                    <x-modals.invest :packet-option="$packetOption" :is-reinvesting="false"
                                                     :packet="null"
                                                     class="inv-card-btn">
                                        <div class="btn btn__submit btn_blue btn-modal"
                                             data-modal="buy_package_infinity">
                                            @lang('investments.buy')
                                        </div>
                                    </x-modals.invest>

                                    @if($packetOption->is_disabled)
                                </div>
                                @endif
                        </div>
                    @endforeach
                </div>
            </div>

                <div class="inv" style="max-height: 600px; overflow-y: auto">
                    <div class="inv-title">@lang('investments.finances_history')</div>
                    @forelse($history as $historyEntry)
                        <div class="fin-rep-row">
                            <div class="fin-rep-icon">
                                <img src="/assets/icon-download.svg" alt="adding">
                            </div>
                            <div class="fin-rep-label">
                                {{ $historyEntry->get('name') }}
                            </div>
                            <div class="fin-rep-date">{{ $historyEntry->get('created_at')->format('d.m.Y H:i') }}</div>
                            @if(!is_null($historyEntry->get('amount')))
                                <div class="fin-rep-val"
                                     style="color: @if($historyEntry->get('is_negative')) #F11818 @else #219653 @endif">
                                    {{ $historyEntry->get('is_negative') ? '-' : '+' }} {{ format_money($historyEntry->get('amount')) }}
                                    USDT
                                </div>
                            @else
                                <div class="fin-rep-val">
                                    —
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="text-center">
                            <b>@lang('finances.withdrawals_empty')</b>
                        </div>
                    @endforelse
                </div>
        </div>
    </div>

    @if($errors->any())
        <div class="notif active _error">
            <img src="/assets/icon-notif-red.svg" alt="error" class="notif-icon">
            <div class="notif-text">@lang('general.error')</div>
        </div>
    @endif
</x-app-layout>
