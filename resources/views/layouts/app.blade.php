@extends('microboard::layouts.argon')

@section('argon-content')
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="main-side-nav">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                @include ('microboard::layouts.partials.logo')

                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
                         data-target="#main-side-nav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    @livewire ('sidebar-links')
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content">
        <!-- Top nav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                @include ('microboard::layouts.partials.navbar')
            </div>
        </nav>

        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-8 col-12">
                            @if(config('microboard.view.enable_global_search', true))
                                <h6 class="h2 d-inline-block mb-0 text-white">@yield('title')</h6>
                            @endif

                            @includeWhen(config('microboard.view.enable_breadcrumbs', true), 'microboard::layouts.partials.breadcrumb')
                        </div>
                        <div class="col-lg-4 col-12 text-right">
                            @yield('actions')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--6">
            @yield('content')

            <footer class="footer pt-0">
                <small class="d-block copyright text-center text-muted">
                    &copy; {{ date('Y') }}
                    {!! __('Built with :love By <a href="https://devnile.com" target="_blank">Devnile</a>', [
                        'love' => '<i class="fa fa-heart text-danger"></i>'
                    ]) !!}
                </small>
            </footer>
        </div>
    </div>
@endsection
