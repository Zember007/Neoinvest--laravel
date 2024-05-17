@section('title')
    @lang('auth.sign_in')
@endsection

<x-guest-layout>
    <form action="{{ route('login') }}" method="POST" class="f">
        @csrf

        <h1 class="f-title">@lang('auth.sign_in')</h1>

        <x-method-selector :is-single="false" :preferred-mode="'phone'"/>

        <div class="f-block">
            <div class="f-block-row">
                <label for="password" class="f-label">@lang('auth.your_password')</label>
                <a href="{{ route('forgot-password.index') }}" class="f-link-forgot">@lang('auth.forgot_password')</a>
            </div>
            <input type="password" id="password" class="f-input" name="password"
                   placeholder="@lang('auth.enter_password')">
            @error('password')
            <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn__submit" type="submit">@lang('auth.login')</button>
        <div class="f-que">
            @lang('auth.no_account')
            <a href="{{ route('register') }}" class="f-que__link">@lang('auth.sign_up')</a>
        </div>
    </form>
</x-guest-layout>