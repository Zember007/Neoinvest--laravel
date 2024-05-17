<form wire:submit.prevent="update">
    <x-method-selector :is-single="true" :preferred-mode="$mode"/>

    <button class="btn btn__submit recovery-btn">
        @lang('general.save')
    </button>
</form>