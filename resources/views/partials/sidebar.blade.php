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
                <a class="nav-link" href="{{ route('dashboard_anggota') }}">
                    <i class="fas fa-fire"></i> <span>Beranda Saya</span>
                </a>
            </li>

            <li class="nav-item dropdown{{ in_array(Route::currentRouteName(), ['form.pinjaman.biasa', 'form.pinjaman.khusus', 'form.pinjaman.urgent']) ? ' active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-credit-card"></i><span>Pengajuan Pinjaman</span></a>
                <ul class="dropdown-menu {{ in_array(Route::currentRouteName(), ['form.pinjaman.urgent', 'form.pinjaman.biasa', 'form.pinjaman.khusus']) ? 'show' : '' }}">
                    <li class="{{ Route::currentRouteName() === 'form.pinjaman.biasa' ? 'active' : '' }}"><a class="nav-link" href="{{ route('form.pinjaman.biasa') }}">Konsumtif Biasa</a></li>
                    <li class="{{ Route::currentRouteName() === 'form.pinjaman.khusus' ? 'active' : '' }}"><a class="nav-link" href="{{ route('form.pinjaman.khusus') }}">Konsumtif Khusus</a></li>
                    <li class="{{ Route::currentRouteName() === 'form.pinjaman.urgent' ? 'active' : '' }}"><a class="nav-link" href="{{ route('form.pinjaman.urgent') }}">Mendesak</a></li>
                </ul>
            </li>
            
            <li class="nav-item dropdown{{ in_array(Route::currentRouteName(), ['pembayaran.biasa.mutasi', 'pembayaran.khusus.mutasi', 'pembayaran.urgent.mutasi']) ? ' active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-history"></i><span>Mutasi Pinjaman</span></a>
                <ul class="dropdown-menu {{ in_array(Route::currentRouteName(), ['pembayaran.urgent.mutasi', 'pembayaran.biasa.mutasi', 'pembayaran.khusus.mutasi']) ? 'show' : '' }}">
                    <li class="{{ Route::currentRouteName() === 'pembayaran.biasa.mutasi' ? 'active' : '' }}"><a class="nav-link" href="{{ route('pembayaran.biasa.mutasi') }}">Konsumtif Biasa</a></li>
                    <li class="{{ Route::currentRouteName() === 'pembayaran.khusus.mutasi' ? 'active' : '' }}"><a class="nav-link" href="{{ route('pembayaran.khusus.mutasi') }}">Konsumtif Khusus</a></li>
                    <li class="{{ Route::currentRouteName() === 'pembayaran.urgent.mutasi' ? 'active' : '' }}"><a class="nav-link" href="{{ route('pembayaran.urgent.mutasi') }}">Mendesak</a></li>
                </ul>
            </li>
            
            @if (auth()->user()->id_roles == 1 || auth()->user()->id_roles == 2 || auth()->user()->id_roles == 3 || auth()->user()->id_roles == 4 || auth()->user()->id_roles == 5)
            <li class="menu-header">PANEL KONTROL</li>
            @endif


            @if (auth()->user()->id_roles == 1 || auth()->user()->id_roles == 5)
            {{-- @canAny(['admin','ketua','pengawas']) --}}
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="/dashboard"><i class="fas fa-tv"></i><span>Beranda Admin</span></a>
                </li>
            {{-- @endcanAny --}}
            @endif

            @if (auth()->user()->id_roles == 1) {{-- id_roles : 1 (Ketua) --}}
                <li class="{{ Request::is('users') && !Request::routeIs('users.candidate') || Request::routeIs('simpanan.detail') || Request::routeIs('users.detail') && !Request::routeIs('users.show') && !Request::routeIs('users.candidate') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i>
                        <span>Anggota</span></a>
                </li>
            @endif

            @if (auth()->user()->id_roles == 1) {{-- id_roles : 1 (Ketua) --}}
                <li class="{{ Request::routeIs('users.candidate') || Request::route()->getName() == 'users.show' && !Request::routeIs('simpanan.detail') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('users.candidate') }}"><i class="fas fa-user-plus"></i> <span>Calon
                            Anggota</span></a>
                </li>
            @endif

            @if (auth()->user()->id_roles == 4) {{-- id_roles : 4 (Bendahara) --}}
                <li class="{{ Request::is('simpanan*') && !Request::routeIs('simpanan.detail') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('simpanan.index') }}"><i class="fas fa-piggy-bank"></i>
                        <span>Simpanan</span></a>
                </li>
            @endif

            @if (auth()->user()->id_roles == 4) {{-- id_roles : 4 (Bendahara) --}}
                <li class="nav-item dropdown{{ in_array(Route::currentRouteName(), ['pembayaran.biasa.index', 'pembayaran.khusus.index', 'pembayaran.urgent.index']) ? ' active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cash-register"></i><span>Cicilan Pinjaman</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Route::currentRouteName() === 'pembayaran.biasa.index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('pembayaran.biasa.index') }}">Konsumtif Biasa</a></li>
                        <li class="{{ Route::currentRouteName() === 'pembayaran.khusus.index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('pembayaran.khusus.index') }}">Konsumtif Khusus</a></li>
                        <li class="{{ Route::currentRouteName() === 'pembayaran.urgent.index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('pembayaran.urgent.index') }}">Mendesak</a></li>
                    </ul>
                </li>
            @endif

            {{-- id_roles : 1 (Ketua), 2 (Kepala Bagian), 3 (SDM), 4 (Bendahara), 5(Pengawas) --}}
            @if (auth()->user()->id_roles == 1 || auth()->user()->id_roles == 2 || auth()->user()->id_roles == 3 || auth()->user()->id_roles == 4 || auth()->user()->id_roles == 5) 
                <li class="nav-item dropdown{{ in_array(Route::currentRouteName(), ['pinjamanan.biasa.index', 'pinjamanan.khusus.index', 'pinjamanan.urgent.index']) ? ' active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-invoice-dollar"></i><span>Verifikasi Pinjaman</span></a>
                    <ul class="dropdown-menu">
                    @if (auth()->user()->id_roles == 1 || auth()->user()->id_roles == 4 || auth()->user()->id_roles == 5)
                        <li class="{{ Route::currentRouteName() === 'pinjamanan.biasa.index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('pinjamanan.biasa.index') }}">Konsumtif Biasa</a></li>
                    @endif
                    @if (auth()->user()->id_roles == 1 || auth()->user()->id_roles == 2 || auth()->user()->id_roles == 3 || auth()->user()->id_roles == 4 || auth()->user()->id_roles == 5)
                        <li class="{{ Route::currentRouteName() === 'pinjamanan.khusus.index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('pinjamanan.khusus.index') }}">Konsumtif Khusus</a></li>
                    @endif
                    @if (auth()->user()->id_roles == 1 || auth()->user()->id_roles == 4)
                        <li class="{{ Route::currentRouteName() === 'pinjamanan.urgent.index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('pinjamanan.urgent.index') }}">Mendesak</a></li>
                    @endif
                    </ul>
                </li>
            @endcanAny

            @if (auth()->user()->id_roles == 4)
            <li class="{{ Request::routeIs('persentase.bunga.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('persentase.bunga.index') }}"><i class="fas fa-coins"></i>
                    <span>Biaya Bunga Pinjaman</span></a>
            </li>
            @endif
              
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
