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
                        <div class="form-group">
                            <label for="jumlah_bayar">Jumlah Bayar</label>
                            <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
