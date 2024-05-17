<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('replenishments.title')</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.replenishments.search') }}" method="POST">
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
                            <label>@lang('replenishments.merchant_id')</label>
                            <input type="text" class="form-control" name="merchant_id"
                                   value="{{ request('merchant_id') }}">
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
                                    <th>@lang('users.created_at')</th>
                                    <th>@lang('replenishments.merchant_id')</th>
                                    <th>@lang('users.status')</th>
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
                                        <td>{{ $transaction->created_at->format('d.m.Y H:i')  }}</td>
                                        <td>{{ $transaction->merchant_id }}</td>
                                        <td>@lang("finances.operation_$transaction->status")</td>
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
