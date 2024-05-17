<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('general.editing') @lang("investments.packets.$packet->name")</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <x-admin.edit-form>
                    <form action="{{ route('admin.packets.update', $packet) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="form-group">
                                <label for="percentage">@lang('investments.daily_percentage')</label>
                                <input type="number" class="form-control" value="{{ $packet->percentage }}"
                                       name="percentage" step="any">
                            </div>

                            <div class="form-group">
                                <label>@lang('investments.min_investment_sum')</label>
                                <input type="number" class="form-control" value="{{ $packet->min_invest }}"
                                       name="min_invest" step="any">
                            </div>

                            <div class="form-group">
                                <label>@lang('investments.min_reinvestment_sum')
                                    (@lang('investments.zero_if_no_reinvest'))</label>
                                <input type="number" class="form-control" value="{{ $packet->min_reinvest ?? 0 }}"
                                       name="min_reinvest" step="any">
                            </div>

                            <div class="form-group">
                                <label>@lang('investments.expiration_date') (@lang('investments.zero_if_unlimited')
                                    )</label>
                                <input type="number" class="form-control" value="{{ $packet->duration_days ?? 0 }}"
                                       name="duration_days">
                            </div>

                            <div class="form-group">
                                <label>@lang('investments.status')</label>
                                @php
                                    $active = \App\Models\PacketOption::STATUS_ACTIVE;
                                    $disabled = \App\Models\PacketOption::STATUS_DISABLED;
                                    $hidden = \App\Models\PacketOption::STATUS_HIDDEN
                                @endphp
                                <select class="form-control" name="status">
                                    <option value="{{ $active }}" @if($packet->isActive)) selected @endif>
                                        @lang("investments.statuses.active")
                                    </option>
                                    <option value="{{ $disabled }}" @if($packet->isDisabled)) selected @endif>
                                        @lang("investments.statuses.disabled")
                                    </option>
                                    <option value="{{ $hidden }}" @if($packet->isHidden)) selected @endif>
                                        @lang("investments.statuses.hidden")
                                    </option>
                                </select>
                            </div>

                            <div class="form-check">
                                <input type="checkbox"
                                       class="form-check-input"
                                       id="payback"
                                       name="is_refundable"
                                       @if($packet->is_refundable) checked @endif
                                >
                                <label class="form-check-label" for="payback">@lang('investments.payback')</label>
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