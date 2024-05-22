<button type="button"
        class="btn btn-small btn-fill-white header__controls-btn"
        wire:click="requestCode"
        wire:loading.attr="disabled"
        x-data="timer($wire.cooldown, 60)"
        x-init="init()"
        @cooldown-updated.window="reset()"
        :disabled="remaining > 0"
>
    <span x-text="time().minutes + ':' + time().seconds" x-show="remaining > 0"></span>
    <span x-show="remaining == 0">Запросить код</span>
</button>