<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('users.title')</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.users.search') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>@lang('users.name')</label>
                            <input type="text" class="form-control" name="name" value="{{ request('name') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>@lang('users.contacts')</label>
                            <input type="text" class="form-control" name="contacts" value="{{ request('contacts') }}">
                        </div>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <button class="btn btn-info mt-3">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>@lang('users.name')</th>
                                    <th>@lang('users.balance')</th>
                                    <th>@lang('users.contacts')</th>
                                    <th style="width: 150px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->balance }}</td>
                                        <td>{{ $user->login }}</td>
                                        <td>
                                            @can('admin_view_user')
                                                <a class="btn btn-info btn-sm"
                                                   href="{{ route('admin.users.show', $user) }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            @endcan
                                            @can('admin_edit_user')
                                                <a class="btn btn-info btn-sm ml-1"
                                                   href="{{ route('admin.users.edit', $user) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            @endcan
                                            @if(!$user->is(auth()->user()))
                                                @can('admin_disguise_user')
                                                    <a href="{{ route('admin.users.disguise', $user) }}"
                                                       class="btn btn-info btn-sm ml-1"
                                                       onclick="event.preventDefault(); document.getElementById('disguise-{{ $user->id }}').submit();"
                                                    >
                                                        <i class="fas fa-sign-in-alt"></i>
                                                    </a>
                                                @endcan

                                                @if($user->is_banned)
                                                    @can('admin_unban_user')
                                                        <a href="{{ route('admin.users.unban', $user) }}"
                                                           class="btn btn-success btn-sm ml-1"
                                                           onclick="event.preventDefault(); document.getElementById('unban-{{ $user->id }}').submit();"
                                                        >
                                                            <i class="fas fa-check-circle"></i>
                                                        </a>
                                                    @endcan
                                                @else
                                                    @can('admin_ban_user')
                                                        <a class="btn btn-danger btn-sm ml-1"
                                                           href="{{ route('admin.users.ban', $user) }}"
                                                           onclick="event.preventDefault(); document.getElementById('ban-{{ $user->id }}').submit();"
                                                        >
                                                            <i class="fas fa-times-circle"></i>
                                                        </a>
                                                    @endcan
                                                @endif
                                            @endif

                                            <form action="{{ route('admin.users.disguise', $user) }}"
                                                  method="POST"
                                                  id="disguise-{{ $user->id }}"
                                            >
                                                @csrf
                                            </form>
                                            <form action="{{ route('admin.users.unban', $user) }}"
                                                  method="POST"
                                                  id="unban-{{ $user->id }}"
                                            >
                                                @csrf
                                            </form>
                                            <form action="{{ route('admin.users.ban', $user) }}"
                                                  method="POST"
                                                  id="ban-{{ $user->id }}"
                                            >
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $users->links() }}
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
