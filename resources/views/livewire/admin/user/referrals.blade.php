<div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>@lang('partners.line_cap')</th>
            <th>@lang('partners.name')</th>
            <th>@lang('partners.contacts')</th>
            <th>ID</th>
            <th>@lang('partners.star')</th>
            <th>@lang('partners.mentor')</th>
            <th>@lang('partners.turnover')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($referrals as $referral)
            @php
                $referred = $referral->referred
            @endphp
            <tr>
                <td>{{ $referral->level }}</td>
                <td>
                    <a href="{{ route('admin.users.show', $referred) }}">
                        {{ $referred->full_name }}
                    </a>
                </td>
                <td>{{ $referred->login }}</td>
                <td>{{ $referred->id }}</td>
                <td>{{ $referred->star->level }}</td>
                <td>
                    <a href="{{ route('admin.users.show', $referred->referrer) }}">
                        {{ $referred->referrer->full_name }}
                    </a>
                </td>
                <td>{{ format_money($referred->getReferralsPacketInvests()) }}
                    USDT
                </td>
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