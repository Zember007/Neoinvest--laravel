<label class="element-blur input-file account-info__photo">
     <input type="file" wire:model="photo" name="user_photo" hidden>
     <span class="input-file__inner">
          <span class="input-file__image"> 
          @if ($this->user->profile_photo_path)
               <img src='{{ $this->user->profile_photo_url }}' alt="alt" class="img-crop">
          @else
               <img src='/img/new/icons/icon-user-image.svg' alt="alt" class="img-crop">
          @endif
          </span>
          <span class="input-file__add">+</span>
     </span>
</label>