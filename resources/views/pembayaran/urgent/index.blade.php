@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
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
                            <p class="text-primary">Pencarian Peminjaman</p>
                            <form action="{{ route('pembayaran.urgent.index') }}" method="GET">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="status_pinjaman">Status Pinjaman</label>
                                        <select name="status_pinjaman" id="status_pinjaman" class="form-control">
                                            <option value="">Semua</option>
                                            <option value="Sudah Lunas">Sudah Lunas</option>
                                            <option value="Belum Lunas">Belum Lunas</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="nama">Nama Peminjam</label>
                                        <div class="input-group">
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                value="{{ request('nama') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <a href="{{ route('pembayaran.urgent.index') }}">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </span>
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Transaksi</th>
                                        <th scope="col">Nama Peminjam</th>
                                        <th scope="col">Total Pinjaman</th>
                                        <th scope="col">Jumlah Perbulan</th>
                                        <th scope="col">Sisa Pinjaman</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($loans as $loan)
                                        <tr>
                                            <td>{{ $loan->id }}</td>
                                            <td>{{ $loan->user->name }}</td>
                                            <td>@currency($loan->amount)</td>
                                            <td>@currency($loan->amount_per_month)</td>
                                            <td>@currency($loan->remaining_amount)</td>
                                            <td>
                                                @if ($loan->status_pinjaman == 'Sudah Lunas')
                                                    <span class="badge badge-success">{{ $loan->status_pinjaman }}</span>
                                                @else
                                                    <span class="badge badge-warning">{{ $loan->status_pinjaman }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('pembayaran.urgent.create', $loan->id) }}">
                                                    <button class="btn btn-primary" id="lihat-btn-calon">Cicilan</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">Tidak ada data peminjaman yang disetujui.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-lg-end mt-4">
                                {{ $loans->appends(request()->except('page'))->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
