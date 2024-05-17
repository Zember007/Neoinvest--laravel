<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">@lang('promos.title')</h1>
                    @can('admin_create_promo')
                        <a class="btn btn-info btn-sm"
                           href="{{ route('admin.promos.create') }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            @lang('general.create')
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">

            </div>
        </div>
    </div>
</x-admin-layout>