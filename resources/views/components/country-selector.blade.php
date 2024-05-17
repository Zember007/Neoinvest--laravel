@php
    $country = auth()->user()->country ?? 'ru'
@endphp

<div {{ $attributes->merge(['class' => 'f-block']) }}>
    <div class="f-block-row">
        <label for="surname" class="f-label">Ваша страна</label>
    </div>
    <div class="f-input f-select dd select">
        <input type="hidden" class="dd-input" value="{{ $country }}" name="country">
        <div class="f-select-item selected">
            <img src="/assets/flag-{{ $country }}.svg" alt="{{ $country }}" class="lang-flag">
            <div class="lang-label">@lang('general.lang.'.$country.'.country')</div>
        </div>
        <ul class="f-select-list dd-list">
            @foreach(array_keys(config('countries')) as $code)
                <li>
                    <div class="f-select-item dd-item" data-value="{{ $code }}">
                        <img src="/assets/flag-{{ $code }}.svg" alt="{{ $code }}" class="lang-flag">
                        <div class="lang-label">@lang("general.lang.$code.country")</div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    @error('country')
    <div class="error-msg">{{ $message }}</div>
    @enderror
</div>