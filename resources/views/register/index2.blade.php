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
              
              <h2>FORMULIR PERMOHONAN KEANGGOTAAN</h2>
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
                    <h6 style="color: #F2D230">Data Pribadi</h6>
                  </label>
                 </div>
                  <div class="form-group">
                    <label for="name">Nama <b class="text-danger">*</b></label>
                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" tabindex="1" required autofocus value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap Anda">
                    
                    @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="row">
                    <div class="col-12 col-sm-12 col-lg-8">
                      <div class="form-group">
                        <label for="no_ktp">Nomor KTP <b class="text-danger">*</b></label>
                        <input id="no_ktp" type="name" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" tabindex="1" required autofocus value="{{ old('no_ktp') }}" placeholder="Masukkan Nomor KTP Anda">
                        
                        @error('no_ktp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-4">
                      <div class="form-group">
                        <label for="masa_berlaku_ktp">Masa Berlaku <b class="text-danger">*</b></label>
                        <input id="masa_berlaku_ktp" type="name" class="form-control @error('masa_berlaku_ktp') is-invalid @enderror" name="masa_berlaku_ktp" tabindex="1" required autofocus value="{{ old('masa_berlaku_ktp') }}" placeholder="Masa berlaku KTP Anda">
                        
                        @error('masa_berlaku_ktp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="gender">Jenis Kelamin <b class="text-danger">*</b></label>
                    <select id="gender" name="gender" class="form-select form-control @error('gender') is-invalid @enderror"  required>
                      <option value="">-- Pilih Jenis Kelamin --</option>
                      <option {{ (old('gender') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                      <option {{ (old('gender') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('gender')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="row">
                    <div class="col-12 col-sm-6 col-lg-8">
                      <div class="form-group">
                        <label for="tmpt_lahir">Tempat Lahir <b class="text-danger">*</b></label>
                        <input id="tmpt_lahir" type="name" class="form-control @error('tmpt_lahir') is-invalid @enderror" name="tmpt_lahir" tabindex="1" required autofocus value="{{ old('tmpt_lahir') }}" placeholder="Masukkan Tempat Lahir Anda">
                        
                        @error('tmpt_lahir')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                      <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir <b class="text-danger">*</b></label>
                        <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" tabindex="1" required autofocus value="{{ old('tgl_lahir') }}" placeholder="Tanggal Lahir">
                        
                        @error('tgl_lahir')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat_ktp">Alamat (sesuai KTP) <b class="text-danger">*</b></label>
                    <input id="alamat_ktp" type="name" class="form-control @error('alamat_ktp') is-invalid @enderror" name="alamat_ktp" tabindex="1" required autofocus value="{{ old('alamat_ktp') }}" placeholder="Masukkan alamat sesuai KTP Anda">
                    
                    @error('alamat_ktp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="row">
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <label for="kelu_ktp">Kelurahan <b class="text-danger">*</b></label>
                        <input id="kelu_ktp" type="name" class="form-control @error('kelu_ktp') is-invalid @enderror" name="kelu_ktp" tabindex="1" required autofocus value="{{ old('kelu_ktp') }}" placeholder="Masukkan Kelurahan sesuai KTP Anda">
                        
                        @error('kelu_ktp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <label for="keca_ktp">Kecamatan <b class="text-danger">*</b></label>
                        <input id="keca_ktp" type="name" class="form-control @error('keca_ktp') is-invalid @enderror" name="keca_ktp" tabindex="1" required autofocus value="{{ old('keca_ktp') }}" placeholder="Masukkan Kecamatan sesuai KTP Anda">
                        
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
                        <label for="kabu_ktp">Kabupaten <b class="text-danger">*</b></label>
                        <input id="kabu_ktp" type="name" class="form-control @error('kabu_ktp') is-invalid @enderror" name="kabu_ktp" tabindex="1" required autofocus value="{{ old('kabu_ktp') }}" placeholder="Masukkan Kabupaten sesuai KTP Anda">
                        
                        @error('kabu_ktp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <label for="kode_pos">Kode Pos <b class="text-danger">*</b></label>
                        <input id="kode_pos" type="name" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" tabindex="1" required autofocus value="{{ old('kode_pos') }}" placeholder="Masukkan kode pos sesuai KTP Anda">
                        
                        @error('kode_pos')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="alamatTidakSesuaiKtp" name="alamatTidakSesuaiKtp" onclick="showAlamatInput()">
                    <label class="form-check-label" for="alamatTidakSesuaiKtp" style="color: red"><strong>Alamat Tempat Tinggal sesuai KTP</strong></label>
                  </div>
                  
                  <div class="" id="alamatTidakSesuaiKtpInp">
                    <div class="form-group">
                      <label for="alamat_pri">Alamat Tempat Tinggal</label>
                      <input id="alamat_pri" type="name" class="form-control @error('alamat_pri') is-invalid @enderror" name="alamat_pri" tabindex="1" autofocus value="{{ old('alamat_pri') }}" placeholder="Masukkan alamat tempat tinggal">
                      
                      @error('alamat_pri')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    
                    <div class="row">
                      <div class="col-12 col-sm-6 col-lg-6">
                        <div class="form-group" id="alamatTidakSesuaiKtpInp">
                          <label for="kelu_pri">Kelurahan</label>
                          <input id="kelu_pri" type="name" class="form-control @error('kelu_pri') is-invalid @enderror" name="kelu_pri" tabindex="1" autofocus value="{{ old('kelu_pri') }}" placeholder="Masukkan Kelurahan Anda">
                          
                          @error('kelu_pri')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12 col-sm-6 col-lg-6">
                        <div class="form-group" id="alamatTidakSesuaiKtpInp">
                          <label for="keca_pri">Kecamatan</label>
                          <input id="keca_pri" type="name" class="form-control @error('keca_pri') is-invalid @enderror" name="keca_pri" tabindex="1" autofocus value="{{ old('keca_pri') }}" placeholder="Masukkan Kecamatan Anda">
                          
                          @error('keca_pri')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                    </div>
  
                    <div class="row" id="alamatTidakSesuaiKtpInp">
                      <div class="col-12 col-sm-6 col-lg-6">
                        <div class="form-group" id="alamatTidakSesuaiKtpInp">
                          <label for="kabu_pri">Kabupaten</label>
                          <input id="kabu_pri" type="name" class="form-control @error('kabu_pri') is-invalid @enderror" name="kabu_pri" tabindex="1" autofocus value="{{ old('kabu_pri') }}" placeholder="Masukkan Kabupaten Anda">
                          
                          @error('kabu_pri')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12 col-sm-6 col-lg-6">
                        <div class="form-group" id="alamatTidakSesuaiKtpInp">
                          <label for="kode_pos_pri">Kode Pos</label>
                          <input id="kode_pos_pri" type="name" class="form-control @error('kode_pos_pri') is-invalid @enderror" name="kode_pos_pri" tabindex="1" autofocus value="{{ old('kode_pos_pri') }}" placeholder="Masukkan kode pos Anda">
                          
                          @error('kode_pos_pri')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="no_telp_rmh">No. Telepon Rumah</label>
                        <input id="no_telp_rmh" type="name" class="form-control @error('no_telp_rmh') is-invalid @enderror" name="no_telp_rmh" tabindex="1" autofocus value="{{ old('no_telp_rmh') }}" placeholder="Masukkan No Telepon Rumah Anda">
                        
                        @error('no_telp_rmh')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="no_hp">No. HP <b class="text-danger">*</b></label>
                        <input id="no_hp" type="name" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" tabindex="1" required autofocus value="{{ old('no_hp') }}" placeholder="Masukkan No HP Anda">
                        
                        @error('no_hp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="stat_tmpt_tgl">Status Tempat Tinggal <b class="text-danger">*</b></label>
                    <select id="stat_tmpt_tgl" name="stat_tmpt_tgl" class="form-select form-control @error('stat_tmpt_tgl') is-invalid @enderror"  required>
                      <option value="">-- Pilih Status Tempat Tinggal --</option>
                      <option {{ (old('stat_tmpt_tgl') == 'Milik Sendiri') ? 'selected' : '' }}>Milik Sendiri</option>
                      <option {{ (old('stat_tmpt_tgl') == 'Rumah Dinas') ? 'selected' : '' }}>Rumah Dinas</option>
                      <option {{ (old('stat_tmpt_tgl') == 'Milik Orang Tua') ? 'selected' : '' }}>Milik Orang Tua</option>
                      <option {{ (old('stat_tmpt_tgl') == 'Kontrak') ? 'selected' : '' }}>Kontrak</option>
                      <option {{ (old('stat_tmpt_tgl') == 'Lain-lain') ? 'selected' : '' }}>Lain-lain</option>               
                    </select>
                    @error('stat_tmpt_tgl')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="tgl_tmpti">Menempati Alamat tersebut sejak <b class="text-danger">*</b></label>
                    <input id="tgl_tmpti" type="date" class="form-control @error('tgl_tmpti') is-invalid @enderror" name="tgl_tmpti" tabindex="1" required autofocus value="{{ old('tgl_tmpti') }}">
                    
                    @error('tgl_tmpti')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="pendd_akhir">Pendidikan Terakhir <b class="text-danger">*</b></label>
                    <select id="pendd_akhir" name="pendd_akhir" class="form-select form-control @error('pendd_akhir') is-invalid @enderror"  required>
                      <option value="">-- Pilih Pendidikan Terakhir --</option>
                      <option {{ (old('pendd_akhir') == 'SMP') ? 'selected' : '' }}>SMP</option>
                      <option {{ (old('pendd_akhir') == 'SMU') ? 'selected' : '' }}>SMU</option>
                      <option {{ (old('pendd_akhir') == 'Akademi') ? 'selected' : '' }}>Akademi</option>
                      <option {{ (old('pendd_akhir') == 'Universitas') ? 'selected' : '' }}>Universitas</option>             
                    </select>
                    @error('stat_tmpt_tgl')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="stat_kawin">Status Perkawinan <b class="text-danger">*</b></label>
                    <select id="stat_kawin" name="stat_kawin" class="form-select form-control @error('stat_kawin') is-invalid @enderror" onclick="hideButtonIstriAnak()" required>
                      <option value="">-- Pilih Status Perkawinan --</option>
                      <option value="Lajang" {{ (old('stat_kawin') == 'Lajang') ? 'selected' : '' }}>Lajang</option>
                      <option value="Menikah" {{ (old('stat_kawin') == 'Menikah') ? 'selected' : '' }}>Menikah</option>
                      <option value="Duda/Janda" {{ (old('stat_kawin') == 'Duda/Janda') ? 'selected' : '' }}>Duda/Janda</option>          
                    </select>
                    @error('stat_kawin')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="" id="no_stat_kawin">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-lg-8">
                        <div class="form-group">
                          <label for="nama_istri_suami">Nama Istri/Suami</label>
                          <input id="nama_istri_suami" type="name" class="form-control @error('nama_istri_suami') is-invalid @enderror" name="nama_istri_suami" tabindex="1" autofocus value="{{ old('nama_istri_suami') }}" placeholder="Masukkan Nama Istri / Suami Anda">
                          
                          @error('nama_istri_suami')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12 col-sm-12 col-lg-4">
                        <div class="form-group">
                          <label for="jml_anak">Jumlah Anak</label>
                          <input id="jml_anak" type="name" class="form-control @error('jml_anak') is-invalid @enderror" name="jml_anak" tabindex="1" autofocus value="{{ old('jml_anak') }}" placeholder="Jumlah Anak">
                          
                          @error('jml_anak')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nama_ibu_kdg">Nama Ibu Kandung Pemohon <b class="text-danger">*</b></label>
                    <input id="nama_ibu_kdg" type="name" class="form-control @error('nama_ibu_kdg') is-invalid @enderror" name="nama_ibu_kdg" tabindex="1" required autofocus value="{{ old('nama_ibu_kdg') }}" placeholder="Masukkan Nama Ibu Kandung Pemohon">
                    
                    @error('nama_ibu_kdg')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="npwp">NPWP Pribadi <b class="text-danger">*</b></label>
                    <input id="npwp" type="name" class="form-control @error('npwp') is-invalid @enderror" name="npwp" tabindex="1" required autofocus value="{{ old('npwp') }}" placeholder="Masukkan NPWP Pribadi Anda">
                    
                    @error('npwp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="nama_ahli_waris">Nama Ahli Waris</label>
                        <input id="nama_ahli_waris" type="name" class="form-control @error('nama_ahli_waris') is-invalid @enderror" name="nama_ahli_waris" tabindex="1" autofocus value="{{ old('nama_ahli_waris') }}" placeholder="Masukkan Nama Ahli Waris Anda">
                        
                        @error('nama_ahli_waris')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="hub_ahli_waris">Hubungan Ahli Waris</label>
                        <select id="hub_ahli_waris" name="hub_ahli_waris" class="form-select form-control @error('hub_ahli_waris') is-invalid @enderror">
                          <option value="">-- Pilih Hubungan Ahli Waris --</option>
                          <option {{ (old('hub_ahli_waris') == 'Istri / Suami') ? 'selected' : '' }}>Istri / Suami</option>
                          <option {{ (old('hub_ahli_waris') == 'Orangtua') ? 'selected' : '' }}>Orangtua</option>
                          <option {{ (old('hub_ahli_waris') == 'Anak') ? 'selected' : '' }}>Anak</option>          
                          <option {{ (old('hub_ahli_waris') == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>          
                        </select>
                        @error('stat_kawin')
                          <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <hr>
                  </div>

                  <div class="form-group mb-0 mt-3">
                    <label for="data_pribadi">
                      <h6 style="color: #F2D230">Data Pekerjaan</h6>
                    </label>
                  </div>

                  <div class="form-group">
                    <label for="no_telp_ext_ktr">No. Telp ext Kantor <b class="text-danger">*</b></label>
                    <input id="no_telp_ext_ktr" type="name" class="form-control @error('no_telp_ext_ktr') is-invalid @enderror" name="no_telp_ext_ktr" tabindex="1" required autofocus value="{{ old('no_telp_ext_ktr') }}" placeholder="Masukkan No. Telp ext Kantor">
                    
                    @error('no_telp_ext_ktr')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="nik">Nomor Induk Karyawan <b class="text-danger">*</b></label>
                    <input id="nik" type="name" class="form-control @error('nik') is-invalid @enderror" name="nik" tabindex="1" required autofocus value="{{ old('nik') }}" placeholder="Masukkan Nomor Induk Karyawan Anda">
                    
                    @error('nik')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="no_rek_bni">Nomor Rekening BNI 46 <b class="text-danger">*</b></label>
                    <input id="no_rek_bni" type="name" class="form-control @error('no_rek_bni') is-invalid @enderror" name="no_rek_bni" tabindex="1" required autofocus value="{{ old('no_rek_bni') }}" placeholder="Masukkan Nomor Rekening BNI Anda">
                    
                    @error('no_rek_bni')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="divisi">Divisi / Bagian / Jabatan <b class="text-danger">*</b></label>
                    <input id="divisi" type="name" class="form-control @error('divisi') is-invalid @enderror" name="divisi" tabindex="1" required autofocus value="{{ old('divisi') }}" placeholder="Masukkan Divisi / Bagian / Jabatan Anda">
                    
                    @error('divisi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="row">
                    <div class="col-12 col-sm-6 col-lg-4">
                      <div class="form-group">
                        <label for="tgl_msk_prsh">Tanggal Masuk ke Perusahaan <b class="text-danger">*</b></label>
                        <input id="tgl_msk_prsh" type="date" class="form-control @error('tgl_msk_prsh') is-invalid @enderror" name="tgl_msk_prsh" tabindex="1" required autofocus value="{{ old('tgl_msk_prsh') }}">
                        
                        @error('tgl_msk_prsh')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-8">
                      <div class="form-group">
                        <label for="stat_karyawan">Status Karyawan <b class="text-danger">*</b></label>
                        <select id="stat_karyawan" name="stat_karyawan" class="form-select form-control @error('stat_karyawan') is-invalid @enderror"  required>
                          <option value="">-- Pilih Status Karyawan --</option>
                          <option {{ (old('stat_karyawan') == 'Karyawan Tetap') ? 'selected' : '' }}>Karyawan Tetap</option>
                          <option {{ (old('stat_karyawan') == 'Kontrak') ? 'selected' : '' }}>Kontrak</option>       
                        </select>
                        @error('stat_kawin')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <hr>
                  </div>

                  <div class="form-group mb-0 mt-3">
                    <label for="data_pribadi">
                      <h6 style="color: #F2D230">Upload File</h6>
                    </label>
                  </div>

                  <div class="row">
                    <div class="col-12 col-sm-6 col-lg-6">
                      <div class="form-group">
                        <label for="up_foto" class="d-flex"><strong>Upload foto 2x3</strong> <b class="text-danger">*</b></label>
                        <img class="img-preview-foto img-fluid mb-3" width="600" height="300">
                        <input id="up_foto" type="file" class="form-control @error('up_foto') is-invalid @enderror" name="up_foto" tabindex="1" required autofocus onchange="previewFoto()">
                        
                        @error('up_foto')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
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
                    </div>
                  </div>

                  <div class="row">
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
                  </div>

                  <div class="form-group">
                    <hr>
                  </div>

                  <div class="form-group mb-0 mt-3">
                    <label for="data_pribadi">
                      <h6 style="color: #F2D230">Membuat Akun Koperasi</h6>
                    </label>
                  </div>

                  <div class="form-group">
                    <label for="email">Email <b class="text-danger">*</b></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus value="{{ old('email') }}">
                    
                    @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password <b class="text-danger">*</b></label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                  </div>

                  <div class="form-group form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="konfimasiRegister" name="konfimasiRegister" onclick="showButtonRegister()">
                    <label class="form-check-label" for="alamat_tdk_ktp" style="color: red"><strong>Saya yakin semua kolom yang wajib diisi telah terisi dengan lengkap.</strong></label>
                  </div>

                  <center>
                    <button id="konfimasiRegisterBtn" type="submit" class="btn btn-primary btn-lg" style="display: none;" tabindex="3" data-bs-toggle="modal" data-bs-target="#staticBackdropReg">
                      Register
                    </button>
                  </center>
          
                </form>

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Sudah punya akun Koperasi Polibatam? <a href="/login">Login sekarang</a>
            </div>
            <div class="simple-footer">
                Copyright &copy; 2023
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