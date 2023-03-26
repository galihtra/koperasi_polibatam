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
                <div class="card-body">
                    <table class="table table-striped table-responsive-lg" id="table1">
                        <thead>
                            <tr>
                                <th>Nomor Anggota</th>
                                <th>Nama</th>
                                <th>Total Simpanan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->no_anggota }}</td>
                                    <td>
                                        {{ $user->name }}
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                    <td>
                                        Rp. {{ number_format($user->total_simpanan) }}
                                        <a href="{{ route('users.show', $user->id) }}"
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
                </div>
            </div>
        </div>
    </section>
@endsection
