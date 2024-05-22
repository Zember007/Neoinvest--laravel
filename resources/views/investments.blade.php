@section('title')
    @lang('investments.title')
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css" integrity="sha512-rd0qOHVMOcez6pLWPVFIv7EfSdGKLt+eafXh4RO/12Fgr41hDQxfGvoi1Vy55QIVcQEujUE1LQrATCLl2Fs+ag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<x-app-layout>


            @if($packets->count() > 0)
                <div class="inv">
                    <div class="inv-title">@lang('investments.your_packets')</div>
                    <div class="table-wrapper inv-table__wrapper">
                        <table class="table inv-table">
                            <thead>
                            <tr>
                                <th>@lang('investments.name')</th>
                                <th>@lang('investments.daily_percentage')</th>
                                <th>@lang('investments.dividendum')</th>
                                <th>@lang('investments.invested')</th>
                                <th>@lang('investments.valid_until')</th>
                                <th>@lang('investments.reinvestment')</th>
                                <th>@lang('investments.closing')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($packets as $packet)
                                @php
                                    $packetOption = $packetOptions->first(fn ($option) => $option->id === $packet->packet_option_id)
                                @endphp
                                <tr>
                                    <td>@lang('investments.packets.' . $packetOption->name)</td>
                                    <td>{{ $packetOption->percentage }}%</td>
                                    <td>{{ $packet->earned }} USDT</td>
                                    <td>{{ $packet->invested }} USDT</td>
                                    <td>{{ optional($packet->expires_at)->format('d.m.Y H:i') ?? trans('investments.unlimited') }}</td>
                                    <td>
                                        @if($packetOption->is_reinvestable)
                                            <x-modals.invest :packet-option="$packetOption" :is-reinvesting="true"
                                                             :packet="$packet">
                                                <button class="btn-modal table-btn _blue">
                                                    @lang('investments.reinvest')
                                                </button>
                                            </x-modals.invest>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @if($packetOption->is_refundable)
                                            <div class="btn-modal__wrapper">
                                                <button class="btn-modal table-btn _red">
                                                    @lang('investments.close')
                                                </button>
                                                <div class="modal__wrapper" data-modal="package_close_confirm">
                                                    <div class="modal confirm">
                                                        <div class="modal-close js-modal-close">
                                                            <img src="/assets/icon-modal-close.svg" alt="close">
                                                        </div>
                                                        <div class="modal__inner">
                                                            <div class="modal-title">@lang('investments.closing_notice')
                                                            </div>
                                                            @if($packetOption->is_refundable)
                                                                <div class="modal-desc _gray">
                                                                    @lang('investments.closing_refund_notice')
                                                                </div>
                                                            @endif
                                                            <form action="{{ route('investments.close') }}"
                                                                  method="POST"
                                                                  class="modal-btns">
                                                                @csrf
                                                                <input type="hidden" name="packet_id"
                                                                       value="{{ $packet->id }}">

                                                                <button type="button"
                                                                        class="btn btn__submit modal-btn btn_undo js-modal-close">
                                                                    @lang('general.no')
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn__submit modal-btn btn_do">
                                                                    @lang('general.yes')
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            —
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <div class="account-plans">
							<div class="products__container">
								<div class="products__top">
									<div class="products__top-title">
										<h2>Инвестируйте в самый выгодный продукт</h2>
									</div>
									<div class="products__top-descr">Линейка продуктов разработана так, что каждый
										инвестирует в самые перспективные продукты для&nbsp;максимальной отдачи от
										инвестиций </div>
								</div>
								<div class="swiper products__elements js-products-carousel">
									<div class="swiper-wrapper">
                                    @foreach($packetOptions as $packetOption) 
                     
                     
										<div class="swiper-slide" id="{{$packetOption->id}}">
											<div class="element-blur product products__elements-item">
												<img src="/img/new/elements/products/product-{{$packetOption->name}}.png" alt="alt"
													class="product__image" loading="lazy">
												<div class="product__title">{{$packetOption->name}}</div>
												<div class="product__row">
													<div class="product__row-title">срок</div>
													<div class="product__row-descr">{{$packetOption->duration_days}} дней</div>
												</div>
												<div class="product__row"> 
													<div class="product__row-title">Инвестиция</div>
													<div class="product__row-descr">@if(!$packetOption->max_invest)от {{$packetOption->min_invest}}$ @else {{$packetOption->min_invest}}$ - {{$packetOption->max_invest}}$ @endif</div>
												</div>
												<div class="product__row">
													<div class="product__row-title">Доходность</div>
													<div class="product__row-descr">{{$packetOption->percentage_min}}@if($packetOption->percentage_max) – {{$packetOption->percentage_max}}@endif% в сутки</div> 
												</div>
												<a href="#"
													class="btn btn-big btn-fill-blue product__btn">Инвестировать</a>                                                                                                    
											</div>
										</div>

                                        @endforeach										
									</div>
								</div>								
							</div>
						</div>
                         
                        <x-modals.invest :packet-options="$packetOptions">
                                </x-modals.invest>

               

    

    @if($errors->any())
        <div class="notif active _error">
            <img src="/assets/icon-notif-red.svg" alt="error" class="notif-icon">
            <div class="notif-text">@lang('general.error')</div>
        </div>
    @endif
</x-app-layout>
