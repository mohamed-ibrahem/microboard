<div class="collapse navbar-collapse" id="navbarSupportedContent">
    @if(config('microboard.view.enable_global_search'))
        @livewire('global-search')
    @else
        <h6 class="h2 d-inline-block mb-0 text-white">@yield('title')</h6>
@endif

<!-- Navbar links -->
    <ul class="navbar-nav align-items-center ml-md-auto px-0">
        <li class="nav-item d-xl-none">
            <!-- Sidenav toggler -->
            <div class="px-3 sidenav-toggler sidenav-toggler-dark"
                 data-action="sidenav-pin"
                 data-target="#sidenav-main"
            >
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </div>
        </li>

        @if (config('microboard.view.enable_global_search'))
            <li class="nav-item d-sm-none">
                <a class="nav-link" href="#" data-action="search-show"
                   data-target="#navbar-search-main">
                    <i class="ni ni-zoom-split-in"></i>
                </a>
            </li>
        @endif

        @livewire('notifications')
    </ul>
    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">
                <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                    <img alt="Username" src="#">
                </span>

                    <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 text-sm font-weight-bold">Username</span>
                    </div>
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
                </div>

                @include ('microboard::partials.user')
            </div>
        </li>
    </ul>
</div>
