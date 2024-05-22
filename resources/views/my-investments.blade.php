@section('title')
@lang('investments.title')
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css"
    integrity="sha512-rd0qOHVMOcez6pLWPVFIv7EfSdGKLt+eafXh4RO/12Fgr41hDQxfGvoi1Vy55QIVcQEujUE1LQrATCLl2Fs+ag=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<x-app-layout>

    <div class="account-table account-table-deposti">
        <div class="table table-default">
            <div class="table-scroll no-scrollbar">
                <table>
                    <thead>
                        <tr>
                            <td>
                                <a href="#" class="table__sort">
                                    <div class="table__sort-icon icon-mask"></div>
                                    <div class="table__sort-title">Дата</div>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="table__sort">
                                    <div class="table__sort-icon icon-mask"></div>
                                    <div class="table__sort-title">Начисления</div>
                                </a>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($history as $historyEntry)
                            <tr>
                                <td>{{ $historyEntry->get('created_at')->format('d.m.Y H:i') }}</td>
                                <td><span class="c-accent"  @if($historyEntry->get('is_negative')) style="color:#F11818" @endif>
                                {{ $historyEntry->get('is_negative') ? '-' : '+' }} {{ format_money($historyEntry->get('amount')) }} USDT</span></td>
                            </tr>                            
                        @empty
                            <tr>
                                <td>-</td>
                                <td><span class="c-accent">-</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <div class="table__wrapper">
        <div class="slider__btns account__btns">
            <button
                class="slider__btn slider__btn-white slider__btn-prev slider__btn-prev-accent js-invest-carousel-prev"></button>
            <button
                class="slider__btn slider__btn-white slider__btn-next slider__btn-next-accent js-invest-carousel-next"></button>
        </div>
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
    </div> -->
</x-app-layout>