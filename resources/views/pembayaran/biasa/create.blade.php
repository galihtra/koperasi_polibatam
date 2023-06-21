@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pembayaran Pinjaman Konsumtif Biasa</h1>
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

                        @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
                            {{ session('error') }}
                        </div>
                        @endif

                        <div class="card-header">
                            <h4>Pembayaran Peminjaman</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <h6>Nama Peminjam:</h6>
                                    <p>{{ $loan->user->name }}</p>
                                </div>

                                <div class="col-sm-4">
                                    <h6>Tanggal Penyelesaian:</h6>
                                    <p>{{ \Carbon\Carbon::parse($loan->repayment_date)->format('d F Y') }}</p>
                                </div>

                                <div class="col-sm-4">
                                    <h6>Total Pinjaman:</h6>
                                    <p>@currency($loan->amount)</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6>Sisa Pinjaman:</h6>
                                    <p>@currency($loan->remaining_amount)</p>
                                </div>
                                <div class="col-sm-4">
                                    <h6>Total Perbulan:</h6>
                                    <p>@currency($loan->amount_per_month)</p>
                                </div>
                                <div class="col-sm-4">
                                    <h6>Sudah dibayarkan:</h6>
                                    <p>@currency($loan->total_paid_per_month)</p>
                                </div>
                            </div>
                            <hr>
                            <label for="#">
                                <h6 style="color: #F2D230">Riwayat Cicilan Pinjaman</h6>
                            </label>

                            {{-- Untuk melihat riwayat cicilan  --}}
                            @php
                                $riwayatCicilan = App\Models\CicilanPinjaman::where('id_pinjamanBiasa', $loan->id)->get();
                            @endphp
                            
                            <div class="card-body table-responsive">

                                @if ($riwayatCicilan->count() > 0)
                                <table class="table">
                                <!-- Tampilkan riwayat cicilan dalam tabel -->
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Jumlah Pembayaran</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($riwayatCicilan as $cicilan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($cicilan->tgl_bayar)->format('d F Y') }}</td>
                                            <td>@currency($cicilan->jumlah_bayar)</td>
                                            <td>{{ $cicilan->status }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <p>Tidak ada riwayat cicilan untuk pinjaman ini.</p>
                                @endif
                            </div>

                            <div class="form-group mt-4">
                                <a href="{{ route('pembayaran.biasa.mutasi') }}" class="btn btn-secondary">Kembali</a>
                                @if (auth()->user()->id_roles == 4 && $loan->status_pinjaman == 'Belum Lunas' && !($loan->amount == $loan->total_paid_per_month) && !($loan->remaining_amount == 0))
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CatatCicilan">Catat Cicilan</button>
                                @endif
                            </div>

                            <div class="modal fade" tabindex="-1" role="dialog" id="CatatCicilan" data-backdrop="false">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Mencatat Cicilan Pinjaman</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('pembayaran.biasa.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="id_pinjamanBiasa" value="{{ $loan->id }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <input id="status" type="text" class="form-control" value="Sudah Dibayar" name="status" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah_bayar">Angsuran per bulan</label>
                                                    <input id="jumlah_bayar" type="text" class="form-control" value="Rp. {{ number_format($loan->amount_per_month, 2, ',', '.') }}" name="jumlah_bayar" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_bayar">Tanggal Pembayaran</label>
                                                    <div class="input-group">
                                                        <input id="tgl_bayar" name="tgl_bayar" type="date" class="form-control @error('tgl_bayar') is-invalid @enderror">
                                                        @error('tgl_bayar')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
