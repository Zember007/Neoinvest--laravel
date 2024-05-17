<div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>@lang('users.action')</th>
            <th>@lang('users.data')</th>
            <th>@lang('users.ip_address')</th>
            <th>@lang('users.created_at')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <td>{{ $log->actionName }}</td>
                <td>
                    <ul>
                        @if($log->payload->has('old_balance') && $log->payload->has('new_balance'))
                            <li>
                                @lang('users.old_balance'):
                                {{ format_money($log->payload->get('old_balance')) }} USDT
                            </li>
                            <li>
                                @lang('users.new_balance'):
                                {{ format_money($log->payload->get('new_balance')) }} USDT
                            </li>
                            <li>
                                @lang('users.sum'):
                                {{ format_money(abs($log->payload->get('new_balance') - $log->payload->get('old_balance'))) }}
                                USDT
                            </li>
                        @endif
                        @if($log->payload->has('transaction_id'))
                            @php
                                $transaction = $transactions->first(fn ($t) => $t->id === $log->payload->get('transaction_id'))
                            @endphp
                            <li>
                                @lang('users.transaction_id'):
                                {{ $log->payload->get('transaction_id') }}
                            </li>
                            @if($transaction->type === \App\Models\Transaction::TYPE_TRANSFER)
                                @if(array_key_exists('receiver_id', $transaction->payload))
                                    @php
                                        $transferUser = $transferUsers->first(fn ($u) => $u->id === (int)$transaction->payload['receiver_id'])
                                    @endphp
                                    <li>
                                        @lang('users.receiver'):
                                        <a href="{{ route('admin.users.show', $transaction->payload['receiver_id']) }}">
                                            {{ $transferUser->full_name_short }}
                                        </a>
                                    </li>
                                @endif
                                @if(array_key_exists('sender_id', $transaction->payload))
                                    @php
                                        $transferUser = $transferUsers->first(fn ($u) => $u->id === (int)$transaction->payload['sender_id'])
                                    @endphp
                                    <li>
                                        @lang('users.sender'):
                                        <a href="{{ route('admin.users.show', $transaction->payload['sender_id']) }}">
                                            {{ $transferUser->full_name_short }}
                                        </a>
                                    </li>
                                @endif
                            @endif
                        @endif
                        @if($log->payload->has('packet_option_id'))
                            @php
                                $packetOption = $packetOptions->first(fn ($option) => $option->id === $log->payload->get('packet_option_id'))
                            @endphp
                            <li>
                                @lang('users.packet'):
                                @lang('investments.packets.' . $packetOption->name)
                            </li>
                        @endif
                        @if($log->payload->has('sum'))
                            <li>
                                @lang('users.sum'):
                                {{ format_money($log->payload->get('sum')) }} USDT
                            </li>
                        @endif
                        @if($log->payload->has('admin_id'))
                            @php
                                $admin = $admins->first(fn ($u) => $u->id === $log->payload->get('admin_id'))
                            @endphp
                            <li>
                                @lang('users.admin'):
                                <a href="{{ route('admin.users.show', $log->payload->get('admin_id')) }}"
                                   target="_blank"
                                    >
                                        {{ $admin->full_name }}
                                    </a>
                                </li>
                            @endif
                    </ul>
                </td>
                <td>{{ $log->ip_address }}</td>
                <td>{{ $log->created_at->format('d.m.Y H:i')  }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <button wire:click="loadMore" class="btn btn-primary" wire:loading.attr="disabled">
            @lang('general.load_more')
        </button>
    </div>
</div>
