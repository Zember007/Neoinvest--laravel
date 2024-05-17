<div
        {{ $attributes->merge(['class' => 'switch-wrapper']) }}
        x-data="{ show_email: {{ $preferredMode === 'email' ? 'true' : 'false' }}, login: '{{ $attributes->get('phone') }}' }"
>
    {{ $slot }}

    <input type="hidden" class="switch-value" value="login">
    <input type="hidden" name="is_email" x-model="show_email">
    @if(!$isSingle)
        <div class="f-switch switch">
            <div :class="{'f-switch-item': true, 'switch-item': true, 'active': ! show_email }"
                 @click="show_email = false, login = ''"
            >
                @lang('auth.your_phone')
            </div>
            <div :class="{'f-switch-item': true, 'switch-item': true, 'active': show_email }"
                 @click="show_email = true, login = ''"
            >
                @lang('auth.your_email')
            </div>
        </div>
    @endif
    <div class="switch-box active" x-show="! show_email">
        <div class="f-block" style="{{ $attributes->get('margin-styles') }}">
            <div class="f-block-row">
                @if($attributes->has('hint'))
                    <label for="a" class="f-label" style="display: flex; align-items: center">
                        @lang('auth.your_phone')
                        <div class="hint hint__inv-card">
                            <div class="hint__text" style="right: -200px;">
                                {{ $attributes->get('hint') }}
                            </div>
                            <img src="/assets/icon-question.svg" alt="more">
                        </div>
                    </label>
                @else
                    <label for="a" class="f-label">@lang('auth.your_phone')</label>
                @endif
            </div>

            <div class="ph">
                <div class="ph-dd">
                    <input type="hidden"
                           class="ph-value"
                           name="phone_country"
                           value="{{ $attributes->has('phone-country') ? $attributes->get('phone-country') : 'ru' }}"
                    >
                    <div class="ph-dd-item selected">
                        <img src="/assets/flag-ru.svg" alt="ru" class="flag">
                    </div>
                    <ul class="ph-list">
                        @foreach(config('countries') as $key => $data)
                            <li>
                                <div class="ph-list-item" data-value="{{ $key }}">
                                    <img src="/assets/flag-{{ $key }}.svg" alt="{{ $key }}" class="flag">
                                    <span class="ph-country-name">@lang("general.lang.$key.country")</span>
                                    <span class="ph-country-code">(+{{ $data['mask'] }})</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <input id="a"
                       class="f-input ph-input"
                       data-phone-pattern=""
                       data-phone="{{ $attributes->get('phone') }}"
                       name="login"
                       x-model="login"
                       wire:model="login"
                       autocomplete="tel-national"
                       @if($attributes->has('disabled')) disabled @endif
                >
            </div>

            @error('login')
            <div class="error-msg">{{ $message }}</div>
            @enderror
            @error('email')
            <div class="error-msg">{{ $message }}</div>
            @enderror
            @error('phone')
            <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="switch-box active" x-show="show_email">
        <div class="f-block" style="{{ $attributes->get('margin-styles') }}">
            <div class="f-block-row">
                @if($attributes->has('hint'))
                    <label for="b" class="f-label" style="display: flex; align-items: center">
                        @lang('auth.your_email')
                        <div class="hint hint__inv-card">
                            <div class="hint__text" style="right: -200px;">
                                {{ $attributes->get('hint') }}
                            </div>
                            <img src="/assets/icon-question.svg" alt="more">
                        </div>
                    </label>
                @else
                    <label for="b" class="f-label">@lang('auth.your_email')</label>
                @endif
            </div>
            <input type="text"
                   id="b"
                   class="f-input"
                   name="login"
                   x-model="login"
                   wire:model="login"
                   placeholder="@lang('auth.enter_email')"
                   autocomplete="email"
                   @if($attributes->has('disabled')) disabled @endif
            >
            @error('login')
            <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
