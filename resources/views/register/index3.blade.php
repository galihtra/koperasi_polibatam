<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>KPB | {{ $title }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 ">
            <div class="login-brand">
              <h2>FORMULIR PERMOHONAN PINJAMAN KONSUMTIF BIASA</h2>
            </div>

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
                <form method="post" action="/register" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group mb-0 mt-3">
                  <label for="data_pribadi">
                    <h6>
                      <p>Catatan: <b class="text-danger">*</b></p>
                      <ul class="list-unstyled">
                        <li>1. Formulir ini dituju untuk pinjaman 3jt s/d 10 juta yang akan diangsur maksimal 2 tahun</li>
                        <li>2. Formulir ini wajib dilengkapi dengan ijazah asli dan transkip nilai asli</li>
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
                        <input id="no_ktp" type="name" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" tabindex="1" required autofocus value="{{ old('no_ktp') }}" placeholder="Masukkan Nomor Anggota/NIK Anda">
                        
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
                        <input id="masa_berlaku_ktp" type="name" class="form-control @error('masa_berlaku_ktp') is-invalid @enderror" name="masa_berlaku_ktp" tabindex="1" required autofocus value="{{ old('masa_berlaku_ktp') }}" placeholder="Masukkan Alamat Rumah Anda">
                        
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
                        <input id="no_ktp" type="name" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" tabindex="1" required autofocus value="{{ old('no_ktp') }}" placeholder="Masukkan Nama Anda">
                        
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
                        <input id="masa_berlaku_ktp" type="name" class="form-control @error('masa_berlaku_ktp') is-invalid @enderror" name="masa_berlaku_ktp" tabindex="1" required autofocus value="{{ old('masa_berlaku_ktp') }}" placeholder="Masukkan No. Telp/HP Anda">
                        
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
                        <input id="no_ktp" type="name" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" tabindex="1" required autofocus value="{{ old('no_ktp') }}" placeholder="Masukkan Bagian Anda">
                        
                        @error('no_ktp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6">
                      <div class="form-group">
                        <label for="masa_berlaku_ktp">Dosen / Staff <b class="text-danger">*</b></label>
                        <input id="masa_berlaku_ktp" type="name" class="form-control @error('masa_berlaku_ktp') is-invalid @enderror" name="masa_berlaku_ktp" tabindex="1" required autofocus value="{{ old('masa_berlaku_ktp') }}" placeholder="Masukkan Dosen/Staff">
                        
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
                        <h6 style="color: #F2D230">Dengan ini mengajukan permohonan Pinjaman Normal sebagai berikut: </h6>
                      </label>
                      <h6 class="text-center" style="color: #F2D230; font-weight: bold; ">Nilai Pinjaman</h6>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 col-sm-12 col-lg-6">
                      <div class="form-group">
                        <label for="no_ktp">Besar Pinjaman <b class="text-danger">*</b></label>
                        <input id="no_ktp" type="name" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" tabindex="1" required autofocus value="{{ old('no_ktp') }}" placeholder="Masukkan Besar Pinjaman Anda">
                        
                        @error('no_ktp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6">
                      <div class="form-group">
                        <label for="masa_berlaku_ktp">Angsuran Dibayarkan <b class="text-danger">*</b></label>
                        <input id="masa_berlaku_ktp" type="name" class="form-control @error('masa_berlaku_ktp') is-invalid @enderror" name="masa_berlaku_ktp" tabindex="1" required autofocus value="{{ old('masa_berlaku_ktp') }}" placeholder="Masukkan Angsuran Dibayarkan Anda">
                        
                        @error('masa_berlaku_ktp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div>
                    <hr>
                  </div>
                  <label for="">
                    <h6>
                      <p>Saya memberikan kuasa penuh kepada Payroll Politeknik Negeri Batam untuk melakukan pemotongan gaji saya sebesar angsuran bulanan yang telah saya pilih di atas terhitung sejak</p>
                    </h6>
                  </label>
                  <div class="row">
                    <div class="col-12 col-sm-4 col-lg-4">
                      <div class="form-group">
                        <label for="kabu_ktp">Tanggal <b class="text-danger">*</b></label>
                        <input id="kabu_ktp" type="name" class="form-control @error('kabu_ktp') is-invalid @enderror" name="kabu_ktp" tabindex="1" required autofocus value="{{ old('kabu_ktp') }}" placeholder="Masukkan Tanggal Anda">
                        
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
                        <input id="kode_pos" type="name" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" tabindex="1" required autofocus value="{{ old('kode_pos') }}" placeholder="Masukkan Tahun Anda">
                        
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
                        <input id="kode_pos" type="name" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" tabindex="1" required autofocus value="{{ old('kode_pos') }}" placeholder="Masukkan Tahun Anda">
                        
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
                        <input id="kabu_ktp" type="name" class="form-control @error('kabu_ktp') is-invalid @enderror" name="kabu_ktp" tabindex="1" required autofocus value="{{ old('kabu_ktp') }}" placeholder="Masukkan Tanggal Anda">
                        
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
                        <input id="kode_pos" type="name" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" tabindex="1" required autofocus value="{{ old('kode_pos') }}" placeholder="Masukkan Tahun Anda">
                        
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
                        <input id="kode_pos" type="name" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" tabindex="1" required autofocus value="{{ old('kode_pos') }}" placeholder="Masukkan Tahun Anda">
                        
                        @error('kode_pos')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div>
                    <hr>
                  </div>
                  
                  <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                      <div class="form-group">
                        <label for="tmpt_lahir">Tempat dan Tanggal <b class="text-danger">*</b></label>
                        <input id="tmpt_lahir" type="name" class="form-control @error('tmpt_lahir') is-invalid @enderror" name="tmpt_lahir" tabindex="1" required autofocus value="{{ old('tmpt_lahir') }}" placeholder="Masukkan Tempat dan Tanggal">
                        
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
                        <label for="kelu_ktp">Nomor Rekening Pencairan Pinjaman <b class="text-danger">*</b></label>
                        <input id="kelu_ktp" type="name" class="form-control @error('kelu_ktp') is-invalid @enderror" name="kelu_ktp" tabindex="1" required autofocus value="{{ old('kelu_ktp') }}" placeholder="Masukkan Nomor Rekening Pencairan Pinjaman Anda">
                        
                        @error('kelu_ktp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <label for="keca_ktp">Alamat Email Pemberitahuan Pencairan Pinjaman <b class="text-danger">*</b></label>
                        <input id="keca_ktp" type="name" class="form-control @error('keca_ktp') is-invalid @enderror" name="keca_ktp" tabindex="1" required autofocus value="{{ old('keca_ktp') }}" placeholder="Masukkan Alamat Email Pemberitahuan Pencairan Pinjaman Anda">
                        
                        @error('keca_ktp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <label for="kabu_ktp">Biaya Admin <b class="text-danger">*</b></label>
                        <input id="kabu_ktp" type="name" class="form-control @error('kabu_ktp') is-invalid @enderror" name="kabu_ktp" tabindex="1" required autofocus value="{{ old('kabu_ktp') }}" placeholder="Masukkan Biaya Admin Anda">
                        
                        @error('kabu_ktp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <label for="kode_pos">Total Pencairan Pinjaman <b class="text-danger">*</b></label>
                        <input id="kode_pos" type="name" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" tabindex="1" required autofocus value="{{ old('kode_pos') }}" placeholder="Masukkan Total Pencairan Pinjaman Anda">
                        
                        @error('kode_pos')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nama_ibu_kdg">Alasan Peminjaman <b class="text-danger">*</b></label>
                    <input id="nama_ibu_kdg" type="name" class="form-control @error('nama_ibu_kdg') is-invalid @enderror" name="nama_ibu_kdg" tabindex="1" required autofocus value="{{ old('nama_ibu_kdg') }}" placeholder="Masukkan Alasan Peminjaman Anda">
                    
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
                        <label for="up_foto" class="d-flex"><strong>Upload Nama dan Tanda Tangan</strong> <b class="text-danger">*</b></label>
                        <img class="img-preview-foto img-fluid mb-3" width="600" height="300">
                        <input id="up_foto" type="file" class="form-control @error('up_foto') is-invalid @enderror" name="up_foto" tabindex="1" required autofocus onchange="previewFoto()">
                        
                        @error('up_foto')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    {{-- <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <label for="up_fc_ktp" class="d-flex"><strong>Upload Foto Copy KTP</strong> <b class="text-danger">*</b></label>
                        <img class="img-preview-ktp img-fluid mb-3" width="600" height="300">
                        <input id="up_fc_ktp" type="file" class="form-control @error('up_fc_ktp') is-invalid @enderror" name="up_fc_ktp" tabindex="1" required autofocus onchange="previewKtp()">
                        
                        @error('up_fc_ktp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div> --}}
                  </div>

                  {{-- <div class="row">
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <label for="up_id_card" class="d-flex"><strong>Upload Foto Copy ID CARD</strong> <b class="text-danger">*</b></label>
                        <img class="img-preview-idCard img-fluid mb-3"  width="600" height="300">
                        <input id="up_id_card" type="file" class="form-control @error('up_id_card') is-invalid @enderror" name="up_id_card" tabindex="1" required autofocus onchange="previewIdCard()">
                        
                        @error('up_id_card')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <label for="up_ttd" class="d-flex"><strong>Upload Scan Tanda Tangan</strong> <b class="text-danger">*</b></label>
                        <img class="img-preview-ttd img-fluid mb-3"  width="600" height="300">
                        <input id="up_ttd" type="file" class="form-control @error('up_ttd') is-invalid @enderror" name="up_ttd" tabindex="1" required autofocus onchange="previewTtd()">
                        
                        @error('up_ttd')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div> --}}

                 
                  {{-- <div class="form-group">
                    <label for="stat_akun">Status Akun <b class="text-danger">*</b></label>
                    <select id="stat_akun" name="stat_akun" class="form-select form-control @error('stat_akun') is-invalid @enderror"  required>
                      <option value="">-- Pilih Status Akun --</option>
                      <option {{ (old('stat_akun') == 'Aktif') ? 'selected' : '' }} selected>Aktif</option>
                      <option {{ (old('stat_akun') == 'Non-Aktif') ? 'selected' : '' }}>Non-Aktif</option>       
                    </select>
                    
                    @error('stat_akun')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div> --}}

                  <div class="form-group form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="konfimasiRegister" name="konfimasiRegister" onclick="showButtonRegister()">
                    <label class="form-check-label" for="alamat_tdk_ktp" style="color: red"><strong>Saya yakin semua kolom yang wajib diisi telah terisi dengan lengkap.</strong></label>
                  </div>

                  <center>
                    <button id="konfimasiRegisterBtn" type="submit" class="btn btn-primary btn-lg" style="display: none;" tabindex="3" data-bs-toggle="modal" data-bs-target="#staticBackdropReg">
                      Kirim
                    </button>
                  </center>

                  <!-- Modal -->
                  {{-- <div class="modal fade" id="staticBackdropReg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropReg" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropReg">Konfirmasi</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Mohon pastikan bahwa semua data yang Anda masukkan sudah benar dan valid sebelum menekan tombol "Submit".
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div> --}}
          
                </form>

              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script>
    
    
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>