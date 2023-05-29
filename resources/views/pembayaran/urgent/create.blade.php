@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pembayaran Pinjaman Mendesak</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pembayaran.urgent.store') }}">
                        @csrf
                        <input type="hidden" name="peminjaman_id" value="{{ $loan->id }}">
                        
                        @for ($i = 1; $i <= $loan->duration; $i++)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $loan->amount_per_month }}" id="month{{ $i }}" name="months[]">
                                <label class="form-check-label" for="month{{ $i }}">
                                    Pembayaran Bulan {{ $i }} - Rp{{ $loan->amount_per_month }}
                                </label>
                            </div>
                        @endfor

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
