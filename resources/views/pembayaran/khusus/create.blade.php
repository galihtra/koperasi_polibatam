@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pembayaran Pinjaman Konsumtif Khusus</h1>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pembayaran Peminjaman</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <h6>Nama Peminjam:</h6>
                                    <p>{{ $loan->nama }}</p>
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
                            <form method="POST" action="{{ route('pembayaran.khusus.store') }}">
                                @csrf
                                <input type="hidden" name="peminjaman_id" value="{{ $loan->id }}">

                                @php
                                    $paidMonths = json_decode($loan->paid_months);
                                    $paymentDates = json_decode($loan->payment_dates, true);
                                @endphp

                                @for ($i = 1; $i <= $loan->duration; $i++)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $i }}"
                                            id="month{{ $i }}" name="months[]"
                                            {{ in_array($i, $paidMonths) ? 'checked disabled' : '' }}>
                                        <label class="form-check-label" for="month{{ $i }}">
                                            Pembayaran Bulan {{ $i }} - Rp.
                                            {{ number_format($loan->amount_per_month, 2, ',', '.') }}
                                            @if (in_array($i, $paidMonths))
                                                (Sudah Dibayar)
                                            @else
                                                @if ($loan->remaining_amount == 0)
                                                    (Sudah Lunas)
                                                @else
                                                    (Belum Dibayar)
                                                @endif
                                            @endif
                                            @if ($paymentDates && array_key_exists($i, $paymentDates))
                                                - [{{ \Carbon\Carbon::parse($paymentDates[$i])->format('d F Y') }}]
                                            @endif
                                        </label>
                                    </div>
                                @endfor


                                <div class="form-group mt-4">
                                    <a href="{{ route('pembayaran.khusus.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
