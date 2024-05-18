<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('general.viewing') {{ $user->full_name }}</h1>
                </div>
                <div class="col-sm-6">
                    @can('admin_edit_user')
                        <a class="btn btn-info float-right ml-2"
                           href="{{ route('admin.users.edit', $user) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    @endcan
                    @can('admin_disguise_user')
                        <a href="{{ route('admin.users.disguise', $user) }}"
                           class="btn btn-info float-right"
                           onclick="event.preventDefault(); document.getElementById('disguise-{{ $user->id }}').submit();"
                        >
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                    @endcan
                    <form action="{{ route('admin.users.disguise', $user) }}"
                          method="POST"
                          id="disguise-{{ $user->id }}"
                    >
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@lang('users.general_info')</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-12">
                                    <ul style="list-style-type: none; padding: 0 !important; margin: 0 !important;">
                                        <li><b>@lang('users.name')</b>: {{ $user->full_name }}</li>
                                        <li><b>@lang('users.contacts')</b>: {{ $user->login }}</li>
                                        <li><b>@lang('users.country')</b>: @lang("general.lang.$user->country.country")
                                        </li>
                                        <li><b>@lang('users.language')</b>: {{ strtoupper($user->locale) }}
                                        </li>
                                        <li>
                                            <b>@lang('users.is_verified')</b>: @if($user->isVerified()) @lang('general.yes') @else @lang('general.no') @endif
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <ul style="list-style-type: none; padding: 0 !important; margin: 0 !important;">
                                        <li><b>@lang('general.balance')</b>: {{ $user->balance }} USDT</li>
                                        <li><b>@lang('general.daily_income')</b>: {{ $user->dailyIncome }} USDT</li>
                                        <li>
                                            <b>@lang('users.avatar')</b>:
                                            <a href="{{ $user->profile_photo_url }}"
                                               target="_blank">
                                                @lang('general.view')
                                            </a>
                                        </li> 
                                        <li>
                                            <b>@lang('users.register_ip_address')</b>: 
                                            {{ $user->register_ip_address ?? '—' }}
                                        </li>
                                        <li>
                                            <b>@lang('users.replenish_total')</b>:
                                            {{ format_money($replenishTotal) }} USDT
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <ul style="list-style-type: none; padding: 0 !important; margin: 0 !important;">
                                        <li>
                                            <b>@lang('users.withdraw_total')</b>:
                                            {{ format_money($withdrawTotal) }} USDT
                                        </li>
                                        <li>
                                            <b>@lang('users.income_total')</b>:
                                            {{ format_money($user->packet_incomes) }} USDT
                                        </li>
                                        <li>
                                            <b>@lang('users.invited_total')</b>:
                                            {{ $user->referrals()->count() }}
                                        </li>
                                        <li>
                                            <b>@lang('users.referral_bonuses_total')</b>:
                                            {{ format_money($user->referral_bonuses) }} USDT
                                        </li>
                                        <li>
                                            <b>@lang('users.mentor')</b>:
                                            @if(!is_null($user->referrer))
                                                <a href="{{ route('admin.users.show', $user->referrer) }}">
                                                    {{ $user->referrer->full_name }}
                                                </a>
                                            @else
                                                —
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <ul style="list-style-type: none; padding: 0 !important; margin: 0 !important;">
                                        <li>
                                            <b>@lang('users.level')</b>:
                                            @if($user->star->level === 9)
                                                @lang('partners.director')
                                            @else
                                                {{ $user->star->level }}
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@lang('users.packets')</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>@lang('investments.name')</th>
                                    <th>@lang('investments.daily_percentage')</th>
                                    <th>@lang('investments.dividendum')</th>
                                    <th>@lang('investments.invested')</th>
                                    <th>@lang('users.created_at')</th>
                                    <th>@lang('investments.valid_until')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->packets as $packet)
                                    @php
                                        $packetOption = $packetOptions->first(fn ($option) => $option->id === $packet->packet_option_id)
                                    @endphp
                                    <tr>
                                        <td>@lang('investments.packets.' . $packetOption->name)</td>
                                        <td>{{ $packetOption->percentage }}%</td>
                                        <td>{{ $packet->earned }} USDT</td>
                                        <td>{{ $packet->invested }} USDT</td>
                                        <td>{{ $packet->created_at->format('d.m.Y H:i')  }}</td>
                                        <td>{{ optional($packet->expires_at)->format('d.m.Y H:i') ?? trans('investments.unlimited') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@lang('users.partners_structure')</h3>
                        </div>
                        <div class="card-body">
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="lines" role="tablist">
                                        @for($line = 1; $line <= 9; $line++)
                                            <li class="nav-item">
                                                <a class="nav-link @if($line === 1) active @endif"
                                                   data-toggle="pill"
                                                   href="#line{{$line}}"
                                                   role="tab"
                                                   aria-controls="line{{$line}}"
                                                   aria-selected="true"
                                                >
                                                    {{ $line }} @lang('partners.line')
                                                </a>
                                            </li>
                                        @endfor
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               data-toggle="pill"
                                               href="#line_all"
                                               role="tab"
                                               aria-controls="line_all"
                                               aria-selected="true"
                                            >
                                                @lang('general.all')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="linesContent">
                                        @for($level = 1; $level <= 9; $level++)
                                            <div class="tab-pane fade @if($level === 1) show active @endif"
                                                 id="line{{$level}}"
                                                 role="tabpanel"
                                                 aria-labelledby="line{{$level}}"
                                            >
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>@lang('partners.name')</th>
                                                        <th>@lang('partners.contacts')</th>
                                                        <th>ID</th>
                                                        <th>@lang('partners.star')</th>
                                                        <th>@lang('partners.mentor')</th>
                                                        <th>@lang('partners.turnover')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($referrals->has($level))
                                                        @foreach($referrals->get($level) as $referral)
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ route('admin.users.show', $referral) }}">
                                                                        {{ $referral->full_name }}
                                                                    </a>
                                                                </td>
                                                                <td>{{ $referral->login }}</td>
                                                                <td>{{ $referral->id }}</td>
                                                                <td>{{ $referral->star->level }}</td>
                                                                <td>
                                                                    <a href="{{ route('admin.users.show', $referral->referrer) }}">
                                                                        {{ $referral->referrer->full_name }}
                                                                    </a>
                                                                </td>
                                                                <td>{{ format_money($referral->getReferralsPacketInvests()) }}
                                                                    USDT
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endfor
                                        <div class="tab-pane fade"
                                             id="line_all"
                                             role="tabpanel"
                                             aria-labelledby="line_all"
                                        >
                                            @livewire('admin.user.referrals', compact('user'))
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@lang('users.transactions')</h3>
                        </div>
                        <div class="card-body">
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="transactions" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active"
                                               data-toggle="pill"
                                               href="#replenish"
                                               role="tab"
                                               aria-controls="replenish"
                                               aria-selected="true"
                                            >
                                                @lang('finances.replenish')
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               data-toggle="pill"
                                               href="#withdraw"
                                               role="tab"
                                               aria-controls="withdraw"
                                               aria-selected="true"
                                            >
                                                @lang('finances.withdraw')
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               data-toggle="pill"
                                               href="#transfer"
                                               role="tab"
                                               aria-controls="transfer"
                                               aria-selected="true"
                                            >
                                                @lang('finances.transfer')
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               data-toggle="pill"
                                               href="#income"
                                               role="tab"
                                               aria-controls="income"
                                               aria-selected="true"
                                            >
                                                @lang('general.daily_income')
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               data-toggle="pill"
                                               href="#bonuses"
                                               role="tab"
                                               aria-controls="bonuses"
                                               aria-selected="true"
                                            >
                                                @lang('users.referral_bonuses')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="transactionsContent">
                                        <div class="tab-pane fade show active"
                                             id="replenish"
                                             role="tabpanel"
                                             aria-labelledby="replenish"
                                        >
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>@lang('users.action')</th>
                                                    <th>@lang('users.sum')</th>
                                                    <th>@lang('users.created_at')</th>
                                                    <th>@lang('replenishments.merchant_id')</th>
                                                    <th>@lang('users.status')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($transactions->where('type', 'replenish') as $transaction)
                                                    <tr>
                                                        <td>@lang('finances.replenishment')</td>
                                                        <td>{{ format_money($transaction->amount) }} USDT</td>
                                                        <td>{{ $transaction->created_at->format('d.m.Y H:i')  }}</td>
                                                        <td>{{ $transaction->merchant_id }}</td>
                                                        <td>@lang("finances.operation_$transaction->status")</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane fade"
                                             id="withdraw"
                                             role="tabpanel"
                                             aria-labelledby="withdraw"
                                        >
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>@lang('users.action')</th>
                                                    <th>@lang('users.sum')</th>
                                                    <th>@lang('withdrawals.destination')</th>
                                                    <th>@lang('users.created_at')</th>
                                                    <th>@lang('users.status')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($transactions->where('type', 'withdraw') as $transaction)
                                                    <tr>
                                                        <td>@lang('finances.withdrawal')</td>
                                                        <td>{{ format_money($transaction->amount) }} USDT</td>
                                                        <td>{{ $transaction->payload['withdraw_to'] }}</td>
                                                        <td>{{ $transaction->created_at->format('d.m.Y H:i')  }}</td>
                                                        <td>@lang("finances.operation_$transaction->status")</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane fade"
                                             id="transfer"
                                             role="tabpanel"
                                             aria-labelledby="transfer"
                                        >
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>@lang('users.action')</th>
                                                    <th>@lang('users.sum')</th>
                                                    <th>@lang('users.created_at')</th>
                                                    <th>@lang('users.linked_user')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($transactions->where('type', 'transfer') as $transaction)
                                                    <tr>
                                                        <td>
                                                            @if(array_key_exists('receiver_id', $transaction->payload))
                                                                @lang('finances.withdrawal')
                                                            @else
                                                                @lang('finances.replenishment')
                                                            @endif
                                                        </td>
                                                        <td>{{ format_money($transaction->amount) }} USDT</td>
                                                        <td>{{ $transaction->created_at->format('d.m.Y H:i')  }}</td>
                                                        <td>
                                                            @if(array_key_exists('receiver_id', $transaction->payload))
                                                                @php
                                                                    $receiver = $transferUsers->first(fn ($u) => $u->id === (int)$transaction->payload['receiver_id'])
                                                                @endphp
                                                                <a href="{{ route('admin.users.show', $transaction->payload['receiver_id']) }}">
                                                                    {{ $receiver->full_name }}
                                                                </a>
                                                            @else
                                                                @php
                                                                    $sender = $transferUsers->first(fn ($u) => $u->id === (int)$transaction->payload['sender_id'])
                                                                @endphp
                                                                <a href="{{ route('admin.users.show', $transaction->payload['sender_id']) }}">
                                                                    {{ $sender->full_name }}
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane fade"
                                             id="income"
                                             role="tabpanel"
                                             aria-labelledby="income"
                                        >
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>@lang('users.packet')</th>
                                                    <th>@lang('users.sum')</th>
                                                    <th>@lang('users.created_at')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($packetIncomeTransactions as $transaction)
                                                    @php
                                                        $packet = $packets->first(fn ($p) => $p->id === $transaction->packet_id);
                                                        $packetOption = $packetOptions->first(fn ($option) => $option->id === $packet->packet_option_id)
                                                    @endphp
                                                    <tr>
                                                        <td>@lang('investments.packets.' . $packetOption->name)</td>
                                                        <td>{{ format_money($transaction->amount) }} USDT</td>
                                                        <td>{{ $transaction->created_at->format('d.m.Y H:i')  }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane fade"
                                             id="bonuses"
                                             role="tabpanel"
                                             aria-labelledby="bonuses"
                                        >
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <td>@lang('users.source')</td>
                                                    <th>@lang('users.sum')</th>
                                                    <th>@lang('users.created_at')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($bonuses as $bonus)
                                                    <tr>
                                                        <td>{{ $bonus->get('referred_name') }}</td>
                                                        <td>{{ format_money($bonus->get('amount')) }} USDT</td>
                                                        <td>{{ $bonus->get('created_at')->format('d.m.Y H:i') }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@lang('users.logs')</h3>
                        </div>
                        <div class="card-body">
                            @livewire('admin.user.logs', ['user' => $user])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
