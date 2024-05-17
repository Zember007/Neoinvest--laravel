<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('debugs.title')</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            @if($errors->any())
                <div class="row">
                    <div class="alert alert-danger">
                        <h5><i class="icon fas fa-ban"></i> @lang('general.error')!</h5>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </div>
            @endif
            @if(session('status'))
                <div class="row">
                    <div class="alert alert-success">
                        <h5><i class="icon fas fa-check"></i> {{ session('status') }}</h5>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@lang('debugs.replenish_transaction')</h3>
                        </div>
                        <form action="{{ route('admin.debugs.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="action" value="finance">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>@lang('general.user')</label>
                                    <select class="form-control" name="user">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>@lang('finances.replenish_amount')</label>
                                    <input type="text" class="form-control" name="amount">
                                </div>
                            </div>

                            @can('admin_store_debugs')
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">@lang('general.execute')</button>
                                </div>
                            @endcan
                        </form>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@lang('debugs.monthly_turnover')</h3>
                        </div>
                        <form action="{{ route('admin.debugs.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="action" value="monthly_turnover">
                            @can('admin_store_debugs')
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">@lang('general.execute')</button>
                                </div>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>