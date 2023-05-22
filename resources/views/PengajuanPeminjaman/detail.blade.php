@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Pinjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    @if (!auth()->user()->admin)
                        <a href="/">Dashboard</a>
                    @else
                        <a href="/dashboard">Dashboard</a>
                    @endif
                </div>
                <div class="breadcrumb-item">Detail Pinjaman</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Peminjaman</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <div>
                                <p>Jenis Pinjaman Mendesak: <strong>{{ $loan->jenis_pinjaman }}</strong></p>
                                <p>Nama Anggota: <strong>{{ $loan->nama }}</strong></p>
                                <p>Nomor Anggota / NIK: <strong>{{ $loan->no_nik }}</strong></p>
                                <p>Bagian: <strong>{{ $loan->bagian }}</strong></p>
                                <p>Dosen atau Staff: <strong>{{ $loan->dosen_staff }}</strong></p>
                                <p>Alamat: <strong>{{ $loan->alamat }}</strong></p>
                                <p>No Telp/HP: <strong>{{ $loan->no_hp }}</strong></p>
                                <p>Total Pinjaman: <strong>@currency($loan->amount)</strong></p>
                                <p>Status: <strong>{{ $loan->status }}</strong></p>
                                <p>Tanggal Akhir Pelunasan: <strong>{{ $loan->repayment_date }}</strong></p>
                                <p>Nomor Rekening: <strong>{{ $loan->no_rek }}</strong></p>
                                <p>email: <strong>{{ $loan->email }}</strong></p>
                                <p>Alasan Peminjaman: <strong>{{ $loan->alasan_pinjam }}</strong></p>
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="amount_per_month">Jumlah per bulan:</label>
                                            <input type="text" name="amount_per_month" id="amount_per_month"
                                                class="form-control"
                                                value="{{ 'Rp. ' . number_format($loan->amount_per_month, 2, ',', '.') }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    @if ($loan->ttd)
                                        <div style="position: relative; margin-right: 40px;">
                                            <a href="{{ asset('storage/' . $loan->ttd) }}" download class="btn btn-info"
                                                style="position: absolute; top: 0;">Download</a>
                                            <img alt="image" src="{{ asset('storage/' . $loan->ttd) }}" class=""
                                                width="300" height="300">
                                        </div>
                                    @endif

                                    @if ($loan->up_ket)
                                        <div style="position: relative;">
                                            <a href="{{ asset('storage/' . $loan->up_ket) }}" download
                                                class="btn btn-info" style="position: absolute; top: 0;">Download</a>
                                            <img alt="image" src="{{ asset('storage/' . $loan->up_ket) }}"
                                                class="" width="300" height="300">
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
