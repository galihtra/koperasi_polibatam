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
                            <form method="post" action="/register" enctype="multipart/form-data">
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
                                                                name="flexRadioDefault" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Kematian Keluarga (Suami/Istri/Anak Kandung/Orang Tua
                                                                Kandung/Mertua)
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Rawat Inap 3 hari atau lebih (Suami/Istri/Anak Kandung)
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
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
                                            <label for="no_ktp">No.Anggota/NIK <b class="text-danger">*</b></label>
                                            <input id="no_ktp" type="name"
                                                class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp"
                                                tabindex="1" required autofocus value="{{ old('no_ktp') }}"
                                                placeholder="Masukkan Nomor Anggota/NIK Anda">

                                            @error('no_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="masa_berlaku_ktp">Alamat Rumah <b class="text-danger">*</b></label>
                                            <input id="masa_berlaku_ktp" type="name"
                                                class="form-control @error('masa_berlaku_ktp') is-invalid @enderror"
                                                name="masa_berlaku_ktp" tabindex="1" required autofocus
                                                value="{{ old('masa_berlaku_ktp') }}"
                                                placeholder="Masukkan Alamat Rumah Anda">

                                            @error('masa_berlaku_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_ktp">Nama <b class="text-danger">*</b></label>
                                            <input id="no_ktp" type="name"
                                                class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp"
                                                tabindex="1" required autofocus value="{{ old('no_ktp') }}"
                                                placeholder="Masukkan Nama Anda">

                                            @error('no_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="masa_berlaku_ktp">No. Telp/HP <b class="text-danger">*</b></label>
                                            <input id="masa_berlaku_ktp" type="name"
                                                class="form-control @error('masa_berlaku_ktp') is-invalid @enderror"
                                                name="masa_berlaku_ktp" tabindex="1" required autofocus
                                                value="{{ old('masa_berlaku_ktp') }}"
                                                placeholder="Masukkan No. Telp/HP Anda">

                                            @error('masa_berlaku_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_ktp">Bagian <b class="text-danger">*</b></label>
                                            <input id="no_ktp" type="name"
                                                class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp"
                                                tabindex="1" required autofocus value="{{ old('no_ktp') }}"
                                                placeholder="Masukkan Bagian Anda">

                                            @error('no_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="masa_berlaku_ktp">Dosen / Staff <b
                                                    class="text-danger">*</b></label>
                                            <input id="masa_berlaku_ktp" type="name"
                                                class="form-control @error('masa_berlaku_ktp') is-invalid @enderror"
                                                name="masa_berlaku_ktp" tabindex="1" required autofocus
                                                value="{{ old('masa_berlaku_ktp') }}" placeholder="Masukkan Dosen/Staff">

                                            @error('masa_berlaku_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label for="">
                                            <h6 style="color: #F2D230">Dengan ini mengajukan permohonan Pinjaman Normal
                                                sebagai berikut: </h6>
                                        </label>
                                        <h6 class="text-center" style="color: #F2D230; font-weight: bold; ">Nilai Pinjaman
                                        </h6>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_ktp">Besar Pinjaman <b class="text-danger">*</b></label>
                                            <input id="no_ktp" type="name"
                                                class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp"
                                                tabindex="1" required autofocus value="{{ old('no_ktp') }}"
                                                placeholder="Masukkan Besar Pinjaman Anda">

                                            @error('no_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="masa_berlaku_ktp">Angsuran Dibayarkan/bln <b
                                                    class="text-danger">*</b></label>
                                            <input id="masa_berlaku_ktp" type="name"
                                                class="form-control @error('masa_berlaku_ktp') is-invalid @enderror"
                                                name="masa_berlaku_ktp" tabindex="1" required autofocus
                                                value="{{ old('masa_berlaku_ktp') }}"
                                                placeholder="Masukkan Angsuran Dibayarkan Anda">

                                            @error('masa_berlaku_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <label for="">
                                    <h6>
                                        <p>Saya memberikan kuasa penuh kepada Payroll Politeknik Negeri Batam untuk
                                            melakukan pemotongan gaji saya sebesar angsuran bulanan yang telah saya pilih di
                                            atas terhitung sejak</p>
                                    </h6>
                                </label>
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="kabu_ktp">Tanggal <b class="text-danger">*</b></label>
                                            <input id="kabu_ktp" type="name"
                                                class="form-control @error('kabu_ktp') is-invalid @enderror"
                                                name="kabu_ktp" tabindex="1" required autofocus
                                                value="{{ old('kabu_ktp') }}" placeholder="Masukkan Tanggal Anda">

                                            @error('kabu_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="kode_pos">Bulan <b class="text-danger">*</b></label>
                                            <input id="kode_pos" type="name"
                                                class="form-control @error('kode_pos') is-invalid @enderror"
                                                name="kode_pos" tabindex="1" required autofocus
                                                value="{{ old('kode_pos') }}" placeholder="Masukkan Tahun Anda">

                                            @error('kode_pos')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="kode_pos">Tahunn <b class="text-danger">*</b></label>
                                            <input id="kode_pos" type="name"
                                                class="form-control @error('kode_pos') is-invalid @enderror"
                                                name="kode_pos" tabindex="1" required autofocus
                                                value="{{ old('kode_pos') }}" placeholder="Masukkan Tahun Anda">

                                            @error('kode_pos')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <label for="">
                                    <h6>
                                        <p>sampai dengan</p>
                                    </h6>
                                </label>
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="kabu_ktp">Tanggal <b class="text-danger">*</b></label>
                                            <input id="kabu_ktp" type="name"
                                                class="form-control @error('kabu_ktp') is-invalid @enderror"
                                                name="kabu_ktp" tabindex="1" required autofocus
                                                value="{{ old('kabu_ktp') }}" placeholder="Masukkan Tanggal Anda">

                                            @error('kabu_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="kode_pos">Bulan <b class="text-danger">*</b></label>
                                            <input id="kode_pos" type="name"
                                                class="form-control @error('kode_pos') is-invalid @enderror"
                                                name="kode_pos" tabindex="1" required autofocus
                                                value="{{ old('kode_pos') }}" placeholder="Masukkan Tahun Anda">

                                            @error('kode_pos')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="kode_pos">Tahunn <b class="text-danger">*</b></label>
                                            <input id="kode_pos" type="name"
                                                class="form-control @error('kode_pos') is-invalid @enderror"
                                                name="kode_pos" tabindex="1" required autofocus
                                                value="{{ old('kode_pos') }}" placeholder="Masukkan Tahun Anda">

                                            @error('kode_pos')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="tmpt_lahir">Tempat dan Tanggal <b
                                                    class="text-danger">*</b></label>
                                            <input id="tmpt_lahir" type="name"
                                                class="form-control @error('tmpt_lahir') is-invalid @enderror"
                                                name="tmpt_lahir" tabindex="1" required autofocus
                                                value="{{ old('tmpt_lahir') }}"
                                                placeholder="Masukkan Tempat dan Tanggal">

                                            @error('tmpt_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <label for="">
                                    <h6 style="color: #F2D230">Keterangan</h6>
                                </label>

                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="kelu_ktp">Nomor Rekening Pencairan Pinjaman <b
                                                    class="text-danger">*</b></label>
                                            <input id="kelu_ktp" type="name"
                                                class="form-control @error('kelu_ktp') is-invalid @enderror"
                                                name="kelu_ktp" tabindex="1" required autofocus
                                                value="{{ old('kelu_ktp') }}"
                                                placeholder="Masukkan Nomor Rekening Pencairan Pinjaman Anda">

                                            @error('kelu_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="keca_ktp">Alamat Email Pemberitahuan Pencairan Pinjaman <b
                                                    class="text-danger">*</b></label>
                                            <input id="keca_ktp" type="name"
                                                class="form-control @error('keca_ktp') is-invalid @enderror"
                                                name="keca_ktp" tabindex="1" required autofocus
                                                value="{{ old('keca_ktp') }}"
                                                placeholder="Masukkan Alamat Email Pemberitahuan Pencairan Pinjaman Anda">

                                            @error('keca_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="nama_ibu_kdg">Alasan Peminjaman <b class="text-danger">*</b></label>
                                    <input id="nama_ibu_kdg" type="name"
                                        class="form-control @error('nama_ibu_kdg') is-invalid @enderror"
                                        name="nama_ibu_kdg" tabindex="1" required autofocus
                                        value="{{ old('nama_ibu_kdg') }}" placeholder="Masukkan Alasan Peminjaman Anda">

                                    @error('nama_ibu_kdg')
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
                                            <img class="img-preview-foto img-fluid mb-3" width="600" height="300">
                                            <input id="ttd" type="file"
                                                class="form-control @error('ttd') is-invalid @enderror"
                                                name="ttd" tabindex="1" required autofocus
                                                onchange="previewFoto()">

                                            @error('ttd')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="up_ket" class="d-flex"><strong>Upload Surat Keterangan</strong> <b
                                                    class="text-danger">*</b></label>
                                            <img class="img-preview-ktp img-fluid mb-3" width="600" height="300">
                                            <input id="up_ket" type="file"
                                                class="form-control @error('up_ket') is-invalid @enderror"
                                                name="up_ket" tabindex="1" required autofocus
                                                onchange="previewKtp()">

                                            @error('up_ket')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="1"
                                        id="konfimasiRegister" name="konfimasiRegister" onclick="showButtonRegister()">
                                    <label class="form-check-label" for="alamat_tdk_ktp" style="color: red"><strong>Saya
                                            yakin semua kolom yang wajib diisi telah terisi dengan lengkap.</strong></label>
                                </div>

                                <center>
                                    <button id="konfimasiRegisterBtn" type="submit" class="btn btn-primary btn-lg"
                                        style="display: none;" tabindex="3" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdropReg">
                                        Kirim
                                    </button>
                                </center>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
