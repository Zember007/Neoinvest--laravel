@section('title')
    {{ $title }}
@endsection

<x-guest-layout>
    <div class="f">
        <form action="{{ $submitTo }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <h1 class="f-title" style="margin-bottom: 20px;">{{ $title }}</h1>

            <div class="f-que"
                 style="margin-bottom: 40px;">@lang('auth.email_verification_notice', ['email' => $login])</div>

            <div class="f-block">
                <div class="f-block-row">
                    <label for="code" class="f-label">@lang('auth.verification_code')</label>
                </div>
                <input type="text" id="code" class="f-input" name="code"
                       placeholder="@lang('auth.enter_verification_code')">
                @error('code')
                <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn__submit">@lang('auth.verify')</button>
        </form>
        <div class="f-que" style="display: flex; justify-content: space-between">
            <a href="{{ route('verify.resend') }}"
               class="que__link"
               onclick="event.preventDefault(); document.getElementById('resend-form').submit();"
            >
                @lang('auth.resend')
            </a>

            <div class="btn-modal__wrapper" style="margin: auto">
                <a class="que__link btn-modal" style="cursor: pointer;">
                    @lang('auth.change_email')
                </a>
                <div class="modal__wrapper">
                    <div class="modal confirm">
                        <div class="modal-close js-modal-close">
                            <img src="/assets/icon-modal-close.svg" alt="close">
                        </div>
                        <div class="modal__inner">
                            <div class="modal-title">@lang('auth.in_order_to_change_email')</div>

                            @livewire('change-login-form', ['mode' => 'email'])
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('logout') }}"
               class="que__link"
               style="margin-left: auto"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >
                @lang('general.logout_short')
            </a>
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
            </form>
        </div>
    </div>
    <form action="{{ $resendTo }}" method="POST" id="resend-form">
        @csrf
        <input type="hidden" name="token" value="{{ request()->route('token') }}">
    </form>
</x-guest-layout>