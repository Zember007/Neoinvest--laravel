@section('title')
@lang('profile.title')
@endsection

<x-app-layout>
    <div class="account__wrap">
        <div class="account-info">
            @livewire('sidebar-profile-picture')            
            <div class="account-info__content">
                <div class="account-info__name">{{auth()->user()->login}}</div> 
                <div class="account-info__email">{{auth()->user()->email}}</div>
                <div class="account-info__days">240 дней на платформе</div>
                <div class="account-info__stats">    
                    <div class="account-info__stat">
                        <div class="account-info__stat-title">Приглашено:</div>
                        <div class="account-info__stat-more">{{ auth()->user()->referrals()->count() }}</div>
                    </div>
                    <div class="account-info__stat">
                        <div class="account-info__stat-title">Активных депозитов:</div>
                        <div class="account-info__stat-more"></div>
                    </div>
                </div>
                <a href="#" class="account-info__edit"></a>
            </div>
        </div>
        <div class="account-wallet">
            <div class="account-balance">
                <div class="account-inner">
                    <p class="balance__title">
                        Баланс
                    </p>
                    <span class="balance">
                        {{format_money($userBalance)}}
                    </span>

                    <span class="balance__currency">
                        USDT
                    </span>
                </div>
                <img class="balance__wallet-img" src="/img/new/icons/account/icon-wallet.svg" alt="wallet">
            </div>
            <div class="account-link">
                <p class="account-link__title">Сеть - TRX <span>Tron (TEC 20)</span></p>
                <span class="input__field-currency">
                    <input type="text" name="user_ref" value="TQy5gdBEavPn7Bs4DZQXtrvr4ZzAKPv5yg"
                        class="input__field input__big element-blur input__field-blue js-input-copy-field" readonly> 
                    <span class="input__control-copy js-input-copy-control icon-mask"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="account-table">
        <div class="account-table__title">Последние транзакции</div>

        <div class="table table-default">
            <div class="table-scroll no-scrollbar">
                @if (count($transactions))
                <table>
                    <thead>
                        <tr>
                            <td>
                                <a href="#" class="table__sort">
                                    <img src="/img/new/icons/icon-sort-accent.svg" class="table__sort-icon icon-mask">
                                    <div class="table__sort-title">Операция</div>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="table__sort">
                                    <img src="/img/new/icons/icon-sort-accent.svg" class="table__sort-icon icon-mask">
                                    <div class="table__sort-title">Сумма</div>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="table__sort">
                                    <img src="/img/new/icons/icon-sort-accent.svg" class="table__sort-icon icon-mask">
                                    <div class="table__sort-title">Валюта</div>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="table__sort">
                                    <img src="/img/new/icons/icon-sort-accent.svg" class="table__sort-icon icon-mask">
                                    <div class="table__sort-title">Дата</div>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="table__sort">
                                    <img src="/img/new/icons/icon-sort-accent.svg" class="table__sort-icon icon-mask">
                                    <div class="table__sort-title">Статус</div>
                                </a>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                    <tr>                        
                            <td>
                                <div class="link">
                                    @if ($transaction->type == 'replenish')
                                    <img src="/img/new/icons/actions/icon-up-blue.svg" alt="alt" class="link__icon">
                                    <div class="link__title">
                                        Пополнение
                                    </div>
                                    @endif
                                    @if ($transaction->type == 'withdraw_fee')
                                    <img src="/img/new/icons/actions/icon-down-red.svg" alt="alt" class="link__icon">
                                    <div class="link__title">
                                        Комиссия
                                    </div>
                                    @endif                                    
                                    @if ($transaction->type == 'withdraw')
                                    <img src="/img/new/icons/actions/icon-down-red.svg" alt="alt" class="link__icon">
                                    <div class="link__title">
                                        Вывод средств
                                    </div>
                                    @endif
                                    @if ($transaction->type == 'transfer')
                                    <img src="/img/new/icons/actions/icon-up-blue.svg" alt="alt" class="link__icon">
                                    <div class="link__title">
                                        Внутренний перевод
                                    </div>
                                    @endif
                                    @if ($transaction->type == 'star_bonus')
                                    <img src="/img/new/icons/actions/icon-partners-brown.svg" alt="alt" class="link__icon">
                                    <div class="link__title">
                                        Партнерская
                                    </div>
                                    @endif
                                    
                                </div>
                            </td>
                            <td>{{format_money($transaction->amount)}}</td>
                            <td>USDT</td>
                            <td>
                                <span class="c-text-lt">{{ $transaction->created_at->format('d.m.Y H:i')  }}</span>
                            </td>
                            <td>
                                @if ($transaction->status == 'success')
                                <span class="c-accent"><strong>
                                    Готово
                                </strong></span>
                                @endif
                                @if ($transaction->status == 'created')
                                <span class="c-blue"><strong>
                                    В обработке
                                </strong></span>
                                @endif
                                @if ($transaction->status == 'failed')
                                <span class="c-text-lt"><strong>
                                    Отклонено
                                </strong></span>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                @else
                -
                @endif
                
            </div>
        </div>

    </div>
    <!-- <div class="slider__btns account__btns">
        <button
            class="slider__btn slider__btn-white slider__btn-prev slider__btn-prev-accent js-invest-carousel-prev"></button>
        <button
            class="slider__btn slider__btn-white slider__btn-next slider__btn-next-accent js-invest-carousel-next"></button>
        <div class="pagination">
            <a class="table-pagination__list-item active" href="#">1</a>
            <a class="table-pagination__list-item" href="#">2</a>
            <a class="table-pagination__list-item" href="#">3</a>
            <a class="table-pagination__list-item" href="#">...</a>
            <a class="table-pagination__list-item" href="#">10</a>
        </div>
    </div> -->    
</x-app-layout>