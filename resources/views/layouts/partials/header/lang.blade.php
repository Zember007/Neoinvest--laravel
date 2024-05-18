<form action="{{ route('switch-language') }}" method="POST" class="lang header__lang select dd"> 
    @csrf
    <input type="hidden" class="dd-input" value="en" name="locale"> 
    @foreach(array_keys(config('countries')) as $code) 
            @if(!in_array($code, config('interface.locales')))
                @continue 
            @endif
            <button data-value="{{ $code }}" type="submit" class="dd-item lang__control  @if($code == app()->getLocale()) active  @endif">{{ $code }}</button> 
    @endforeach
</form>