@section('title')
    @lang('finances.title')
@endsection

<x-app-layout>
    <div class="content-row profile-row">
        @include('layouts.partials.container.user-hero')

        <div class="fin">
            <div class="fin-title _lg-hidden">@lang('finances.title')</div>
            <div class="fin-switch-wrapper switch-wrapper" x-data="{ type: '{{ request()->tab ?? 'replenish' }}' }">
                <div class="fin-switch switch scroll-mobile" data-scroll-width="520">
                    <input type="hidden" class="switch-value" value="adding">
                    <div :class="{'fin-switch-item': true, 'switch-item': true, 'active': type == 'replenish'}"
                         @click="type = 'replenish'"
                    >
                        @lang('finances.replenish')
                    </div>
                    <div :class="{'fin-switch-item': true, 'switch-item': true, 'active': type == 'withdraw'}"
                         @click="type = 'withdraw'"
                    >
                        @lang('finances.withdraw')
                    </div>
                    <div :class="{'fin-switch-item': true, 'switch-item': true, 'active': type == 'transfer'}"
                         @click="type = 'transfer'"
                    >
                        @lang('finances.transfer')
                    </div>
                </div>
                <div class="switch-box active" x-show="type == 'replenish'">
                    <form action="{{ route('finances.store') }}" method="POST" class="fin-form">
                        @csrf
                        <input type="hidden" name="type" x-model="type">

                        <div class="fin-form-row">

                            <div class="fin-form-item f-block">
                                <div class="f-block-row">
                                    <label for="deposit_amount"
                                           class="f-label">@lang('finances.replenish_amount')</label>
                                </div>
                                <input type="text" id="deposit_amount" class="f-input" placeholder="Введите сумму"
                                       name="amount">
                                @error('amount')
                                <div class="error-msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fin-form-item f-block">
                                <div class="f-block-row">
                                    <label class="f-label">@lang('finances.replenish_method')</label>
                                </div>
                                <div class="f-input f-select dd select">
                                    <input type="hidden" class="dd-input" name="method" value="undefined">
                                    <div class="f-select-item selected">
                                        <div class="f-select-label">@lang('finances.replenish_method')</div>
                                    </div>
                                    <ul class="f-select-list dd-list">
                                        @foreach(config('finances.supported') as $finKey => $finValue)
                                            <li>
                                                <div class="f-select-item dd-item" data-value="{{ $finKey }}">
                                                    <div class="f-select-text">{{ $finValue['short'] }}</div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @error('method')
                                <div class="error-msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit"
                                    class="fin-form-item btn btn_blue btn__submit">@lang('finances.replenish_wallet')
                            </button>
                        </div>
                    </form>

                    <div class="fin-rep">
                        <div class="fin-rep__inner">
                            <div class="fin-rep-title _lg-hidden">@lang('finances.title')</div>
                            @forelse($transactions->where('type', 'replenish') as $transaction)
                                <div class="fin-rep-row">
                                    <div class="fin-rep-icon">
                                        <img src="/assets/icon-download.svg" alt="adding">
                                    </div>
                                    <div class="fin-rep-label" title="@lang('finances.replenishment')">
                                        @lang('finances.replenishment')
                                    </div>
                                    <div class="fin-rep-date">{{ $transaction->created_at->format('d.m.Y H:i')  }}</div>
                                    @if($transaction->status == 'pending')
                                        <div class="fin-rep-status _pending">
                                            <div class="fin-rep-status__icon"></div>
                                            <span
                                                    class="fin-rep-status__text">@lang('finances.operation_pending')</span>
                                        </div>
                                    @endif
                                    @if($transaction->status == 'success')
                                        <div class="fin-rep-status _success">
                                            <div class="fin-rep-status__icon"></div>
                                            <span
                                                    class="fin-rep-status__text">@lang('finances.operation_success')</span>
                                        </div>
                                    @endif
                                    @if($transaction->status == 'failed')
                                        <div class="fin-rep-status _error">
                                            <div class="fin-rep-status__icon"></div>
                                            <span class="fin-rep-status__text">@lang('finances.operation_failed')</span>
                                        </div>
                                    @endif
                                    <div class="fin-rep-val">
                                        @if($transaction->status != 'failed')
                                            + @endif{{ format_money($transaction->amount) }} USDT
                                    </div>
                                </div>
                            @empty
                                <div class="text-center">
                                    <b>@lang('finances.replenishments_empty')</b>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="switch-box active" x-show="type == 'withdraw'">
                    <form action="{{ route('finances.store') }}" method="POST" class="fin-form">
                        @csrf
                        <input type="hidden" name="type" x-model="type">

                        <div class="fin-form-row">

                            <div class="fin-form-item f-block">
                                <div class="f-block-row">
                                    <label for="withdrawal_amount"
                                           class="f-label">@lang('finances.withdraw_amount')</label>
                                </div>
                                <input type="number" min="0" id="withdrawal_amount" class="f-input"
                                       placeholder="Введите сумму" name="amount">
                                @error('amount')
                                <div class="error-msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fin-form-item f-block">
                                <div class="f-block-row">
                                    <label class="f-label">@lang('finances.withdraw_method')</label>
                                </div>
                                <div class="f-input f-select dd select">
                                    <input type="hidden" class="dd-input" value="undefined">
                                    <div class="f-select-item selected">
                                        <div class="f-select-label">@lang('finances.withdraw_method')</div>
                                    </div>
                                    <ul class="f-select-list dd-list">
                                        <li>
                                            <div class="f-select-item dd-item" data-value="btc">
                                                <div class="f-select-text">USDT (TRC20)</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @error('method')
                                <div class="error-msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fin-form-item f-block">
                                <div class="f-block-row">
                                    <label for="wallet_withdrawal"
                                           class="f-label">@lang('finances.withdraw_wallet')</label>
                                </div>
                                <input type="text" id="wallet_withdrawal" class="f-input"
                                       placeholder="Введите реквизиты" name="withdraw_to">
                                @error('withdraw_to')
                                <div class="error-msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit"
                                    class="fin-form-item btn btn_blue btn__submit">@lang('finances.withdraw_money')
                            </button>

                            <div class="fin-form-item fin-form-info _gray">
                                <div class="info-msg">
                                    <img src="/assets/icon-info.svg" alt="info" class="info-msg__icon">
                                    <span class="info-msg__text">@lang('finances.min_amount_to_withdraw'): <span
                                                class="_dark">50 USDT</span></span>
                                </div>
                            </div>

                            <div class="fin-form-item fin-form-info _white">
                                <div class="info-msg _absolute">
                                    <span class="info-msg__text">@lang('finances.your_commission'):
                                        <span class="_dark">{{ auth()->user()->withdrawal_fee }}%</span>
                                    </span>
                                    <div class="info-msg__icon-link hint hint__fin-item-right">
                                        <div class="hint__text">
                                            @lang('finances.default_fee') – 3%<br>
                                            @lang('finances.specified_fee', ['count' => 2]) – 5%<br>
                                            @lang('finances.specified_fee', ['count' => 3]) – 7%<br>
                                            @lang('finances.specified_fee_freq', ['count' => 4]) – 9%<br>
                                        </div>
                                        <img src="/assets/icon-question.svg" alt="question" class="info-msg__icon">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                    <div class="fin-rep">
                        <div class="fin-rep__inner">
                            <div class="fin-rep-title _lg-hidden">@lang('finances.title')</div>
                            @forelse($transactions->where('type', 'withdraw') as $transaction)
                                <div class="fin-rep-row">
                                    <div class="fin-rep-icon">
                                        <img src="/assets/icon-upload.svg" alt="withdrawal">
                                    </div>
                                    <div class="fin-rep-label" @lang('finances.withdrawal')>
                                        @lang('finances.withdrawal')
                                    </div>
                                    <div class="fin-rep-date">{{ $transaction->created_at->format('d.m.Y H:i')  }}</div>
                                    @if($transaction->status == 'pending')
                                        <div class="fin-rep-status _pending">
                                            <div class="fin-rep-status__icon"></div>
                                            <span
                                                    class="fin-rep-status__text">@lang('finances.operation_pending')</span>
                                        </div>
                                    @endif
                                    @if($transaction->status == 'success')
                                        <div class="fin-rep-status _success">
                                            <div class="fin-rep-status__icon"></div>
                                            <span
                                                    class="fin-rep-status__text">@lang('finances.operation_success')</span>
                                        </div>
                                    @endif
                                    @if($transaction->status == 'failed')
                                        <div class="fin-rep-status _error">
                                            <div class="fin-rep-status__icon"></div>
                                            <span class="fin-rep-status__text">@lang('finances.operation_failed')</span>
                                        </div>
                                    @endif
                                    <div class="fin-rep-info">@lang('withdrawals.destination')
                                        : {{ $transaction->payload['withdraw_to'] }}</div>
                                    <div class="fin-rep-val">- {{ format_money($transaction->amount) }} USDT</div>
                                </div>
                            @empty
                                <div class="text-center">
                                    <b>@lang('finances.withdrawals_empty')</b>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="switch-box active" x-show="type == 'transfer'">
                    @livewire('finance-transfer-form')

                    <div class="fin-rep">
                        <div class="fin-rep__inner">
                            <div class="fin-rep-title _lg-hidden">@lang('finances.title')</div>

                            @forelse($transactions->where('type', 'transfer') as $transaction)
                                <div class="fin-rep-row">
                                    <div class="fin-rep-icon">
                                        <img src="/assets/icon-upload.svg" alt="withdrawal">
                                    </div>
                                    @if(array_key_exists('receiver_id', $transaction->payload))
                                        <div class="fin-rep-label" title="@lang('finances.transfer_to_another_user')">
                                            @lang('finances.transfer_to_another_user')
                                        </div>
                                    @else
                                        <div class="fin-rep-label" title="@lang('finances.replenishment')">
                                            @lang('finances.replenishment')
                                        </div>
                                    @endif
                                    <div class="fin-rep-date">{{ $transaction->created_at->format('d.m.Y H:i')  }}</div>
                                    @if($transaction->status == 'pending')
                                        <div class="fin-rep-status _pending">
                                            <div class="fin-rep-status__icon"></div>
                                            <span
                                                    class="fin-rep-status__text">@lang('finances.operation_pending')</span>
                                        </div>
                                    @endif
                                    @if($transaction->status == 'success')
                                        <div class="fin-rep-status _success">
                                            <div class="fin-rep-status__icon"></div>
                                            <span
                                                    class="fin-rep-status__text">@lang('finances.operation_success')</span>
                                        </div>
                                    @endif
                                    @if($transaction->status == 'failed')
                                        <div class="fin-rep-status _error">
                                            <div class="fin-rep-status__icon"></div>
                                            <span class="fin-rep-status__text">@lang('finances.operation_failed')</span>
                                        </div>
                                    @endif
                                    @if(array_key_exists('receiver_id', $transaction->payload))
                                        @php
                                            $user = $users->first(fn ($u) => $u->id === (int)$transaction->payload['receiver_id'])
                                        @endphp
                                        <div class="fin-rep-info">{{ $user->full_name ?? '' }}</div>
                                        <div class="fin-rep-val">- {{ format_money($transaction->amount) }} USDT</div>
                                    @else
                                        @php
                                            $user = $users->first(fn ($u) => $u->id === (int)$transaction->payload['sender_id'])
                                        @endphp
                                        <div class="fin-rep-info">{{ $user->full_name ?? '' }}</div>
                                        <div class="fin-rep-val">+ {{ format_money($transaction->amount) }} USDT</div>
                                    @endif
                                </div>
                            @empty
                                <div class="text-center">
                                    <b>@lang('finances.transfers_empty')</b>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
