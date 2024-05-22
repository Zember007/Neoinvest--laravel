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
                                <input type="number" class="form-control" step="any"
                                                       value="{{ $star->referral_bonus_percentage[0] }}" 
                                                       name="referral_bonus_percentage">
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