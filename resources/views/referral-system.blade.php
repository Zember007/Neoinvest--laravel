@section('title')
@lang('referral-system.title')
@endsection

<x-app-layout>
    <div class="referals">
        <div class="referals__stats">
            <div class="referals__stat element-blur">
                <div class="referals__stat-title">Приглашено рефералов</div>
                <div class="referals__stat-info">
                    <img src="/img/new/icons/icon-invite-round-accent.svg" alt="alt" class="referals__stat-icon">
                    <div class="referals__stat-more">{{auth()->user()->referrals()->count()}}</div>
                </div>
            </div>
            <div class="referals__stat element-blur">
                <div class="referals__stat-title">Реферальные активы</div>
                <div class="referals__stat-info">
                    <img src="/img/new/icons/icon-actives-round-accent.svg" alt="alt" class="referals__stat-icon">
                    <div class="referals__stat-more">$ {{auth()->user()->referral_bonuses}}</div>
                </div>
            </div>
            <div class="referals__stat accent">
                <div class="referals__stat-title">Реферальная комиссия</div>
                <div class="referals__stat-info">
                    <img src="/img/new/icons/icon-comission-round-white.svg" alt="alt" class="referals__stat-icon">
                    <div class="referals__stat-more">{{$stars[0]->referral_bonus_percentage[0]}}%</div>
                </div>
            </div>
        </div>
        <div class="referals__link">
            <label class="input referals__link-field js-input-copy">
                <span class="input__title">Ссылка на мою реферальную программу</span>
                <span class="input__field-currency"> 
                    <input type="text" name="user_ref" value="{{ route('ref', auth()->id()) }}"
                        class="input__field input__big element-blur input__field-blue js-input-copy-field" readonly>
                    <span class="input__control-copy js-input-copy-control icon-mask"></span>
                </span>
            </label>
            <a href="{{ route('ig-story') }}" target="_blank" class="btn btn-strong btn-fill-blue-accent referals__link-btn">Выслать приглашение</a>
        </div>
        <div class="referals__table">
            <div class="referals__table-title c-text-lt">Мои рефералы</div>            
            <div class="table table-default">
                <div class="table-scroll no-scrollbar">
                @if (auth()->user()->referrals()->count())  
                    <table>
                        <thead>
                            <tr>
                                <td>
                                    <a href="#" class="table__sort">
                                        <div class="table__sort-icon icon-mask"></div>
                                        <div class="table__sort-title">Логин</div>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="table__sort">
                                        <div class="table__sort-icon icon-mask"></div>
                                        <div class="table__sort-title">Дата регистрации</div>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="table__sort">
                                        <div class="table__sort-icon icon-mask"></div>
                                        <div class="table__sort-title">Электронная почта</div>
                                    </a>
                                </td>
                                <!-- <td>
                                    <a href="#" class="table__sort">
                                        <div class="table__sort-icon icon-mask"></div>
                                        <div class="table__sort-title">Сума ввода/Прибыль</div>
                                    </a>
                                </td> -->
                            </tr>
                        </thead>
                        <tbody>
                                                                                  
                            @foreach ($referrals as $referral)
                            <tr>
                                <td>{{$referral->login}}</td>
                                <td>
                                    <span class="c-text-lt">{{$referral->created_at}}</span>
                                </td>
                                <td>
                                    <span class="c-text-lt">{{$referral->email}}</span>
                                </td>
                                <!-- <td><span class="c-blue"> USDT</span></td> -->
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
        <!-- <div class="table__wrapper table__wrapper--right">
            <div class="table__pagination table-pagination">
                <ul class="table-pagination__list">
                    <li class="table-pagination__list-item">
                        <a class="table-pagination__list-link table-pagination__list-link--active" href="#">
                            1
                        </a>
                    </li>
                    <li class="table-pagination__list-item">
                        <a class="table-pagination__list-link" href="#">
                            2
                        </a>
                    </li>
                    <li class="table-pagination__list-item">
                        <a class="table-pagination__list-link" href="#">
                            3
                        </a>
                    </li>
                    <li class="table-pagination__list-item">
                        <span>
                            ...
                        </span>
                    </li>
                    <li class="table-pagination__list-item">
                        <a class="table-pagination__list-link" href="#">
                            10
                        </a>
                    </li>
                </ul>
            </div>
            <div class="slider__btns account__btns">
                <button
                    class="slider__btn slider__btn-white slider__btn-prev slider__btn-prev-accent js-invest-carousel-prev"></button>
                <button
                    class="slider__btn slider__btn-white slider__btn-next slider__btn-next-accent js-invest-carousel-next"></button>
            </div>
        </div> -->
    </div>

    
</x-app-layout>