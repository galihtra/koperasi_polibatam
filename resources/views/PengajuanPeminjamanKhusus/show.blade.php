@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Pinjaman Anggota Koperasi</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Peminjaman Anggota Koperasi</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <div>
                                <p>Nama Anggota: <strong>{{ $loan->user->name }}</strong></p>
                                <p>Nomor Anggota / NIK: <strong>{{ $loan->user->no_ktp }}</strong></p>
                                <p>Bagian: <strong>{{ $loan->user->divisi }}</strong></p>
                                <p>Status Karyawan: <strong>{{ $loan->user->stat_karyawan }}</strong></p>
                                @if($loan->user->alamat_ktp)
                                    <p>Alamat: <strong>{{ $loan->user->alamat_ktp }}</strong></p>
                                @elseif($loan->user->alamat_pri)
                                    <p>Alamat: <strong>{{ $loan->user->alamat_pri }}</strong></p>
                                @else
                                    <p>Alamat: <strong>Alamat tidak tersedia</strong></p>
                                @endif
                                <p>No Telp/HP: <strong>{{ $loan->user->no_hp }}</strong></p>
                                <p>Total Pinjaman: <strong>@currency($loan->amount)</strong></p>
                                <p>Status: <strong>{{ $loan->status }}</strong></p>
                                <p>Tanggal Akhir Pelunasan: <strong>{{ $loan->repayment_date }}</strong></p>
                                <p>Nomor Rekening: <strong>{{ $loan->user->no_rek_bni }}</strong></p>
                                <p>email: <strong>{{ $loan->user->email }}</strong></p>
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
                            <div class="d-flex align-items-center mt-3">
                                <a href="{{ route('pinjamanan.khusus.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                                @if ($loan->status == 'Menunggu')
                                    <form method="POST" action="{{ route('pinjaman.urgent.verify', $loan) }}"
                                        class="d-inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <input type="submit" value="Setujui" class="btn btn-primary">
                                    </form>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
