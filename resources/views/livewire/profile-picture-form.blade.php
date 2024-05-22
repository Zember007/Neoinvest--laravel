<div class="set-row set-avatar__wrapper">
    <div class="set-avatar"
        style="background-image: url('{{ $this->user->profile_photo_url }}');background-size: cover;background-position: center;">
    </div>
    <div class="set-block _column">
        <div class="set-subtitle">@lang('settings.profile_picture')</div>
        <div class="set-row set-avatar-btns" x-data>
            <input type="file" wire:model="photo" x-ref="photo" style="display: none">
            <button class="btn set-file-btn btn_blue _upload" @click="$refs.photo.click()" wire:loading.attr="disabled">
                @lang('settings.upload_photo')
            </button>
            @if ($this->user->profile_photo_path)
                <button class="btn set-file-btn btn_gray" wire:click="deletePhoto" wire:loading.attr="disabled">
                    @lang('settings.delete_photo')
                </button>
            @endif
        </div>
        <div class="set-desc">
            @error('photo') <span style="color: #ff1a1a">{{ $message }}</span> <br> @enderror
            @lang('settings.max_size') <br>
            @lang('settings.max_dim')
        </div>
    </div>
</div>