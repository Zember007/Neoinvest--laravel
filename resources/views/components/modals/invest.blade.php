<div class="invest-items">    
        @foreach($packetOptions as $packetOption) 
            <div class="invest-items__items-item invest-item" id="{{$packetOption->id}}">
            @if($userBalance >= $packetOption->min_invest)
                <h2 class="invest-item__title c-blue">
                    {{$packetOption->name}}
                </h2>
                <form action="{{route('investments.invest')}}" class="invest-item__inner" method="POST" id="{{ $formId }}">
                    <label class="input withdraw__item">
                        <span class="input__title">Сума инвестиций</span>
                        <span class="input__field-currency">
                            <input type="hidden" name="packet_option_id" value="{{ $packetOption->id }}">
                            <input name="amount" type="text" name="withdraw_summ" id="summStarter"
                                class="input__field input__big element-blur input__field-blue" placeholder="100"
                                oninput="Starter()">
                            <span class="input__info c-text-lt">USDT</span>
                        </span>
                    </label>
                    <label class="input withdraw__item">
                        <span class="input__title">Доход в день</span>
                        <span class="input__field-currency">
                            <input type="text" name="withdraw_summ" disabled id="rangeStarter"
                                class="input__field input__big element-blur input__field-blue"
                                placeholder="{{$packetOption->percentage_min}}@if($packetOption->percentage_max) – {{$packetOption->percentage_max}}@endif%">
                            <span class="input__info c-text-lt">USDT</span>
                        </span>
                    </label>
                </form>

                <div class="invest-item__min">
                    <span>
                        Мин. сумма
                    </span>
                    <span>
                        {{$packetOption->min_invest}} USDT
                    </span>
                </div>
                <p class="invest-item__text">
                    Инвестиция в программе Starter на 100 дней и нельзя досрочно разорвать!
                </p>
                <button type="submit" class="invest-item__btn btn btn-strong btn-fill-blue-accent withdraw__submit"
                    onclick="event.preventDefault();document.getElementById('{{ $formId }}').submit();">
                    Инвестировать 
                </button>
                @else 
                    <div class="modal-desc _dark">@lang('investments.insufficient_money')</div>
                    <a href="{{ route('finances') }}" class="btn btn-big btn-fill-blue product__btn"> 
                        @lang('finances.replenish_wallet')
                    </a>
                @endif
            </div>
        @endforeach
    
</div>


