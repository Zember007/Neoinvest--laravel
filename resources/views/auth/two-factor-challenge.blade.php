@section('title')
    @lang('auth.2fa')
@endsection

<x-guest-layout>
    <form action="{{ route('two-factor.login') }}" method="POST" class="f">
        @csrf
        <h1 class="f-title" style="margin-bottom: 20px;">@lang('auth.2fa')</h1>

        <div class="f-que" style="margin-bottom: 40px;">@lang('auth.2fa_notice')</div>

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
        <button class="btn btn__submit">@lang('auth.login')</button>
    </form>
</x-guest-layout>