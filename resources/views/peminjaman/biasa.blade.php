@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-12">

                    <div class="card card-primary" style="widows: 18rem;">
                        <div class="card-header justify-content-center">
                            <img src="assets/img/koperasi-polibatam.png.png" alt="logo" width="300">
                            {{-- <h4>Register</h4> --}}
                        </div>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session()->has('registerError'))
                            <div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
                                {{ session('registerError') }}
                            </div>
                        @endif

                        <div class="card-body">
                            <form method="POST" action="{{ route('pinjaman.biasa.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-0 mt-3">
                                    <label for="data_pribadi">
                                        <h6>
                                            <p>Catatan: <b class="text-danger">*</b></p>
                                            <ul class="list-unstyled">
                                                <li>1. Formulir ini dituju untuk pinjaman 3jt s/d 10 juta yang akan diangsur
                                                    maksimal 2 tahun</li>
                                                <li>2. Formulir ini wajib dilengkapi dengan ijazah asli dan transkip nilai
                                                    asli</li>
                                            </ul>
                                        </h6>
                                        <br>
                                        <h6 style="color: #F2D230">Saya yang bertanda tangan di bawah ini</h6>
                                    </label>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_nik">No.Anggota/NIK <b class="text-danger">*</b></label>
                                            <input id="no_nik" type="name"
                                                class="form-control @error('no_nik') is-invalid @enderror" 
                                                tabindex="1" name="no_nik" value="{{ auth()->user()->no_ktp }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="alamat">Alamat Rumah <b class="text-danger">*</b></label>
                                            <input id="alamat" type="name"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                tabindex="1" 
                                                value="{{ auth()->user()->alamat_ktp }}"
                                                 readonly name="alamat">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama">Nama <b class="text-danger">*</b></label>
                                            <input id="nama" type="name"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                tabindex="1" value="{{ auth()->user()->name }}"
                                                 readonly name="nama">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_hp">No. Telp/HP <b class="text-danger">*</b></label>
                                            <input id="no_hp" type="name"
                                                class="form-control @error('no_hp') is-invalid @enderror"
                                                tabindex="1"
                                                value="{{ auth()->user()->no_hp }}"
                                                placeholder="Masukkan No. Telp/HP Anda" readonly name="no_hp">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="bagian">Bagian <b class="text-danger">*</b></label>
                                            <input id="bagian" type="name"
                                                class="form-control @error('bagian') is-invalid @enderror" 
                                                tabindex="1" value="{{ auth()->user()->divisi }}"
                                                readonly name="bagian">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="dosen_staff">Status Karyawan <b class="text-danger">*</b></label>
                                            <input id="dosen_staff" type="text"
                                                class="form-control @error('dosen_staff') is-invalid @enderror"
                                                 tabindex="1" readonly
                                                value="{{ auth()->user()->stat_karyawan }}" name="dosen_staff">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label for="">
                                            <h6 style="color: #F2D230">Dengan ini mengajukan permohonan Pinjaman Normal
                                                sebagai berikut: </h6>
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="besar_pinjaman">Besar Pinjaman (Maksimal pinjaman 10 juta rupiah)<b class="text-danger">*</b></label>
                                            <input type="text" name="jumlah_text" id="jumlah_text" class="form-control"
                                                required autofocus placeholder="Masukkan Besar Pinjaman Anda">
                                            <input type="hidden" name="jumlah" id="jumlah">
                                        </div>
                                        @error('jumlah')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="duration">Angsuran Dibayarkan/bln <b
                                                class="text-danger">*</b></label>

                                        <select id="duration" name="duration"
                                            class="form-control @error('duration') is-invalid @enderror" required>
                                            <option value="">Pilih Angsuran Perbulan</option>
                                            @for ($i = 1; $i <= 24; $i++)
                                                <option value="{{ $i }}" {{ old('duration') == $i ? 'selected' : '' }}>{{ $i }} bulan</option>
                                            @endfor
                                        </select>
                                        @error('duration')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Bunga dan Biaya Administrasi --}}
                                <div class="row">
                                    
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group input-group mb-3">
                                            <label for="biayaBunga_id">Bunga <b class="text-danger">*</b></label>
                                            <div class="input-group mb-3">
                                                <input id="biayaBunga_id" name="biayaBunga_id" type="text" class="form-control" placeholder="#" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $biayaBungaBiasa->nilai }}" readonly>
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="biayaAdmin_id">Biaya Administrasi<b class="text-danger">*</b></label>
                                            <div class="input-group mb-3">
                                                <input id="biayaAdmin_id" name="biayaAdmin_id" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $biayaAdmin->nilai }}" readonly>
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="amount_per_month">Angsuran per bulan:</label>
                                            <input type="text" id="amount_per_month" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                

                                <label for="">
                                    <h6>
                                        <p>Saya memberikan kuasa penuh kepada Payroll Politeknik Negeri Batam untuk
                                            melakukan pemotongan gaji saya sebesar angsuran bulanan yang telah saya pilih di
                                            atas terhitung peminjaman disetujui</p>
                                    </h6>
                                </label>

                                <label for="">
                                    <h6 style="color: #F2D230">Keterangan</h6>
                                </label>

                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_rek">Nomor Rekening Pencairan Pinjaman <b
                                                class="text-danger">*</b></label>
                                            <input id="no_rek" type="number"
                                                class="form-control @error('no_rek') is-invalid @enderror"
                                                tabindex="1" value="{{ auth()->user()->no_rek_bni }}"
                                                readonly name="no_rek">
                                            @error('no_rek')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Alamat Email Pemberitahuan Pencairan Pinjaman <b
                                                class="text-danger">*</b></label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            tabindex="1" readonly value="{{ auth()->user()->email }}" name="email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alasan_pinjam">Alasan Peminjaman <b class="text-danger">*</b></label>
                                    <textarea id="alasan_pinjam" style="height: 90px;" class="form-control @error('alasan_pinjam') is-invalid @enderror"
                                        name="alasan_pinjam" tabindex="1" minlength="3" required
                                        placeholder="Masukkan Alasan Peminjaman Anda">{{ old('alasan_pinjam') }}</textarea>
                                </div>

                                <div class="form-group mb-0 mt-3">
                                    <label for="data_pribadi">
                                        <h6 style="color: #F2D230">Upload File</h6>
                                    </label>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="signature" class="d-flex"><strong>Tanda Tangan</strong></label>
                                            <div
                                                style="position: relative; width: 398px; height: 198px; border: #F2D230 solid 2px;">
                                                <canvas id="canvas" width="398" height="198"></canvas>
                                            </div>
                                            <input type="hidden" name="signature" id="signature">
                                            <button type="button" class="btn btn-secondary mt-2"
                                                id="clear-signature">Hapus Tanda Tangan</button>
                                            @error('ttd')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="up_ket" class="d-flex"><strong>Upload Data Pendukung atau Surat Keterangan</strong>
                                                <b class="text-danger">*</b></label>
                                            <input id="up_ket" type="file"
                                                class="form-control @error('up_ket') is-invalid @enderror" name="up_ket"
                                                tabindex="1" required>

                                            @error('up_ket')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> 


                                <button id="submit" type="submit" class="btn btn-primary btn-lg float-lg-right">
                                    Kirim
                                </button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    
    <script type="text/javascript">
        var rupiah = document.getElementById('jumlah_text');
        rupiah.addEventListener('keyup', function(e) {
            rupiah.value = formatRupiah(this.value, 'Rp. ');
            document.getElementById('jumlah').value = parseRupiahToNumber(rupiah.value);
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function parseRupiahToNumber(rupiah) {
            return parseInt(rupiah.replace(/[^,\d]/g, '').toString());
        }

        var amount = document.getElementById('jumlah');
        var duration = document.getElementById('duration');
        var amount_per_month = document.getElementById('amount_per_month');

        duration.addEventListener('change', function() {
            var amount_value = parseRupiahToNumber(amount.value);
            amount_per_month.value = amount_value / parseInt(duration.value);
        });

        document.getElementById("duration").addEventListener("change", function() {
        var amount = parseFloat(document.getElementById('jumlah').value);
        var duration = parseInt(document.getElementById('duration').value);
        var bunga = parseFloat(document.getElementById('biayaBunga_id').value);
        var admin = parseFloat(document.getElementById('biayaAdmin_id').value);
        
        var amountPerMonth = (amount + ((amount * bunga) / 100 ) + ((amount * admin)) / 100 ) / duration;
        // Pembulatan ke atas
        amountPerMonth = Math.ceil(amountPerMonth);
        
        document.getElementById('amount_per_month').value = formatRupiah(amountPerMonth.toString(), 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

        window.addEventListener('DOMContentLoaded', (event) => {
            const canvas = document.getElementById('canvas');
            const signaturePad = new SignaturePad(canvas);

            document.getElementById('clear-signature').addEventListener('click', function() {
                signaturePad.clear();
            });

            document.getElementById('submit').addEventListener('click', function() {
                const signatureInput = document.getElementById('signature');
                signatureInput.value = signaturePad.toDataURL();
            });
        });
    </script>
@endsection