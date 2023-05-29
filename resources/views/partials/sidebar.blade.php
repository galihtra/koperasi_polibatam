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

            @if (!auth()->user()->is_ketua && !auth()->user()->is_admin && !auth()->user()->is_bendahara && !auth()->user()->is_pengawas)
                <li class="{{ Route::currentRouteName() === 'dashboard_anggota' ? 'active' : '' }}">
                    <a class="nav-link" href="/">
                        <i class="fas fa-fire"></i> <span>Dashboard</span>
                    </a>
                </li>
            @endif

            @canAny(['admin','ketua','pengawas'])
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="/dashboard"><i class="fas fa-home"></i>{{--<i class="fas fa-fire"></i>--}} <span>Dashboard</span></a>
                </li>
            @endcanAny

            @canAny(['admin','ketua'])

                <li class="{{ Request::is('users') && !Request::routeIs('users.candidate') || Request::routeIs('simpanan.detail') || Request::routeIs('users.detail') && !Request::routeIs('users.show') && !Request::routeIs('users.candidate') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i>
                        <span>Anggota</span></a>
                </li>
                <li class="{{ Request::routeIs('users.candidate') || Request::route()->getName() == 'users.show' && !Request::routeIs('simpanan.detail') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('users.candidate') }}"><i class="fas fa-user-plus"></i> <span>Calon
                            Anggota</span></a>
                </li>
            @endcanAny               

            @canAny(['admin','bendahara'])
                <li class="{{ Request::is('simpanan*') && !Request::routeIs('simpanan.detail') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('simpanan.index') }}"><i class="fas fa-piggy-bank"></i>
                        <span>Simpanan</span></a>
                </li>
            @endcanAny

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cash-register"></i><span>Pembayaran Pinjaman</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="peminjaman-konsumtif-biasa">Konsumtif Biasa</a></li>
                  <li><a class="nav-link" href="peminjaman-konsumtif-khusus">Konsumtif Khusus</a></li>
                  <li><a class="nav-link" href="{{ route('pembayaran.urgent.index') }}">Mendesak</a></li>
                </ul>
              </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-invoice-dollar"></i><span>Peminjaman</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('pinjamanan.biasa.index') }}">Konsumtif Biasa</a></li>
                  <li><a class="nav-link" href="{{ route('pinjamanan.khusus.index') }}">Konsumtif Khusus</a></li>
                  <li><a class="nav-link" href="{{ route('pinjamanan.urgent.index') }}">Mendesak</a></li>
                </ul>
              </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-credit-card"></i><span>Pengajuan Pinjaman</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('form.pinjaman.biasa') }}">Konsumtif Biasa</a></li>
                  <li><a class="nav-link" href="{{ route('form.pinjaman.khusus') }}">Konsumtif Khusus</a></li>
                  <li><a class="nav-link" href="{{ route('form.pinjaman.urgent') }}">Mendesak</a></li>
                </ul>
              </li>
              
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
                <a href="https://github.com/galihtra/koperasi_polibatam" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Documentation
                </a>
            </div>
    </aside>
</div>
