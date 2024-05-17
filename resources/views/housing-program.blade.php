@section('title')
    @lang('housing-program.title')
@endsection

<x-app-layout>
    <div class="profile-row">
        <div class="soon-page-name">@lang('housing-program.title')</div>
        <div class="soon _housing">
            <img src="/assets/housing-bg-mobile.png" alt="housing" class="soon-pic _lg-hidden">
            <div class="soon-block">
                <div class="soon-title">@lang('general.in_development')</div>
                <p class="soon-text">@lang('general.in_development_description')</p>
            </div>
        </div>
    </div>
</x-app-layout>