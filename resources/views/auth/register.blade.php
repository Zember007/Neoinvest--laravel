@section('title')
    @lang('auth.sign_up')
@endsection

<x-guest-layout>

<section class="page"> 
	<div class="container">
		<div class="row align-items-end">
			<div class="col-lg-7">
				<div class="page__top">
					<div class="h1-small page__title">
						<h1>@lang('auth.sign_up')</h1>
					</div>
					<div class="register__info">
                    @if(request('ref'))  
                    <div class="register__info-title">@lang('auth.sign_up_for_link')</div>
					<div class="register__info-value">{{request('ref')}}</div>                      
                    @endif						
					</div>
				</div>
				<div class="register__more content">
					<p>@lang('auth.sign_up_need')</p>
					<!-- <p><mark>Все поля формы обзятельны к заполнению</mark></p> -->
				</div>
				<form class="register__form f" action="{{ route('register') }}" method="POST">
                    @csrf
					@if(request('ref_id'))  
						<input type="hidden" name="referrer_id" value="{{ request('ref_id') }}"> 
					@else
						<input type="hidden" name="referrer_id" value="">                      
                    @endif	
					<label class="input register__form-field has-error">
						<span class="input__title">@lang('auth.your_email')</span>
						<input type="email" name="email" class="input__field input__big element-blur input__field-blue" placeholder="konstantin.konstantinovich@gmail.com">
                        @error('email')
						    <span class="input__error">{{ $message }}</span>
                        @enderror
                       
					</label>
					<label class="input register__form-field">
						<span class="input__title" >@lang('auth.your_login')</span>
						<input type="text" name="login" class="input__field input__big element-blur input__field-blue" placeholder="@lang('auth.your_login_description')">

                        @error('login')
                        <div class="error-msg">{{ $message }}</div>
                        @enderror
					</label>
					<label class="input register__form-field js-input-password">
						<span class="input__title">@lang('auth.your_password')</span>
						<span class="input__field-wrapper">
							<img src="/img/new/icons/icon-lock-accent.svg" alt="alt" class="input__icon">
							<input type="password" id="password" name="password" class="input__field input__big element-blur input__field-blue js-input-password-field" placeholder="@lang('auth.enter_password')">
							<span class="input__control js-input-password-toggler icon-mask"></span>
                            @error('password')
						        <span class="input__error">{{ $message }}</span>
                            @enderror
						</span>
					</label>
					<label class="input register__form-field js-input-password">
						<span class="input__title">@lang('auth.confirm_password')</span>
						<span class="input__field-wrapper">
							<img src="/img/new/icons/icon-lock-accent.svg" alt="alt" class="input__icon">
							<input type="password" id="password-confirm" name="password_confirmation" class="input__field input__big element-blur input__field-blue js-input-password-field" placeholder="@lang('auth.enter_confirm_password')">
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
					<div class="register__sidebar-descr">@lang('auth.login_description')</div>
					<a href="{{ route('login') }}" class="btn btn-big btn-block btn-fill-white register__sidebar-btn">Авторизация</a>
				</div>
			</div>
		</div>
	</div>
</section> 
</x-guest-layout>
