

<div class="withdraw__row">
    <label class="input withdraw__item js-input-password">
        <span class="input__title">Ваш пароль</span>
        <span class="input__field-wrapper">
            <span class="input__field-wrapper">
                <img src="/img/new/icons/icon-lock-accent.svg" alt="alt" class="input__icon">
                <input type="password" name="user_password" id="current-password" wire:model.defer="state.current_password"
                    class="input__field input__big element-blur input__field-blue js-input-password-field">
                <span class="input__control js-input-password-toggler icon-mask"></span>
            </span>
        @error('current_password')
            <div class="input__error">{{ $message }}</div>
        @enderror
        </span>
    </label>
    <label class="input withdraw__item js-input-password">
        <span class="input__title">Новый пароль</span>
        <span class="input__field-wrapper">
            <span class="input__field-wrapper"> 
                <img src="/img/new/icons/icon-lock-accent.svg" alt="alt" class="input__icon">
                <input type="password" name="user_password_new" id="new-password" wire:model.defer="state.password"
                    class="input__field input__big element-blur input__field-blue js-input-password-field">
                <span class="input__control js-input-password-toggler icon-mask"></span>
            </span>
        @error('password')
            <div class="input__error">{{ $message }}</div>
        @enderror
        </span>
    </label>
    <label class="input withdraw__item js-input-password">
        <span class="input__title">Новый пароль</span>
        <span class="input__field-wrapper">
        <span class="input__field-wrapper">
            <img src="/img/new/icons/icon-lock-accent.svg" alt="alt" class="input__icon">
            <input type="password" name="user_password_repeat" id="new-password-confirm"
                class="input__field input__big element-blur input__field-blue js-input-password-field" wire:model.defer="state.password_confirmation">
            <span class="input__control js-input-password-toggler icon-mask"></span>
        </span>

        @error('password_confirmation')
            <div class="input__error">{{ $message }}</div>
        @enderror
        </span>
    </label>

    <label class="input withdraw__item js-input-password">
        <span class="input__title">@lang('settings.confirmation_code')</span>
        <span class="input__field-wrapper">
            <input type="text" name="user_password_repeat" id="new-password-confirm" id="code" wire:model.defer="state.code"
                class="input__big element-blur input__field-blue js-input-password-field" wire:model.defer="state.password_confirmation">            
        @error('code')
            <div class="input__error">{{ $message }}</div>
        @enderror

        @livewire('request-verification-code')
        @error('password_confirmation')
            <div class="input__error">{{ $message }}</div>
        @enderror
        </span>
    </label>
     
    <div class="withdraw__item">
        <input type="submit" value="Изменить пароль"
            class="btn btn-strong btn-fill-blue-accent withdraw__submit withdraw__item-submit" wire:click="changePassword" wire:loading.attr="disabled">        
    </div>
</div>