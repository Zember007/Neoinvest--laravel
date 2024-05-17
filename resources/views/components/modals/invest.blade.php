<div {{ $attributes->merge(['class' => 'btn-modal__wrapper']) }}>
    {{ $slot }}
    <div class="modal__wrapper" data-modal="buy_package_infinity">
        <div class="modal confirm">
            <div class="modal-close js-modal-close">
                <img src="/assets/icon-modal-close.svg" alt="close">
            </div>
            <div class="modal__inner">
                <div class="modal-title">
                    @if($isReinvesting)
                        @lang('investments.reinvesting')
                    @else
                        @lang('investments.buying')
                    @endif
                    «@lang('investments.packets.' . $packetOption->name)»
                </div>

                @if($userBalance >= ($isReinvesting ? $packetOption->min_reinvest : $packetOption->min_invest))
                    <div class="modal-desc _dark">
                        @if($isReinvesting)
                            @lang('investments.in_order_to_reinvest')
                        @else
                            @lang('investments.in_order_to_buy')
                        @endif
                    </div>
                    <div class="f-block">
                        <div class="f-block-row">
                            <label for="sum_infinity"
                                   class="f-label">@lang('investments.enter_sum')</label>
                        </div>
                        <input type="text" id="sum_infinity" class="f-input input-range"
                               placeholder="Введите сумму">
                        <span class="info-msg__text">@lang('investments.min_investment_sum') <span
                                    class="_dark">{{ $packetOption->min_invest }} USDT</span></span>
                    </div>
                    <div class="range-wrapper">
                        <form action="{{ route($isReinvesting ? 'investments.reinvest' : 'investments.invest') }}"
                              method="POST" class="range" id="{{ $formId }}">
                            @csrf

                            <input type="hidden" name="packet_option_id" value="{{ $packetOption->id }}">
                            @if($isReinvesting)
                                <input type="hidden" name="packet_id" value="{{ $packet->id }}">
                            @endif

                            <div class="range-label">@lang('investments.fast_sum_pick')</div>
                            <div class="range-value">
                                <span></span> USDT
                            </div>
                            <div class="range-slider">
                                <input type="range" step="1" value="0"
                                       data-min="{{ $packetOption->min_invest }}"
                                       data-max="{{ $userBalance }}"
                                       name="amount"
                                >
                                <div class="range-slider-lim _min">{{ $packetOption->min_invest }}
                                    USDT
                                </div>
                                <div class="range-slider-lim _max">{{ $userBalance }}
                                    USDT
                                </div>
                            </div>
                        </form>
                    </div>
                    <button class="btn btn__submit"
                            onclick="event.preventDefault();document.getElementById('{{ $formId }}').submit();"
                    >
                        @if($isReinvesting)
                            @lang('investments.reinvest')
                        @else
                            @lang('investments.buy')
                        @endif
                    </button>
                @else
                    <div class="modal-desc _dark">@lang('investments.insufficient_money')</div>
                    <a href="{{ route('finances') }}" class="btn btn__submit">
                        @lang('finances.replenish_wallet')
                    </a>
                @endif
            </div>
        </div>
    </div><!-- modal -->
</div>