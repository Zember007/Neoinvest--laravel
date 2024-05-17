<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @foreach(config('admin.sidebar') as $item => $icon)
                @can("admin_view_". Str::replace('-', '_', $item))
                    <li class="nav-item">
                        <a href="{{ route("admin.$item.index") }}"
                           class="nav-link @if(request()->routeIs("admin.$item.*")) active @endif"
                        >
                            <i class="nav-icon fas {{ $icon }}"></i>
                            <p>
                                @lang("$item.title")
                            </p>
                        </a>
                    </li>
                @endcan
            @endforeach
            <li class="nav-item">
                <a href="{{ route('logout') }}"
                   class="nav-link"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>@lang('general.logout')</p>
                </a>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div>