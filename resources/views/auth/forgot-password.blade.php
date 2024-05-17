@section('title')
    @lang('auth.resetting_password')
@endsection

<x-guest-layout>
    <form action="{{ route('forgot-password.store') }}" method="POST" class="f">
        @csrf

        <h1 class="f-title">@lang('auth.resetting_password')</h1>

        <x-method-selector :is-single="false" :preferred-mode="'phone'"/>

        <button class="btn btn__submit" type="submit">@lang('auth.verify')</button>
        <div class="f-que">
            @lang('auth.recalled_password')
            <a href="{{ route('login') }}" class="f-que__link">@lang('auth.sign_in')</a>
        </div>
    </form>
</x-guest-layout>
