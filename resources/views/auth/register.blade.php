@section('title')
    @lang('auth.sign_up')
@endsection

<x-guest-layout>
    <!-- <form action="{{ route('register') }}" method="POST" class="f">
        @csrf

        <h1 class="f-title"></h1>

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
        </div>

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
        </div>

        <button class="btn btn__submit">@lang('auth.register')</button>
        <div class="f-que">
            @lang('auth.have_account')
            <a href="{{ route('login') }}" class="f-que__link">@lang('auth.login')</a>
        </div>
    </form> -->

<section class="page"> 
	<div class="container">
		<div class="row align-items-end">
			<div class="col-lg-7">
				<div class="page__top">
					<div class="h1-small page__title">
						<h1>@lang('auth.sign_up')</h1>
					</div>
					<div class="register__info">
						<div class="register__info-title">Вы регистрируетесь по ссылке</div>
						<div class="register__info-value">konstantin.konstantinovich</div>
					</div>
				</div>
				<div class="register__more content">
					<p>Регистрация аккаунта необходима для использования всех функций сервиса.</p>
					<p><mark>Все поля формы обзятельны к заполнению</mark></p>
				</div>
				<form class="register__form f" action="{{ route('register') }}" method="POST">
                    @csrf
					<label class="input register__form-field has-error">
						<span class="input__title">Электронная почта</span>
						<input type="email" name="email" class="input__field input__big element-blur input__field-blue" placeholder="konstantin.konstantinovich@gmail.com">
                        @error('email')
						    <span class="input__error">{{ $message }}</span>
                        @enderror
                       
					</label>
					<label class="input register__form-field">
						<span class="input__title" >Логин</span>
						<input type="text" name="login" class="input__field input__big element-blur input__field-blue" placeholder="Придумайте логин">

                        @error('login')
                        <div class="error-msg">{{ $message }}</div>
                        @enderror
					</label>
					<label class="input register__form-field js-input-password">
						<span class="input__title">Пароль</span>
						<span class="input__field-wrapper">
							<img src="/img/new/icons/icon-lock-accent.svg" alt="alt" class="input__icon">
							<input type="password" id="password" name="password" class="input__field input__big element-blur input__field-blue js-input-password-field" placeholder="Придумайте пароль">
							<span class="input__control js-input-password-toggler icon-mask"></span>
                            @error('password')
						        <span class="input__error">{{ $message }}</span>
                            @enderror
						</span>
					</label>
					<label class="input register__form-field js-input-password">
						<span class="input__title">Повторно пароль</span>
						<span class="input__field-wrapper">
							<img src="/img/new/icons/icon-lock-accent.svg" alt="alt" class="input__icon">
							<input type="password" id="password-confirm" name="password_confirmation" class="input__field input__big element-blur input__field-blue js-input-password-field" placeholder="Повторите придуманный пароль">
							<span class="input__control js-input-password-toggler icon-mask"></span> 
                            @error('password') 
						        <span class="input__error">{{ $message }}</span>
                            @enderror
						</span>
					</label>
					<input type="submit" value="@lang('auth.register')" class="btn btn-big btn-fill-blue register__submit">
				</form>
			</div>
			<div class="col-lg-5">
				<div class="register__sidebar register__sidebar-offset c-white">
					<div class="h3 register__sidebar-title">@lang('auth.have_account')</div>
					<div class="register__sidebar-descr">Авторизируйтесь, что бы воспользоваться всеми функцииями и привилегиями платформы</div>
					<a href="{{ route('login') }}" class="btn btn-big btn-block btn-fill-white register__sidebar-btn">Авторизация</a>
				</div>
			</div>
		</div>
	</div>
</section> 
</x-guest-layout>
