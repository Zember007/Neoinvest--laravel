@php
    $items = [
        'profile',
        'finances',
        'investments',
        'my-investments',
        //'partners',
        'referral-system',
        'settings',
    ]
@endphp

<div class="col-xl-3">
    <div class="account__sidebar no-scrollbar">

        <ul>
            @foreach($items as $item)
                <li>
                    <a href="{{ route($item) }}" class="element-blur @if(request()->routeIs($item)) active @endif">
                        <div class="account__sidebar-icon account__sidebar-profile icon-mask"></div>
                        <div class="account__sidebar-title">@lang("$item.title")</div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>