<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('general.editing') @lang('users.user') {{ $user->full_name_short }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <x-admin.edit-form>
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="form-group">
                                <label>@lang('users.first_name')</label>
                                <input type="text" class="form-control" name="first_name"
                                       value="{{ $user->first_name }}">
                            </div>

                            <div class="form-group">
                                <label>@lang('users.last_name')</label>
                                <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                            </div>

                            <div class="form-group">
                                <label>
                                    @if($user->hasEmailFilled())
                                        @lang('users.email')
                                    @else
                                        @lang('users.phone')
                                    @endif
                                </label>
                                <input type="text" class="form-control" name="login" value="{{ $user->login }}">
                            </div>

                            <div class="form-group">
                                <label>@lang('users.country')</label>
                                <select class="form-control" name="country">
                                    @foreach(['ru', 'en', 'ua', 'blr', 'kz'] as $country)
                                        <option value="{{ $country }}"
                                                @if($user->country === $country)) selected @endif
                                        >
                                            @lang("general.lang.$country.country")
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>@lang('users.role')</label>
                                <select class="form-control" name="role">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}"
                                                @if($user->hasRole($role->name)) selected @endif>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>@lang('users.balance')</label>
                                <input type="text" class="form-control" name="balance" value="{{ $user->balance }}">
                            </div>

                            <div class="form-check">
                                <input type="checkbox"
                                       class="form-check-input"
                                       id="payback"
                                       name="is_verified"
                                       @if($user->isVerified()) checked @endif
                                >
                                <label class="form-check-label" for="payback">@lang('users.is_verified')</label>
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