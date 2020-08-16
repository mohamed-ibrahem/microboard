<ul class="navbar-nav" wire:init="buildMenuItems">
    @foreach($links as $link)
        <li class="nav-item">
            <a class="nav-link" href="{{ $link['url'] }}">
                <i class="{{ $link['icon'] }}"></i>
                <span class="nav-link-text">{{ $link['text'] }}</span>
            </a>
        </li>
    @endforeach
</ul>
