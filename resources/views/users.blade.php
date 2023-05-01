@extends('layouts.main')

@section('content')
    <section class="section">
        {{-- Header --}}
        <div class="section-header">
            <h1>Daftar Anggota Koperasi</h1>
        </div>

        {{-- Body --}}
        <div class="section-body">
            <div class="card">
                <div class="card-body table-responsive">
                    <form action="{{ route('users.index') }}" method="GET">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <!-- Input untuk search -->
                                    <input type="text" class="form-control" name="search"
                                        placeholder="Cari nama anggota atau nomor anggota" value="{{ request('search') }}">
                                    <!-- Tombol clear search -->
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <a
                                                onclick="document.getElementsByName('search')[0].value = ''; window.location.href='{{ route('users.index') }}'">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </span>
                                        <!-- Tombol search -->
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped table-responsive-lg" id="table1">
                        <thead>
                            <tr>
                                <th>Nomor Anggota</th>
                                <th>Nama</th>
                                <th></th>
                                <th>Total Simpanan</th>
                                <th></th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @php
                                    $total_simpanan = $user->simpanan()->sum('jumlah');
                                @endphp
                                <tr>
                                    <td>{{ $user->no_anggota }}</td>
                                    <td>
                                        {{ $user->name }}
                                        
                                    </td>
                                    <td>
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                    <td>
                                        Rp. {{ number_format($total_simpanan, 0, ',', '.') }}
                                        
                                    </td>
                                    <td>
                                        <a href="{{ route('simpanan.detail', $user->id) }}"
                                            class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                    <td>
                                        @if ($user->stat_akun == 'Aktif')
                                            <span class="badge bg-success text-white">{{ $user->stat_akun }}</span>
                                        @else
                                            <span class="badge bg-danger text-white">{{ $user->stat_akun }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-lg-end mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
