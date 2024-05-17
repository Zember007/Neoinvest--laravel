<form action="{{ route('switch-language') }}" method="POST" class="lang dd select">
    @csrf

    <input type="hidden" class="dd-input" value="ru" name="locale">
    <div class="lang-item selected _dark-gray">
        <img src="/assets/flag-{{ app()->getLocale() }}.svg" alt="{{ app()->getLocale() }}" class="lang-flag">
        <div class="lang-label">{{ strtoupper(app()->getLocale()) }}</div>
    </div>
    <ul class="lang-list dd-list">
        @foreach(array_keys(config('countries')) as $code)
            @if(!in_array($code, config('interface.locales')))
                @continue
            @endif
            <li>
                <button type="submit" class="lang-item dd-item _dark-gray" data-value="{{ $code }}">
                    <img src="/assets/flag-{{ $code }}.svg" alt="{{ $code }}" class="lang-flag">
                    <div class="lang-label">{{ strtoupper($code) }}</div>
                </button>
            </li>
        @endforeach
    </ul>
</form>