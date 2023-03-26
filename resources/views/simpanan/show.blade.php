@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Simpanan Anggota Koperasi</h1>
        </div>
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No. Anggota</th>
                                    <td>{{ $simpanan->user->no_anggota }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $simpanan->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Simpanan</th>
                                    <td>{{ $simpanan->jenis_simpanan }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah</th>
                                    <td>Rp. {{ number_format($simpanan->jumlah, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ date('d/m/Y', strtotime($simpanan->tanggal)) }}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{ $simpanan->keterangan ?? '-' }}</td>
                                </tr>
                            </table>
                            <a href="{{ route('simpanan.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
