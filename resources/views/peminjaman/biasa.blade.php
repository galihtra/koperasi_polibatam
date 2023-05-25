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
                            <form method="post" action="{{ route('pinjaman.biasa.store') }}" enctype="multipart/form-data">
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
                                                class="form-control @error('no_nik') is-invalid @enderror" name="no_nik"
                                                tabindex="1" required autofocus value="{{ old('no_nik') }}"
                                                placeholder="Masukkan Nomor Anggota/NIK Anda">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="alamat">Alamat Rumah <b class="text-danger">*</b></label>
                                            <input id="alamat" type="name"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                name="alamat" tabindex="1" required autofocus
                                                value="{{ old('alamat') }}"
                                                placeholder="Masukkan Alamat Rumah Anda">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama">Nama <b class="text-danger">*</b></label>
                                            <input id="nama" type="name"
                                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                tabindex="1" required autofocus value="{{ old('nama') }}"
                                                placeholder="Masukkan Nama Anda">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_hp">No. Telp/HP <b class="text-danger">*</b></label>
                                            <input id="no_hp" type="name"
                                                class="form-control @error('no_hp') is-invalid @enderror"
                                                name="no_hp" tabindex="1" required autofocus
                                                value="{{ old('no_hp') }}"
                                                placeholder="Masukkan No. Telp/HP Anda">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="bagian">Bagian <b class="text-danger">*</b></label>
                                            <input id="bagian" type="name"
                                                class="form-control @error('bagian') is-invalid @enderror" name="bagian"
                                                tabindex="1" required autofocus value="{{ old('bagian') }}"
                                                placeholder="Masukkan Bagian Anda">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="dosen_staff">Dosen / Staff <b class="text-danger">*</b></label>
                                            <select id="dosen_staff" name="dosen_staff"
                                                class="form-control @error('dosen_staff') is-invalid @enderror"
                                                tabindex="1" required autofocus>
                                                <option value="" disabled selected>Pilih Dosen/Staff</option>
                                                <option value="Dosen"
                                                    {{ old('dosen_staff') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                                <option value="Staff"
                                                    {{ old('dosen_staff') == 'Staff' ? 'selected' : '' }}>Staff</option>
                                            </select>
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
                                            <label for="besar_pinjaman">Besar Pinjaman <b class="text-danger">*</b></label>
                                            <input type="text" name="jumlah_text" id="jumlah_text" class="form-control"
                                                required autofocus placeholder="Masukkan Besar Pinjaman Anda">
                                            <input type="hidden" name="jumlah" id="jumlah">
                                        </div>
                                        @error('jumlah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="duration">Angsuran Dibayarkan/bln <b
                                                class="text-danger">*</b></label>

                                        <select id="duration" name="duration"
                                            class="form-control @error('duration') is-invalid @enderror" required>
                                            <option value="">Pilih Angsuran Perbulan</option>
                                            <option value="1" {{ old('duration') == 1 ? 'selected' : '' }}>1
                                                bulan</option>
                                            <option value="2" {{ old('duration') == 2 ? 'selected' : '' }}>2
                                                bulan</option>
                                            <option value="3" {{ old('duration') == 3 ? 'selected' : '' }}>3
                                                bulan</option>
                                            <option value="4" {{ old('duration') == 4 ? 'selected' : '' }}>4
                                                bulan</option>
                                            <option value="5" {{ old('duration') == 5 ? 'selected' : '' }}>5
                                                bulan</option>
                                            <option value="6" {{ old('duration') == 6 ? 'selected' : '' }}>6
                                                bulan</option>
                                            <option value="7" {{ old('duration') == 7 ? 'selected' : '' }}>7
                                                bulan</option>
                                            <option value="8" {{ old('duration') == 8 ? 'selected' : '' }}>8
                                                bulan</option>
                                            <option value="9" {{ old('duration') == 9 ? 'selected' : '' }}>9
                                                bulan</option>
                                            <option value="10" {{ old('duration') == 10 ? 'selected' : '' }}>10
                                                bulan</option>
                                            <option value="11" {{ old('duration') == 11 ? 'selected' : '' }}>11
                                                bulan</option>
                                            <option value="12" {{ old('duration') == 12 ? 'selected' : '' }}>12
                                                bulan</option>
                                             <option value="13" {{ old('duration') == 13 ? 'selected' : '' }}>13
                                                bulan</option>
                                            <option value="14" {{ old('duration') == 14 ? 'selected' : '' }}>14
                                                bulan</option>
                                            <option value="15" {{ old('duration') == 15 ? 'selected' : '' }}>15
                                                bulan</option>
                                            <option value="16" {{ old('duration') == 16 ? 'selected' : '' }}>16
                                                bulan</option>
                                            <option value="17" {{ old('duration') == 17 ? 'selected' : '' }}>17
                                                bulan</option>
                                            <option value="18" {{ old('duration') == 18 ? 'selected' : '' }}>18
                                                bulan</option>
                                            <option value="19" {{ old('duration') == 19 ? 'selected' : '' }}>19
                                                bulan</option>
                                            <option value="20" {{ old('duration') == 20 ? 'selected' : '' }}>20
                                                bulan</option>
                                            <option value="18" {{ old('duration') == 21 ? 'selected' : '' }}>21
                                                bulan</option>
                                            <option value="22" {{ old('duration') == 22 ? 'selected' : '' }}>22
                                                bulan</option>
                                            <option value="23" {{ old('duration') == 23 ? 'selected' : '' }}>23
                                                bulan</option>
                                            <option value="24" {{ old('duration') == 24 ? 'selected' : '' }}>24
                                                bulan</option>
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
                                    
                                    {{-- <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group input-group mb-3">
                                            <label for="#">Bunga <b class="text-danger">*</b></label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="0.9" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                                                <span class="input-group-text" id="basic-addon2">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="#">Biaya Administrasi<b class="text-danger">*</b></label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="2" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                                                <span class="input-group-text" id="basic-addon2">%</span>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="amount_per_month">Jumlah per bulan:</label>
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
                                            <input id="no_rek" type="name"
                                                class="form-control @error('no_rek') is-invalid @enderror"
                                                name="kelu_ktp" tabindex="1" required autofocus
                                                value="{{ old('no_rek') }}"
                                                placeholder="Masukkan Nomor Rekening Pencairan Pinjaman Anda">

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
                                            <input id="email" type="name"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" tabindex="1" required autofocus
                                                value="{{ old('email') }}"
                                                placeholder="Masukkan Alamat Email Pemberitahuan Pencairan Pinjaman Anda">

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
                                    <textarea id="alasan_pinjam" style="height: 90px;"
                                        class="form-control @error('alasan_pinjam') is-invalid @enderror"
                                        name="alasan_pinjam" tabindex="1" required autofocus
                                        value="{{ old('alasan_pinjam') }}" placeholder="Masukkan Alasan Peminjaman Anda">{{ old('alasan_pinjam') }}</textarea>

                                    @error('alasan_pinjam')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-0 mt-3">
                                    <label for="data_pribadi">
                                        <h6 style="color: #F2D230">Upload File</h6>
                                    </label>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="ttd" class="d-flex"><strong>Upload Nama dan Tanda
                                                    Tangan</strong> <b class="text-danger">*</b></label>
                                            <input id="ttd" type="file"
                                                class="form-control @error('ttd') is-invalid @enderror" name="ttd"
                                                tabindex="1" required autofocus>

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
                                                tabindex="1" required autofocus>

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
        var amountPerMonth = amount / duration;
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

    
    </script>
@endsection