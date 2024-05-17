<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('general.editing') @lang('partners.star')# {{ $star->level }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <x-admin.edit-form>
                    <form action="{{ route('admin.stars.update', $star) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="form-group">
                                <label for="percentage">@lang('referral-system.turnover')</label>
                                <input type="number" class="form-control" value="{{ $star->min_turnover }}"
                                       name="min_turnover" step="any">
                            </div>
                            <div class="form-group">
                                <label>@lang('referral-system.turnover_fl')</label>
                                <input type="number" class="form-control" value="{{ $star->min_turnover_fl }}"
                                       name="min_turnover_fl" step="any">
                            </div>
                            <div class="form-group">
                                <label>@lang('referral-system.bonus')</label>
                                <input type="number" class="form-control" value="{{ $star->bonus }}"
                                       name="bonus" step="any">
                            </div>
                            <div class="form-group">
                                <label>@lang('referral-system.monthly_turnover_bonus_percentage')</label>
                                <input type="number" class="form-control"
                                       value="{{ $star->monthly_turnover_bonus_percentage }}"
                                       name="monthly_turnover_bonus_percentage" step="any">
                            </div>
                            <div class="form-group">
                                <label>@lang('referral-system.referral_bonus')</label>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>1 @lang('referral-system.line')</label>
                                                <input type="number" class="form-control" step="any"
                                                       value="{{ $star->referral_bonus_percentage[1] ?? 0 }}"
                                                       name="referral_bonus_percentage[1]">
                                            </div>
                                            <div class="col-4">
                                                <label>2 @lang('referral-system.line')</label>
                                                <input type="number" class="form-control" step="any"
                                                       value="{{ $star->referral_bonus_percentage[2] ?? 0 }}"
                                                       name="referral_bonus_percentage[2]">
                                            </div>
                                            <div class="col-4">
                                                <label>3 @lang('referral-system.line')</label>
                                                <input type="number" class="form-control" step="any"
                                                       value="{{ $star->referral_bonus_percentage[3] ?? 0 }}"
                                                       name="referral_bonus_percentage[3]">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <label>4 @lang('referral-system.line')</label>
                                                <input type="number" class="form-control" step="any"
                                                       value="{{ $star->referral_bonus_percentage[4] ?? 0 }}"
                                                       name="referral_bonus_percentage[4]">
                                            </div>
                                            <div class="col-4">
                                                <label>5 @lang('referral-system.line')</label>
                                                <input type="number" class="form-control" step="any"
                                                       value="{{ $star->referral_bonus_percentage[5] ?? 0 }}"
                                                       name="referral_bonus_percentage[5]">
                                            </div>
                                            <div class="col-4">
                                                <label>6 @lang('referral-system.line')</label>
                                                <input type="number" class="form-control" step="any"
                                                       value="{{ $star->referral_bonus_percentage[6] ?? 0 }}"
                                                       name="referral_bonus_percentage[6]">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <label>7 @lang('referral-system.line')</label>
                                                <input type="number" class="form-control" step="any"
                                                       value="{{ $star->referral_bonus_percentage[7] ?? 0 }}"
                                                       name="referral_bonus_percentage[7]">
                                            </div>
                                            <div class="col-4">
                                                <label>8 @lang('referral-system.line')</label>
                                                <input type="number" class="form-control" step="any"
                                                       value="{{ $star->referral_bonus_percentage[8] ?? 0 }}"
                                                       name="referral_bonus_percentage[8]">
                                            </div>
                                            <div class="col-4">
                                                <label>9 @lang('referral-system.line')</label>
                                                <input type="number" class="form-control" step="any"
                                                       value="{{ $star->referral_bonus_percentage[9] ?? 0 }}"
                                                       name="referral_bonus_percentage[9]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">@lang('general.save')</button>
                        </div>
                    </form>
                </x-admin.edit-form>
            </div>
        </div>
    </div>
</x-admin-layout>