<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('stars.title')</h1>
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
                                    <th>@lang('partners.star')</th>
                                    <th style="width: 60px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stars as $star)
                                    <tr>
                                        <td>{{ $star->id }}</td>
                                        <td>@lang('partners.star') #{{ $star->level }}</td>
                                        <td>
                                            @can('admin_edit_star')
                                                <a class="btn btn-info btn-sm"
                                                   href="{{ route('admin.stars.edit', $star) }}">
                                                    <i class="fas fa-pencil-alt"></i>
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