<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <span>
                    <img src="/assets/img/koperasi-polibatam.png.png" alt="" width="200">
                </span>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">
                <span>
                    <img src="/assets/img/logo-poltek.png" alt="" width="50">
                </span>
            </a>
        </div>
        <ul class="sidebar-menu">

            @cannot('admin')
                <li class="{{ Route::currentRouteName() === 'dashboard_anggota' ? 'active' : '' }}">
                    <a class="nav-link" href="/">
                        <i class="fas fa-fire"></i> <span>Dashboard</span>
                    </a>
                </li>
            @endcannot

            @can('admin')
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i
                            class="fas fa-fire"></i> <span>Dashboard</span></a></li>

                <li
                    class="{{ Request::is('users*') || Request::routeIs('simpanan.detail') && !Request::routeIs('users.show') && !Request::routeIs('users.candidate') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i>
                        <span>Anggota</span></a>
                </li>
                <li
                    class="{{ Request::is('users_candidate') || Request::route()->getName() == 'users.show' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('users.candidate') }}"><i class="fas fa-user"></i> <span>Calon
                            Anggota</span></a>
                </li>
                <li
                    class="{{ Request::is('simpanan*') && !Request::routeIs('simpanan.detail') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('simpanan.index') }}"><i class="fas fa-columns"></i> 
                        <span>Simpanan</span></a>
                </li>
            @endcan


            {{-- <li class="menu-header">Menu Admin</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Simpanan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li> --}}

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Documentation
                </a>
            </div>
    </aside>
</div>
