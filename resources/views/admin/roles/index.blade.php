<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">@lang('roles.title')</h1>
                    @can('admin_create_role')
                        <a class="btn btn-info btn-sm"
                           href="{{ route('admin.roles.create') }}">
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>@lang('general.title')</th>
                                    <th style="width: 100px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td @unless($role->is_locked) class="d-flex" @endunless>
                                            @unless($role->is_locked)
                                                @can('admin_edit_role')
                                                    <a class="btn btn-info btn-sm"
                                                       href="{{ route('admin.roles.edit', $role) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                @endcan
                                                @can('admin_delete_role')
                                                    <form action="{{ route('admin.roles.destroy', $role) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="btn btn-danger btn-sm ml-2">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endunless
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