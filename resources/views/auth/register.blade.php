@section('title')
    @lang('auth.sign_up')
@endsection

<x-guest-layout>
    <form action="{{ route('register') }}" method="POST" class="f">
        @csrf

        <h1 class="f-title">@lang('auth.sign_up')</h1>

        <div class="f-row _2">
            <div class="f-block">
                <div class="f-block-row">
                    <label for="name" class="f-label">@lang('auth.first_name')</label>
                </div>
                <input type="text" id="name" class="f-input" name="first_name" value="{{ old('first_name') }}"
                       placeholder="@lang('auth.enter_first_name')">
                @error('first_name')
                <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>
            <div class="f-block">
                <div class="f-block-row">
                    <label for="surname" class="f-label">@lang('auth.last_name')</label>
                </div>
                <input type="text" id="surname" class="f-input" name="last_name" value="{{ old('last_name') }}"
                       placeholder="@lang('auth.enter_last_name')">
                @error('last_name')
                <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>
        </div><!-- /.f-row -->

        <x-country-selector/>

        <x-method-selector :is-single="false" :preferred-mode="'phone'">
            <div class="f-block-row">
                <label for="password" class="f-label">@lang('auth.method')</label>
            </div>
        </x-method-selector>

        <div class="f-block">
            <div class="f-block-row">
                <label for="mentor-id" class="f-label">@lang('general.referrer_id')</label>
            </div>
            @if(request('ref'))
                <input type="hidden" name="referrer_id" value="{{ request('ref') }}">
            @endif
            <input type="text" id="mentor-id" class="f-input" name="referrer_id"
                   value="{{ old('referrer_id') ?? request()->query('ref') }}"
                   @if(request('ref')) disabled="disabled" @endif
                   placeholder="@lang('auth.enter_referrer_id')">
            @error('referrer_id')
            <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="f-row _2">
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
        </div><!-- /.f-row -->

        <button class="btn btn__submit">@lang('auth.register')</button>
        <div class="f-que">
            @lang('auth.have_account')
            <a href="{{ route('login') }}" class="f-que__link">@lang('auth.login')</a>
        </div>
    </form>
</x-guest-layout>
