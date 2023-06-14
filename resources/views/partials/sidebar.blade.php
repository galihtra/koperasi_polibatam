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

            <li class="menu-header">MENU ANGGOTA</li>
           
            <li class="{{ Route::currentRouteName() === 'dashboard_anggota' ? 'active' : '' }}">
                <a class="nav-link" href="/">
                    <i class="fas fa-fire"></i> <span>Beranda Saya</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-credit-card"></i><span>Pengajuan Pinjaman</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('form.pinjaman.biasa') }}">Konsumtif Biasa</a></li>
                  <li><a class="nav-link" href="{{ route('form.pinjaman.khusus') }}">Konsumtif Khusus</a></li>
                  <li><a class="nav-link" href="{{ route('form.pinjaman.urgent') }}">Mendesak</a></li>
                </ul>
            </li>

            <li class="menu-header">PANEL KONTROL</li>

            @canAny(['admin','ketua','pengawas'])
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="/dashboard"><i class="fas fa-tv"></i><span>Beranda Admin</span></a>
                </li>
            @endcanAny

            @canAny(['admin','ketua'])
                <li class="{{ Request::is('users') && !Request::routeIs('users.candidate') || Request::routeIs('simpanan.detail') || Request::routeIs('users.detail') && !Request::routeIs('users.show') && !Request::routeIs('users.candidate') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i>
                        <span>Anggota</span></a>
                </li>
            @endcanAny  

            @canAny(['admin','ketua'])
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

            @canAny(['admin','bendahara'])
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cash-register"></i><span>Cicilan Pinjaman</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('pembayaran.biasa.index') }}">Konsumtif Biasa</a></li>
                  <li><a class="nav-link" href="{{ route('pembayaran.khusus.index') }}">Konsumtif Khusus</a></li>
                  <li><a class="nav-link" href="{{ route('pembayaran.urgent.index') }}">Mendesak</a></li>
                </ul>
              </li>
            @endcanAny

            @canAny(['admin','bendahara','kepalaBagian','sdm','pengawas','ketua'])
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-invoice-dollar"></i><span>Verifikasi Pinjaman</span></a>
                <ul class="dropdown-menu">
                    @canAny(['admin','bendahara','pengawas','ketua'])
                    <li><a class="nav-link" href="{{ route('pinjamanan.biasa.index') }}">Konsumtif Biasa</a></li>
                    @endcanAny
                    @canAny(['admin','bendahara','pengawas','ketua','kepalaBagian','sdm'])
                    <li><a class="nav-link" href="{{ route('pinjamanan.khusus.index') }}">Konsumtif Khusus</a></li>
                    @endcanAny
                    @canAny(['admin','bendahara','ketua'])
                    <li><a class="nav-link" href="{{ route('pinjamanan.urgent.index') }}">Mendesak</a></li>
                    @endcanAny
                </ul>
            </li>
            @endcanAny
            

            @canAny(['admin','bendahara'])
            <li class="{{ Request::routeIs('persentase.bunga.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('persentase.bunga.index') }}"><i class="fas fa-coins"></i>
                    <span>Biaya Bunga Pinjaman</span></a>
            </li>
            @endcanAny
              
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
