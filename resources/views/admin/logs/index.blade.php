<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('logs.title')</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.logs.search') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>@lang('users.admin')</label>
                            <input type="text" class="form-control" name="user" value="{{ request('user') }}">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label>@lang('users.action')</label>
                            <select class="form-control" name="action">
                                <option value="null" @if(request('action') === 'null') selected @endif>
                                    @lang('general.all')
                                </option>
                                <option value="{{ \App\Models\Log::ADMIN_CHANGE_BALANCE }}"
                                        @if((int)request('action') === \App\Models\Log::ADMIN_CHANGE_BALANCE) selected @endif
                                >
                                    @lang('users.manual_change_balance')
                                </option>
                                <option value="{{ \App\Models\Log::ADMIN_BAN_USER }}"
                                        @if((int)request('action') === \App\Models\Log::ADMIN_BAN_USER) selected @endif
                                >
                                    @lang('logs.ban_user')
                                </option>
                                <option value="{{ \App\Models\Log::ADMIN_UNBAN_USER }}"
                                        @if((int)request('action') === \App\Models\Log::ADMIN_UNBAN_USER) selected @endif
                                >
                                    @lang('logs.unban_user')
                                </option>
                                <option value="{{ \App\Models\Log::ADMIN_UPDATE_PACKET }}"
                                        @if((int)request('action') === \App\Models\Log::ADMIN_UPDATE_PACKET) selected @endif
                                >
                                    @lang('logs.update_packet')
                                </option>
                                <option value="{{ \App\Models\Log::ADMIN_UPDATE_USER }}"
                                        @if((int)request('action') === \App\Models\Log::ADMIN_UPDATE_USER) selected @endif
                                >
                                    @lang('logs.update_user')
                                </option>
                                <option value="{{ \App\Models\Log::ADMIN_UPDATE_STAR }}"
                                        @if((int)request('action') === \App\Models\Log::ADMIN_UPDATE_STAR) selected @endif
                                >
                                    @lang('logs.update_star')
                                </option>
                                <option value="{{ \App\Models\Log::ADMIN_ALLOW_WITHDRAWAL }}"
                                        @if((int)request('action') === \App\Models\Log::ADMIN_ALLOW_WITHDRAWAL) selected @endif
                                >
                                    @lang('logs.allow_withdrawal')
                                </option>
                                <option value="{{ \App\Models\Log::ADMIN_DENY_WITHDRAWAL }}"
                                        @if((int)request('action') === \App\Models\Log::ADMIN_DENY_WITHDRAWAL) selected @endif
                                >
                                    @lang('logs.deny_withdrawal')
                                </option>
                                <option value="{{ \App\Models\Log::ADMIN_DEBUG_REPLENISH }}"
                                        @if((int)request('action') === \App\Models\Log::ADMIN_DEBUG_REPLENISH) selected @endif
                                >
                                    @lang('logs.debug_replenish')
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-4 d-flex align-items-center">
                        <button class="btn btn-info mt-3">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                <tr>
                                    <th>@lang('users.action')</th>
                                    <th>@lang('users.data')</th>
                                    <th>@lang('users.admin')</th>
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
                                                @if($log->payload->has('is_update'))
                                                    @if($log->payload->has('user_before') && $log->payload->has('user_after'))
                                                        @foreach(['before', 'after'] as $state)
                                                            @php
                                                                $payload = collect($log->payload->get("user_$state"))
                                                            @endphp
                                                            <li>
                                                                @lang("logs.$state"):
                                                                <ul>
                                                                    @if($payload->has('first_name'))
                                                                        <li>
                                                                            @lang('users.first_name'):
                                                                            {{ $payload->get('first_name') }}
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('last_name'))
                                                                        <li>
                                                                            @lang('users.last_name'):
                                                                            {{ $payload->get('last_name') }}
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('country'))
                                                                        <li>
                                                                            @lang('users.country'):
                                                                            @lang("general.lang.{$payload->get('country')}.country")
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('role'))
                                                                        <li>
                                                                            @lang('users.role'):
                                                                            {{ $payload->get('role') }}
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('is_verified'))
                                                                        <li>
                                                                            @lang('users.is_verified'):
                                                                            {{ $payload->get('is_verified') ? trans('general.yes') : trans('general.no') }}
                                                                        </li>
                                                                    @endif
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    @endif

                                                    @if($log->payload->has('packet_before') && $log->payload->has('packet_after'))
                                                        @foreach(['before', 'after'] as $state)
                                                            @php
                                                                $payload = collect($log->payload->get("packet_$state"))
                                                            @endphp
                                                            <li>
                                                                @lang("logs.$state"):
                                                                <ul>
                                                                    @if($payload->has('percentage'))
                                                                        <li>
                                                                            @lang('investments.daily_percentage'):
                                                                            {{ $payload->get('percentage') }}
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('min_invest'))
                                                                        <li>
                                                                            @lang('investments.min_investment_sum'):
                                                                            {{ $payload->get('min_invest') }}
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('min_reinvest'))
                                                                        <li>
                                                                            @lang('investments.min_reinvestment_sum'):
                                                                            {{ $payload->get('min_reinvest') }}
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('duration_days'))
                                                                        <li>
                                                                            @lang('investments.expiration_date'):
                                                                            {{ $payload->get('duration_days') }}
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('status'))
                                                                        <li>
                                                                            @lang('investments.status'):
                                                                            @if($payload->get('status') === \App\Models\PacketOption::STATUS_ACTIVE)
                                                                                @lang('investments.statuses.active')
                                                                            @endif
                                                                            @if($payload->get('status') === \App\Models\PacketOption::STATUS_HIDDEN)
                                                                                @lang('investments.statuses.hidden')
                                                                            @endif
                                                                            @if($payload->get('status') === \App\Models\PacketOption::STATUS_DISABLED)
                                                                                @lang('investments.statuses.disabled')
                                                                            @endif
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('is_refundable'))
                                                                        <li>
                                                                            @lang('investments.is_refundable'):
                                                                            {{ $payload->get('is_refundable') ? trans('general.yes') : trans('general.no') }}
                                                                        </li>
                                                                    @endif
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    @endif

                                                    @if($log->payload->has('star_before') && $log->payload->has('star_after'))
                                                        @foreach(['before', 'after'] as $state)
                                                            @php
                                                                $payload = collect($log->payload->get("star_$state"))
                                                            @endphp
                                                            <li>
                                                                @lang("logs.$state"):
                                                                <ul>
                                                                    @if($payload->has('min_turnover'))
                                                                        <li>
                                                                            @lang('referral-system.turnover'):
                                                                            {{ $payload->get('min_turnover') }}
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('min_turnover_fl'))
                                                                        <li>
                                                                            @lang('referral-system.turnover_fl'):
                                                                            {{ $payload->get('min_turnover_fl') }}
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('bonus'))
                                                                        <li>
                                                                            @lang('referral-system.bonus'):
                                                                            {{ $payload->get('bonus') }}
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('monthly_turnover_bonus_percentage'))
                                                                        <li>
                                                                            @lang('referral-system.monthly_turnover_bonus_percentage')
                                                                            :
                                                                            {{ $payload->get('monthly_turnover_bonus_percentage') }}
                                                                        </li>
                                                                    @endif
                                                                    @if($payload->has('referral_bonus_percentage'))
                                                                        <li>
                                                                            @lang('referral-system.referral_bonus'):
                                                                            <ul>
                                                                                @foreach($payload->get('referral_bonus_percentage') as $line => $amount)
                                                                                    <li>
                                                                                        {{ $line }} @lang('referral-system.line')
                                                                                        :
                                                                                        {{ $amount }}
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </li>
                                                                        @endif
                                                                </ul>
                                                            </li>
                                                            @endforeach
                                                        @endif

                                                @endif
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
                                                    <li>
                                                        @lang('users.transaction_id'):
                                                        {{ $log->payload->get('transaction_id') }}
                                                    </li>
                                                @endif
                                                @if($log->payload->has('user_id'))
                                                    @php
                                                        $user = $users->first(fn ($u) => $u->id === $log->payload->get('user_id'))
                                                    @endphp
                                                    <li>
                                                        @lang('users.user_singular'):
                                                        <a href="{{ route('admin.users.show', $log->payload->get('user_id')) }}"
                                                           target="_blank"
                                                        >
                                                            {{ $user->full_name }}
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($log->payload->has('packet_id'))
                                                    @php
                                                        $packet = $packets->first(fn ($p) => $p->id === (int)$log->payload->get('packet_id'))
                                                    @endphp
                                                    <li>
                                                        @lang('logs.packet'):
                                                        @lang('investments.packets.' . $packet->name)
                                                    </li>
                                                @endif
                                                @if($log->payload->has('star'))
                                                    <li>
                                                        @lang('logs.star'):
                                                        {{ $log->payload->get('star') }}
                                                    </li>
                                                @endif
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.users.show', $log->user) }}" target="_blank">
                                                {{ $log->user->full_name }}
                                            </a>
                                        </td>
                                        <td>{{ $log->ip_address }}</td>
                                        <td>{{ $log->created_at->format('d.m.Y H:i')  }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $logs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function () {
                $.fn.dataTable.moment('DD.MM.YYYY HH:mm');
                $('#dataTable').DataTable({
                    paging: false,
                    info: false,
                    searching: false,
                    order: [],
                    responsive: true,
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/{{ app()->getLocale() }}.json'
                    }
                })
            })
        </script>
    @endpush
</x-admin-layout>
