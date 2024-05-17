@section('title')
    @lang('auto-program.title')
@endsection

<x-app-layout>
    <div class="profile-row">
        <div class="soon-page-name">@lang('auto-program.title')</div>
        <div class="soon _auto">
            <img src="/assets/auto-bg-mobile.png" alt="auto" class="soon-pic _lg-hidden">
            <div class="soon-block">
                <div class="soon-title">@lang('general.in_development')</div>
                <p class="soon-text">@lang('general.in_development_description')</p>
            </div>
        </div>
    </div>
</x-app-layout>