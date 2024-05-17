<form action="{{ route('finances.store') }}" method="POST" class="fin-form">
    @csrf
    <input type="hidden" name="type" x-model="type">
    <input type="hidden" name="receiver_id" value="{{ $state['receiver']->id ?? null }}">
    <div class="fin-form-row">

        <div class="fin-form-item f-block">
            <div class="f-block-row">
                <label for="transfer_amount"
                       class="f-label">@lang('finances.transfer_amount')</label>
            </div>
            <input type="number" id="transfer_amount" class="f-input" placeholder="Введите сумму" name="amount"
                   wire:model="state.amount">
            @error('amount')
            <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="fin-form-item f-block">
            <div class="f-block-row">
                <label for="ref_code"
                       class="f-label">@lang('finances.referral_code_receiver')</label>
            </div>
            <input type="number"
                   id="ref_code"
                   class="f-input"
                   placeholder="@lang('finances.enter_referral_code')"
                   wire:model="state.receiver_id"
            >
            @error('receiver_id')
            <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="fin-form-item fin-form-info _gray">
            <div class="info-msg _absolute">
                <img src="/assets/icon-user-blue.svg" alt="user" class="info-msg__icon">
                @if(!is_null($state['receiver']))
                    <span class="info-msg__text">
                        @lang('finances.found'): {{ $state['receiver']->full_name_short }}
                    </span>
                @elseif(!empty($state['receiver_id']))
                    <span class="info-msg__text">
                        @lang('finances.not_found')
                    </span>
                @endif
            </div>
        </div>

        <div class="btn-modal__wrapper fin-form-item">
            <button type="button"
                    class="btn btn_blue btn__submit btn-modal"
                    wire:loading.attr="disabled"
                    @if(empty($state['amount']) || is_null($state['receiver'])) disabled @endif
            >
                @lang('finances.transfer_btn')
            </button>
            <div class="modal__wrapper">
                <div class="modal confirm">
                    <div class="modal-close js-modal-close">
                        <img src="/assets/icon-modal-close.svg" alt="close">
                    </div>
                    <div class="modal__inner">
                        <div class="modal-title">@lang('finances.transfer_confirmation')</div>
                        <div class="modal-desc _gray">
                            @lang('finances.transfer_you_confirm')
                            <span class="_dark">@lang('finances.transfer_amount_s') {{ $state['amount'] }} USDT</span>
                            @lang('finances.transfer_user')
                            <span class="_dark">{{ $state['receiver']->full_name_short ?? '' }}</span>
                        </div>
                        <div class="modal-btns">
                            <button type="button" class="btn modal-btn btn_undo js-modal-close">
                                @lang('general.no')
                            </button>
                            <button type="submit" class="btn modal-btn btn_do">
                                @lang('general.yes')
                            </button>
                        </div>
                    </div>
                </div>
            </div><!-- modal -->
        </div>
    </div>
</form>