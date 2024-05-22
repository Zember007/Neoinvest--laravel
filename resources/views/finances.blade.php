@section('title')
@lang('finances.title')
@endsection

<x-app-layout>
    <div class="account-withdraw">
        <form action="{{ route('finances.store') }}" method="POST" class="withdraw">
            @csrf
            <input type="hidden" name="type" value="withdraw">
            <div class="withdraw__row">
                <div class="input select js-list-item js-select withdraw__item">
                    <div class="input__title">Выберите валюту</div>
                    <div
                        class="select__field input__field input__big element-blur input__field-blue js-list-item-control">
                        <div class="select__value select__value-big js-select-value">
                            <img src="/img/new/icons/icon-litecoin.svg" alt="ETH">Litecoin
                        </div>
                    </div>
                    <div class="select__variants element-blur js-list-item-content">
                        <div class="select-variant select-variant-big js-select-variant active" data-value="1">
                            <img src="/img/new/icons/icon-litecoin.svg" alt="LTC">Litecoin
                        </div>
                        <div class="select-variant select-variant-big js-select-variant" data-value="2">
                            <img src="/img/new/icons/icon-litecoin.svg" alt="ETH">Ethereum
                        </div>
                    </div>
                    <input type="text" name="withdraw_currency" value="1" hidden
                        class="select__field js-select-field" />
                    @error('method')
                        <div class="error-msg">{{ $message }}</div>
                    @enderror
                </div>
                <label class="input withdraw__item">
                    <span class="input__title">Доступный баланс</span>
                    <span class="input__field-currency">
                        <input type="text" name="withdraw_balance"
                            class="input__field input__big element-blur input__field-blue" disabled value="{{ format_money($userBalance) }}">
                        <span class="input__info c-text-lt">USDT</span>
                    </span>
                </label>
                <label class="input withdraw__item">
                    <span class="input__title">Сумма вывода</span>
                    <span class="input__field-currency">
                        <input type="text" class="input__field input__big element-blur input__field-blue"
                            placeholder="00.0000000" name="amount">
                        @error('amount')
                            <div class="error-msg">{{ $message }}</div>
                        @enderror
                        <span class="input__info c-text-lt">USDT</span>
                    </span>
                    <span class="input__more">
                        <span class="input__more-info c-text-lt">Мин. сумма вывода</span>
                        <span class="fw-sb input__more-value c-accent">100 USDT</span>
                    </span>
                </label>
            </div>
            <div class="withdraw__wallet withdraw-wallet">
                <div class="withdraw-wallet__inner">
                    <label class="input withdraw-wallet__label">
                        <span class="input__title">Введите адрес кошелька для вывода </span>
                        <input class="withdraw-wallet__input input__field input__big element-blur input__field-blue"
                            name="withdraw_to" type="text">
                        @error('withdraw_to')
                            <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </label>
                    <button type="submit"
                        class="withdraw-wallet__btn withdraw__item btn btn-strong btn-fill-blue-accent withdraw__submit">
                        Оформить вывод
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>