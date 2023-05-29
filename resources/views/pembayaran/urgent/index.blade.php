@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Peminjaman Mendesak</h1>
        </div>
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card">

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="card-body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Transaksi</th>
                                        <th scope="col">Nama Peminjam</th>
                                        <th scope="col">Kebutuhan Pinjaman</th>
                                        <th scope="col">Total Pinjaman</th>
                                        <th scope="col">Jumlah Perbulan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loans as $loan)
                                        @if($loan->status == 'Disetujui')
                                            <tr>
                                                <td>{{ $loan->id }}</td>
                                                <td>{{ $loan->nama }}</td>
                                                <td>{{ $loan->jenis_pinjaman }}</td>
                                                <td> @currency($loan->amount)</td>
                                                <td>@currency($loan->amount_per_month)</td>
                                                <td>{{ $loan->status }}</td>
                                                <td>
                                                    <a href="">
                                                        <button class="btn btn-primary" id="lihat-btn-calon">Pembayaran</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
