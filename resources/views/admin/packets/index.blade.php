<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('packets.title')</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>@lang('general.title')</th>
                                    <th>@lang('investments.status')</th>
                                    <th style="width: 60px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($packets as $packet)
                                    <tr>
                                        <td>{{ $packet->id }}</td>
                                        <td>@lang("investments.packets.$packet->name")</td>
                                        <td>
                                            @if($packet->isActive)
                                                @lang("investments.statuses.active")
                                            @elseif($packet->isDisabled)
                                                @lang("investments.statuses.disabled")
                                            @elseif($packet->isHidden)
                                                @lang("investments.statuses.hidden")
                                            @endif
                                        </td>
                                        <td>
                                            @can('admin_edit_packet')
                                                <a class="btn btn-info btn-sm"
                                                   href="{{ route('admin.packets.edit', $packet) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>