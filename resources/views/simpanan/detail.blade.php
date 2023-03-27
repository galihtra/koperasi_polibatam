@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Simpanan Anggota Koperasi</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Total Simpanan Anggota Koperasi per Bulan</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No. Anggota</th>
                                        <th>Nama</th>
                                        <th>Januari</th>
                                        <th>Februari</th>
                                        <th>Maret</th>
                                        <th>April</th>
                                        <th>Mei</th>
                                        <th>Juni</th>
                                        <th>Juli</th>
                                        <th>Agustus</th>
                                        <th>September</th>
                                        <th>Oktober</th>
                                        <th>November</th>
                                        <th>Desember</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($total_simpanan_perbulan as $simpanan)
                                            <tr>
                                                <td>{{ $simpanan['no_anggota'] }}</td>
                                                <td>{{ $simpanan['nama'] }}</td>
                                                <td>Rp.
                                                    {{ number_format($simpanan['total_simpanan_januari'], 0, ',', '.') }}
                                                </td>
                                                <td>Rp.
                                                    {{ number_format($simpanan['total_simpanan_februari'], 0, ',', '.') }}
                                                </td>
                                                <td>Rp. {{ number_format($simpanan['total_simpanan_maret'], 0, ',', '.') }}
                                                </td>
                                                <td>Rp. {{ number_format($simpanan['total_simpanan_april'], 0, ',', '.') }}
                                                </td>
                                                <td>Rp. {{ number_format($simpanan['total_simpanan_mei'], 0, ',', '.') }}
                                                </td>
                                                <td>Rp. {{ number_format($simpanan['total_simpanan_juni'], 0, ',', '.') }}
                                                </td>
                                                <td>Rp. {{ number_format($simpanan['total_simpanan_juli'], 0, ',', '.') }}
                                                </td>
                                                <td>Rp.
                                                    {{ number_format($simpanan['total_simpanan_agustus'], 0, ',', '.') }}
                                                </td>
                                                <td>Rp.
                                                    {{ number_format($simpanan['total_simpanan_september'], 0, ',', '.') }}
                                                </td>
                                                <td>Rp.
                                                    {{ number_format($simpanan['total_simpanan_oktober'], 0, ',', '.') }}
                                                </td>
                                                <td>Rp.
                                                    {{ number_format($simpanan['total_simpanan_november'], 0, ',', '.') }}
                                                </td>
                                                <td>Rp.
                                                    {{ number_format($simpanan['total_simpanan_desember'], 0, ',', '.') }}
                                                </td>
                                                <td>Rp.
                                                    {{ number_format(array_sum($simpanan) - intval($simpanan['no_anggota']) - intval($simpanan['nama']), 0, ',', '.') }}
                                                </td>


                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
