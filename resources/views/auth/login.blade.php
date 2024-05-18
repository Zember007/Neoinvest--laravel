@section('title')
    @lang('auth.sign_in')
@endsection

<x-guest-layout>
    <!-- <form action="{{ route('login') }}" method="POST" class="f">
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
    </form> -->
    <section class="page">
	<div class="container">
	
		<div class="row align-items-end">
			<div class="col-lg-7">
				<div class="page__top">
					<div class="h1-small page__title">
						<h1>Логин</h1>
					</div>
				</div>
				<div class="register__more content">
					<p>Введите Ваши данные для авторизации на сайте</p>
				</div>
				<form class="register__form f" action="{{ route('login') }}" method="POST"> 
				@csrf
					<label class="input register__form-field">
						<span class="input__title">Логин</span>
						<input type="text" name="login" class="input__field input__big element-blur input__field-blue" placeholder="Введите логин">
						@error('login')
						<div class="input__error">{{ $message }}</div>
						@enderror 
					</label>
					<label class="input register__form-field js-input-password">
						<span class="input__title">Пароль</span>
						<span class="input__field-wrapper">
							<img src="/img/new/icons/icon-lock-accent.svg" alt="alt" class="input__icon">
							<input id="password" type="password" name="password" class="input__field input__big element-blur input__field-blue js-input-password-field" placeholder="Введите пароль">
							<span class="input__control js-input-password-toggler icon-mask"></span> 
							@error('password') 
							<div class="input__error">{{ $message }}</div> 
							@enderror
						</span>
					</label>
					<div class="register__submit-box">
						<input type="submit" value="Войти" class="btn btn-big btn-fill-blue register__submit">
						<a href="{{ route('forgot-password.index') }}" class="f-link-forgot">@lang('auth.forgot_password')</a>
					</div>
				</form>
			</div>
			<div class="col-lg-5">
				<div class="register__sidebar c-white">
					<div class="h3 register__sidebar-title">У вас ещё нет учётной записи?</div>
					<div class="register__sidebar-descr">Заполните свои персональные данные и&nbsp;начните инвестировать и&nbsp;зарабатывать с&nbsp;нами!</div>
					<a href="{{ route('register') }}" class="btn btn-big btn-block btn-fill-white register__sidebar-btn">@lang('auth.sign_up')</a>
				</div>
			</div>
		</div>
	</div>
</section>
</x-guest-layout>