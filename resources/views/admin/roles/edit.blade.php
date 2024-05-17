<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('general.editing')  @lang('roles.role') {{ $role->name }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <x-admin.edit-form>
                    <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="form-group">
                                <label for="percentage">@lang('general.title')</label>
                                <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                            </div>

                            <div class="form-group">
                                <label>@lang('roles.permissions')</label>
                                <select class="select2" multiple="multiple" style="width: 100%;" name="permissions[]">
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission }}"
                                                @if($currentPermissions->contains($permission)) selected @endif>{{ $permission }}</option>
                                    @endforeach
                                </select>
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

    @push('scripts')
        <script>
            $(function () {
                $('.select2').select2()
            })
        </script>
    @endpush
</x-admin-layout>