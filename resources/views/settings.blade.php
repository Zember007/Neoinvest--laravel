@section('title')
    @lang('settings.title')
@endsection

<x-app-layout>
    <div class="content-row profile-row">
        <div class="page-title _lg-hidden">@lang('settings.title')</div>
        @include('layouts.partials.container.user-hero')

        <div class="set__wrapper">
            <div class="set">
                <div class="set-title">@lang('settings.personal_details')</div>

                @livewire('profile-picture-form')

                <form action="{{ route('settings.store') }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="set-row _align-bottom"
                >
                    @csrf
                    <x-country-selector class="set-country"/>
                    <button class="btn btn_blue set-btn set-btn__wrapper _short btn-modal">
                        @lang('general.save')
                    </button>
                </form>

                <form action="{{ route('profile.delete-photo') }}" method="POST" id="delete-pfp-form">
                    @csrf
                    @method('DELETE')
                </form>

            </div><!-- ./set -->

            <div class="set">
                <div class="set-title">@lang('settings.contact_info')</div>

                @if(auth()->user()->hasEmailFilled())
                    <div class="set-row _align-bottom">
                        <x-method-selector
                                :is-single="true"
                                preferred-mode="email"
                                class="set-country"
                                hint="{{ trans('settings.email_change_disabled') }}"
                                phone="{{ auth()->user()->email }}"
                                disabled
                        />
                    </div>
                @endif

                <form action="{{ route('settings.store') }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="set-row _align-bottom"
                >
                    @csrf
                    <x-method-selector :is-single="true"
                                       preferred-mode="phone"
                                       class="set-country"
                                       margin-styles="margin-bottom: 0"
                                       phone="{{ auth()->user()->secondary_phone }}"
                                       phone-country="{{ auth()->user()->secondary_phone_country ?? 'ru' }}"
                                       hint="{{ trans('settings.contact_info_hint') }}"
                    />
                    <button class="btn btn_blue set-btn set-btn__wrapper _short btn-modal">
                        @lang('general.save')
                    </button>
                </form>
            </div><!-- ./set -->

            <div class="set">
                <div class="set-title">@lang('settings.security')</div>
                <div class="set-row _space-between _lg-1">
                    <div class="f-block">
                        <div class="f-block-row">
                            <label for="email" class="f-label">@lang('settings.2fa')</label>
                        </div>
                        <div class="f-input f-toggle"
                             @if(auth()->user()->is_2fa_enabled) style="border-bottom-left-radius: 0; border-bottom-right-radius: 0; " @endif>
                            <input id="two_factor" type="checkbox">
                            @if(auth()->user()->is_2fa_enabled)
                                <div class="f-toggle__text">@lang('general.yes')</div>
                                <div class="btn-modal__wrapper set-btn__wrapper">
                                    <button for="two_factor"
                                            class="f-toggle__btn set-file-btn btn_blue btn-modal"
                                            style="border: none; font-weight: normal"
                                            onclick="event.preventDefault();document.getElementById('2fa_disable').submit();"
                                    >
                                        @lang('settings.disconnect')
                                    </button>

                                    <div class="modal__wrapper">
                                        <div class="modal confirm">
                                            <div class="modal-close js-modal-close">
                                                <img src="/assets/icon-modal-close.svg" alt="close">
                                            </div>
                                            <div class="modal__inner">
                                                <div class="modal-title">@lang('settings.confirm_changes')</div>
                                                <div class="modal-desc _dark">
                                                    @lang('auth.2fa_notice')
                                                </div>

                                                <form action="/user/two-factor-authentication" method="POST"
                                                      style="width: 100%">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="f-block">
                                                        <div class="f-block-row">
                                                            <label for="code" class="f-label">
                                                                @lang('auth.verification_code')
                                                            </label>
                                                        </div>
                                                        <input type="text"
                                                               id="code"
                                                               class="f-input"
                                                               style="display: block"
                                                               name="code"
                                                               placeholder="@lang('auth.enter_verification_code')"
                                                        >
                                                        @error('code')
                                                        <div class="error-msg">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <button class="btn btn__submit recovery-btn">
                                                        @lang('general.save')
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="f-toggle__text">@lang('general.no')</div>
                                <button for="two_factor"
                                        class="f-toggle__btn"
                                        style="border: none"
                                        onclick="event.preventDefault();document.getElementById('2fa_enable').submit();"
                                >
                                    @lang('settings.connect')
                                </button>
                            @endif
                        </div>

                        @if(auth()->user()->is_2fa_enabled)
                            <div
                                    style="background-color: #F3F5F9;display: flex;justify-content: center;align-items: center; flex-direction: column; padding: 20px;">
                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                <a href="{{ auth()->user()->twoFactorQrCodeUrl() }}" style="color: #0c4ace; font-weight: bold; margin-top: 10px;">
                                    @lang('settings.manual_2fa')
                                </a>
                            </div>
                        @endif

                        <form action="/user/two-factor-authentication" method="POST" id="2fa_enable">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="set-row _short _space-between _lg-3">
                    <div class="btn-modal__wrapper set-btn__wrapper">
                        <button class="btn btn_gray set-btn btn-modal">@lang('settings.change_password')</button>

                        <div class="modal__wrapper">
                            <div class="modal confirm">
                                <div class="modal-close js-modal-close">
                                    <img src="/assets/icon-modal-close.svg" alt="close">
                                </div>
                                @livewire('change-password')
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- ./set -->
        </div>
    </div>

    @if(session('status'))
        <div class="notif active _success">
            <img src="/assets/icon-notif-green.svg" alt="success" class="notif-icon">
            <div class="notif-text">
                @if(session('status') === 'two-factor-authentication-enabled')
                    @lang('auth.2fa_enabled_successfully')
                @endif
                @if(session('status') === 'two-factor-authentication-disabled')
                    @lang('auth.2fa_disabled_successfully')
                @endif
            </div>
        </div>
    @endif
</x-app-layout>
