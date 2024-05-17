<div class="modal__inner">
    <div class="modal-title">@lang('settings.confirm_changes')</div>

    <div class="f-block">
        <div class="f-block-row">
            <label for="current-password" class="f-label">@lang('settings.current_password')</label>
        </div>
        <input type="password" id="current-password" class="f-input"
               placeholder="Введите текущий пароль" wire:model.defer="state.current_password">
        @error('current_password')
        <div class="error-msg">{{ $message }}</div>
        @enderror
    </div>

    <div class="f-block">
        <div class="f-block-row">
            <label for="new-password" class="f-label">@lang('settings.new_password')</label>
        </div>
        <input type="password" id="new-password" class="f-input" placeholder="Новый пароль"
               wire:model.defer="state.password">
        @error('password')
        <div class="error-msg">{{ $message }}</div>
        @enderror
    </div>

    <div class="f-block">
        <div class="f-block-row">
            <label for="new-password-confirm" class="f-label">@lang('settings.confirm_password')</label>
        </div>
        <input type="password" id="new-password-confirm" class="f-input" placeholder="Новый пароль"
               wire:model.defer="state.password_confirmation">
        @error('password_confirmation')
        <div class="error-msg">{{ $message }}</div>
        @enderror
    </div>

    <div class="f-block">
        <div class="f-block-row">
            <label for="code" class="f-label">@lang('settings.confirmation_code')</label>
        </div>
        <input type="text" id="code" class="f-input recovery-code" placeholder="Введите код"
               wire:model.defer="state.code">
        @error('code')
        <div class="error-msg">{{ $message }}</div>
        @enderror

        @livewire('request-verification-code')
    </div>

    <button class="btn btn__submit recovery-btn" wire:click="changePassword" wire:loading.attr="disabled">
        @lang('general.save')
    </button>
</div>