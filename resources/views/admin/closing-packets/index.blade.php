<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('closing-packets.title')</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-download"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">@lang('closing-packets.total')</span>
                            <span class="info-box-number">{{ $packetsTotal }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>@lang('general.user')</th>
                                    <th>@lang('users.packet')</th>
                                    <th>@lang('closing-packets.closing_at')</th>
                                    <th>@lang('closing-packets.days_remaining')</th>
                                    <th>@lang('users.sum')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($packets as $packet)
                                    @php
                                        $packetOption = $packetOptions->first(fn ($option) => $option->id === $packet->packet_option_id)
                                    @endphp
                                    <tr>
                                        <td>{{ $packet->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.show', $packet->user) }}">
                                                {{ $packet->user->full_name }}
                                            </a>
                                        </td>
                                        <td>@lang('investments.packets.' . $packetOption->name)</td>
                                        <td>{{ $packet->deleted_at->addMonth()->format('d.m.Y H:i') }}</td>
                                        <td>{{ $packet->deleted_at->addMonth()->diffInDays(now()) }}</td>
                                        <td>{{ $packet->transactions_sum_amount }} USDT</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $packets->links() }}
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
