@section('title')
    @lang('auth.resetting_password')
@endsection

<x-guest-layout>
    <form action="{{ route('reset-password.store') }}" method="POST" class="f">
        @csrf
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <h1 class="f-title">@lang('auth.resetting_password')</h1>

        <div class="f-block">
            <div class="f-block-row">
                <label for="password" class="f-label">@lang('auth.your_password')</label>
            </div>
            <input type="password" id="password" class="f-input" placeholder="@lang('auth.enter_password')"
                   name="password">
            @error('password')
            <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div class="f-block">
            <div class="f-block-row">
                <label for="password-confirm" class="f-label">@lang('auth.confirm_password')</label>
            </div>
            <input type="password" id="password-confirm" class="f-input" placeholder="@lang('auth.enter_password')"
                   name="password_confirmation">
            @error('password')
            <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn__submit" type="submit">@lang('auth.verify')</button>
    </form>
</x-guest-layout>
