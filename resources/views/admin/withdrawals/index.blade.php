<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('withdrawals.title')</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.withdrawals.search') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>@lang('general.user')</label>
                            <input type="text" class="form-control" name="user" value="{{ request('user') }}">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>@lang('users.sum')</label>
                            <input type="number" class="form-control" name="sum" value="{{ request('sum') }}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>@lang('withdrawals.destination')</label>
                            <input type="text" class="form-control" name="destination"
                                   value="{{ request('destination') }}">
                        </div>
                    </div>
                    {{--                    <div class="col-3">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>@lang('users.created_at')</label>--}}
                    {{--                            <div class="input-group">--}}
                    {{--                                <div class="input-group-prepend">--}}
                    {{--                                    <span class="input-group-text">--}}
                    {{--                                        <i class="far fa-calendar-alt"></i>--}}
                    {{--                                    </span>--}}
                    {{--                                </div>--}}
                    {{--                                <input type="text" class="form-control float-right" name="created_at" value="{{ request('created_at') }}" id="dateTimePicker">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="col-1 d-flex align-items-center">
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
                                    <th style="width: 10px">#</th>
                                    <th>@lang('general.user')</th>
                                    <th>@lang('users.sum')</th>
                                    <th>@lang('withdrawals.destination')</th>
                                    <th>@lang('users.status')</th>
                                    <th>@lang('users.created_at')</th>
                                    <th style="width: 100px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.show', $transaction->user) }}">
                                                {{ $transaction->user->full_name }}
                                            </a>
                                        </td>
                                        <td>{{ format_money($transaction->amount) }} USDT</td>
                                        <td>{{ $transaction->payload['withdraw_to'] }}</td>
                                        <td>@lang("finances.operation_$transaction->status")</td>
                                        <td>{{ $transaction->created_at->format('d.m.Y H:i')  }}</td>
                                        @if($transaction->status === 'pending')
                                            <td>
                                                @can('admin_allow_withdraw')
                                                    <a href="{{ route('admin.withdrawals.allow', $transaction) }}"
                                                       class="btn btn-success btn-sm"
                                                       onclick="event.preventDefault(); document.getElementById('allow-{{ $transaction->id }}').submit();"
                                                    >
                                                        <i class="fas fa-check-circle">
                                                        </i>
                                                    </a>
                                                @endcan
                                                @can('admin_deny_withdraw')
                                                    <a href="{{ route('admin.withdrawals.deny', $transaction) }}"
                                                       class="btn btn-danger btn-sm ml-2"
                                                       onclick="event.preventDefault(); document.getElementById('deny-{{ $transaction->id }}').submit();"
                                                    >
                                                        <i class="fas fa-times-circle">
                                                        </i>
                                                    </a>
                                                    @endcan
                                            </td>
                                        @else
                                            <td class="text-center">
                                                @if($transaction->status === 'success')
                                                    <i class="fas fa-2x fa-check-circle"
                                                       style="color: #28a745"
                                                    ></i>
                                                @elseif($transaction->status === 'failed')
                                                    <i class="fas fa-2x fa-times-circle"
                                                       style="color: #dc3545"
                                                    ></i>
                                                @endif
                                            </td>
                                        @endif

                                        <form action="{{ route('admin.withdrawals.allow', $transaction) }}"
                                              method="POST"
                                              id="allow-{{ $transaction->id }}"
                                        >
                                            @csrf
                                        </form>
                                        <form action="{{ route('admin.withdrawals.deny', $transaction) }}"
                                              method="POST"
                                              id="deny-{{ $transaction->id }}"
                                        >
                                            @csrf
                                        </form>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function () {
                $('#dateTimePicker').daterangepicker({
                    autoApply: true
                })
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
