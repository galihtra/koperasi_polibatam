@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Formulir Permohonan Pinjaman Mendesak</h1>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-12 ">


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

                        <div class="card-body">
                            <form method="POST" action="{{ route('pinjaman.urgent.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-0 mt-3">
                                    <label for="data_pribadi">
                                        <h6>
                                            <p>Catatan: <b class="text-danger">*</b></p>
                                        </h6>
                                        <h6>
                                            <ul class="list-unstyled">
                                                <li>1. Tidak dikenakan biaya apapun (bebas biaya admin dan bunga)</li>
                                                <li>2. Pinjaman ini untuk (Lingkari salah satu).
                                                    <ul>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                value="Duka Keluarga" name="flexRadioDefault"
                                                                id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Kematian Keluarga (Suami/Istri/Anak Kandung/Orang Tua
                                                                Kandung/Mertua)
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                value="Rawat Inap" name="flexRadioDefault"
                                                                id="flexRadioDefault2" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Rawat Inap 3 hari atau lebih (Suami/Istri/Anak Kandung)
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                value="Kecelakaan Serius" name="flexRadioDefault"
                                                                id="flexRadioDefault3" checked>
                                                            <label class="form-check-label" for="flexRadioDefault3">
                                                                Rawat Inap karena mendapat musibah kecelakaan lalu lintas
                                                                yang serius (Suami/Istri/Anak Kandung)
                                                            </label>
                                                        </div>
                                                    </ul>
                                                </li>
                                                <li>3. Data pendukung berupa kuitansi asli dari rumah sakit atau surat
                                                    keterangan kematian RT/RW serta fotokopi kartu keluarga harus disahkan
                                                    kepada KPb paling lambat 5 hari setelah masuk kerja.</li>
                                                <li>4. Apabila ketentuan pada item no.3 tidak dipenuhi, maka secara otomatis
                                                    bantuan ini dianggap pinjaman normal.</li>
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
                                            <input id="no_nik" type="text"
                                                class="form-control @error('no_nik') is-invalid @enderror" name="no_nik"
                                                tabindex="1" readonly value="{{ auth()->user()->no_ktp }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="alamat">Alamat Rumah <b class="text-danger">*</b></label>
                                            <input id="alamat" type="text"
                                                class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                                tabindex="1" readonly value="{{ auth()->user()->alamat_ktp }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama">Nama <b class="text-danger">*</b></label>
                                            <input id="nama" type="text" class="form-control" name="nama"
                                                tabindex="1" value="{{ Auth::user()->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_hp">No. Telp/HP <b class="text-danger">*</b></label>
                                            <input id="no_hp" type="text" class="form-control" name="no_hp"
                                                tabindex="1" value="{{ Auth::user()->no_hp }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="bagian">Bagian <b class="text-danger">*</b></label>
                                            <input id="bagian" type="text"
                                                class="form-control @error('bagian') is-invalid @enderror" name="bagian"
                                                tabindex="1" readonly value="{{ auth()->user()->divisi }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="dosen_staff">Status Karyawan<b class="text-danger">*</b></label>
                                            <input id="dosen_staff" type="text"
                                                class="form-control @error('dosen_staff') is-invalid @enderror"
                                                name="dosen_staff" tabindex="1" readonly
                                                value="{{ auth()->user()->stat_karyawan }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <label for="">
                                            <h6 style="color: #F2D230">Dengan ini mengajukan permohonan Pinjaman Normal
                                                sebagai berikut: </h6>
                                        </label>
                                        <h6 style="color: #F2D230; font-weight: bold; ">Nilai Pinjaman
                                        </h6>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="besar_pinjaman">Besar Pinjaman <b
                                                    class="text-danger">*</b></label>
                                            <input type="text" name="jumlah_text" id="jumlah_text"
                                                class="form-control" required autofocus
                                                placeholder="Masukkan Besar Pinjaman Anda">
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
                                            </select>
                                            @error('duration')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
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
                                            atas terhitung sejak peminjaman disetujui</p>
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
                                                class="form-control @error('no_rek') is-invalid @enderror" name="no_rek"
                                                tabindex="1" readonly value="{{ auth()->user()->no_rek_bni }}">
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
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                tabindex="1" readonly value="{{ auth()->user()->email }}">
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
                                        name="alasan_pinjam" tabindex="1" minlength="3" required autofocus
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
                                            <label for="up_ket" class="d-flex"><strong>Upload Data Pendukung atau Surat
                                                    Keterangan</strong>
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
            var amount = parseInt(document.getElementById('jumlah').value);
            var duration = parseInt(document.getElementById('duration').value);
            if (!isNaN(amount) && !isNaN(duration) && duration > 0) {
                var amountPerMonth = amount / duration;
                document.getElementById('amount_per_month').value = formatRupiah(amountPerMonth.toString(), 'Rp. ');
            }
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
