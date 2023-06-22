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
                                <p>Jenis Pinjaman Mendesak: <strong>{{ $loan->jenis_pinjaman }}</strong></p>
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
                                @if ($loan->status == 'Ditolak')
                                    <p>Keterangan Tolak: <strong>{{ $loan->keterangan_tolak }}</strong></p>
                                @endif
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
                                            <a href="{{ asset('storage/' . $loan->up_ket) }}" download class="btn btn-info"
                                                style="position: absolute; top: 0;">Download</a>
                                            <img alt="image" src="{{ asset('storage/' . $loan->up_ket) }}"
                                                class="" width="300" height="300">
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <a href="{{ route('pinjamanan.urgent.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                                @if ($loan->status == 'Menunggu Bendahara')
                                    @if (auth()->user()->id_roles == 4)
                                        <form method="POST" action="{{ route('pinjaman.urgent.verifyBendahara', $loan) }}"
                                            class="d-inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <input type="submit" value="Verifikasi Bendahara" class="btn btn-primary">
                                        </form>
                                    @endif
                                @elseif ($loan->status == 'Menunggu Ketua')
                                    @if (auth()->user()->id_roles == 1)
                                        <form method="POST" action="{{ route('pinjaman.urgent.verifyKetua', $loan) }}"
                                            class="d-inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <input type="submit" value="Verifikasi Ketua" class="btn btn-primary">
                                        </form>
                                    @endif
                                @endif
                                @if ($loan->status == 'Menunggu Bendahara' || $loan->status == 'Menunggu Ketua')
                                    @if (auth()->user()->id_roles == 4 || auth()->user()->id_roles == 1)
                                        @if (!($loan->status == 'Menunggu Bendahara' && Auth::user()->is_ketua))
                                            <!-- Trigger/Open The Modal -->
                                            <button id="rejectButton" class="btn btn-danger ml-2">Tolak</button>

                                            <!-- The Modal -->
                                            <div id="rejectModal" class="modal">

                                                <!-- Modal content -->
                                                <div class="modal-content"
                                                    style="background-color: #fefefe; margin: auto; padding: 20px; border: 1px solid #888; width: 50%;">

                                                    <span class="close"
                                                        style="color: #aaa; float: right; font-size: 28px; font-weight: bold;">&times;</span>

                                                    <form method="POST" action="{{ route('pinjaman.urgent.reject', $loan) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group">
                                                            <label for="keterangan_tolak">Alasan penolakan:</label>
                                                            <textarea class="form-control @error('keterangan_tolak') is-invalid @enderror" id="keterangan_tolak"
                                                                name="keterangan_tolak" tabindex="1" minlength="3" required></textarea>
                                                            @error('keterangan_tolak')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    @endcanAny
                                @endif


                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Get the modal
        var modal = document.getElementById("rejectModal");

        // Get the button that opens the modal
        var btn = document.getElementById("rejectButton");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
