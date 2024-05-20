@section('title')
@lang('settings.title')
@endsection

<x-app-layout>

    <div class="settings__block">
        <div class="settings__block-title c-text-lt">Изменить пароль</div>
            
        @livewire('change-password')

    </div>
    

</x-app-layout>