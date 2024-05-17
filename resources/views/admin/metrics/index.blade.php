<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('metrics.title')</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">@lang('metrics.balance')</span>
                            <span class="info-box-number">{{ format_money($balance) }} USDT @lang('metrics.total')</span>

                            <span class="progress-description">
                                &nbsp;
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-download"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">@lang('metrics.replenished')</span>
                            <span class="info-box-number">{{ format_money($replenishesDaily) }} USDT / {{ $replenishesDailyCount }} @lang('metrics.operations') @lang('metrics.daily')</span>

                            <span class="progress-description">
                              {{ format_money($replenishesTotal) }} USDT / {{ $replenishesTotalCount }} @lang('metrics.operations') @lang('metrics.total')
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-upload"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">@lang('metrics.pending_withdrawals')</span>
                            <span class="info-box-number">{{ format_money($pendingWithdrawsDaily) }} USDT / {{ $pendingWithdrawsDailyCount }} @lang('metrics.operations') @lang('metrics.daily')</span>

                            <span class="progress-description">
                              {{ format_money($pendingWithdrawsTotal) }} USDT / {{ $pendingWithdrawsTotalCount }} @lang('metrics.operations') @lang('metrics.total')
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-upload"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">@lang('metrics.withdrawals')</span>
                            <span class="info-box-number">{{ format_money($withdrawsDaily) }} USDT / {{ $withdrawsDailyCount }} @lang('metrics.operations') @lang('metrics.daily')</span>

                            <span class="progress-description">
                              {{ format_money($withdrawsTotal) }} USDT / {{ $withdrawsTotalCount }} @lang('metrics.operations') @lang('metrics.total')
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">@lang('metrics.income_daily')</span>
                            <span class="info-box-number">{{ $incomeDaily }} USDT @lang('metrics.daily')</span>

                            <span class="progress-description">
                                &nbsp;
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">@lang('metrics.users')</span>
                            <span class="info-box-number">{{ $usersDaily }} @lang('metrics.amount') @lang('metrics.daily')</span>

                            <span class="progress-description">
                              {{ $usersTotal }} @lang('metrics.amount') @lang('metrics.total')
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">@lang('metrics.replenished_withdrawals_ratio') @lang('metrics.daily')</h3>
                        </div>
                        <div class="card-body">
                            @if($replenishesDaily === 0 && $withdrawsDaily === 0)
                                <div class="text-center">
                                    @lang('metrics.no_data')
                                </div>
                            @else
                                <canvas id="replenishmentsToWithdrawalsDailyChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"
                                ></canvas>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">@lang('metrics.replenished_withdrawals_ratio') @lang('metrics.total')</h3>
                        </div>
                        <div class="card-body">
                            @if($replenishesTotal === 0 && $withdrawsTotal === 0)
                                <div class="text-center">
                                    @lang('metrics.no_data')
                                </div>
                            @else
                                <canvas id="replenishmentsToWithdrawalsTotalChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"
                                ></canvas>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">@lang('metrics.finance_load') @lang('metrics.total')</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="financeLoadTotalChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"
                            ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const ratioDailyChart = $('#replenishmentsToWithdrawalsDailyChart').get(0)
            const ratioTotalChart = $('#replenishmentsToWithdrawalsTotalChart').get(0)
            const loadTotalChart = $('#financeLoadTotalChart').get(0)
            const options = {
                maintainAspectRatio: false,
                responsive: true,
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {
                            let dataLabel = data.labels[tooltipItem.index]
                            const value = ': ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')

                            if (Chart.helpers.isArray(dataLabel)) {
                                dataLabel = dataLabel.slice()
                                dataLabel[0] += value
                            } else {
                                dataLabel += value
                            }

                            return dataLabel
                        }
                    }
                }
            }
            const ratioLabels = [
                '{{ trans('metrics.replenished') }}',
                '{{ trans('metrics.withdrawals') }}',
            ]
            const loadLabels = [
                '{{ trans('metrics.load') }}',
                '{{ trans('metrics.free') }}',
            ]
            const ratioBackgroundColor = ['#28a745', '#17a2b8']
            const loadBackgroundColor = ['#fa3141', '#d0d0d0']

            if (ratioDailyChart !== undefined) {
                new Chart(ratioDailyChart.getContext('2d'), {
                    type: 'doughnut',
                    options,
                    data: {
                        labels: ratioLabels,
                        datasets: [
                            {
                                data: [{{ $replenishesDaily }}, {{ $withdrawsDaily }}],
                                backgroundColor: ratioBackgroundColor,
                            }
                        ]
                    }
                })
            }

            if (ratioTotalChart !== undefined) {
                new Chart(ratioTotalChart.getContext('2d'), {
                    type: 'doughnut',
                    options,
                    data: {
                        labels: ratioLabels,
                        datasets: [
                            {
                                data: [{{ $replenishesTotal }}, {{ $withdrawsTotal }}],
                                backgroundColor: ratioBackgroundColor,
                            }
                        ]
                    }
                })
            }

            if (loadTotalChart !== undefined) {
                new Chart(loadTotalChart.getContext('2d'), {
                    type: 'doughnut',
                    options,
                    data: {
                        labels: loadLabels,
                        datasets: [
                            {
                                data: [{{ round($loadTotal) }}, {{ 100 - round($loadTotal) }}],
                                backgroundColor: loadBackgroundColor,
                            }
                        ]
                    }
                })
            }
        </script>
    @endpush
</x-admin-layout>