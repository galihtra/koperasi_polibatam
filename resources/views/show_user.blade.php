@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Calon Anggota</h1>
    </div>
    <div class="container-fluid">
       <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    {{-- <div class="card-header">{{ $title }}</div> --}}

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-body">
                        {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ $user->name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-lg-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ $user->email }}" readonly>
                            </div>
                        </div> --}}

                            <div class="form-group mb-0 mt-3">
                             <label for="data_pribadi">
                               <h6 style="color: #F2D230">Data Pribadi</h6>
                             </label>
                            </div>
                             <div class="form-group">
                               <label for="name">Nama <b class="text-danger">*</b></label>
                               <input id="name" type="name" class="form-control" name="name" tabindex="1"  autofocus value="{{ $user->name }}" placeholder="Masukkan Nama Lengkap Anda" readonly>
                             </div>
           
                             <div class="row">
                               <div class="col-12 col-sm-12 col-lg-8">
                                 <div class="form-group">
                                   <label for="no_ktp">Nomor KTP <b class="text-danger">*</b></label>
                                   <input id="no_ktp" type="name" class="form-control" name="no_ktp" tabindex="1" autofocus value="{{ $user->no_ktp }}" placeholder="Masukkan Nomor KTP Anda" readonly>
                                 </div>
                               </div>
                               <div class="col-12 col-sm-12 col-lg-4">
                                 <div class="form-group">
                                   <label for="masa_berlaku_ktp">Masa Berlaku <b class="text-danger">*</b></label>
                                   <input id="masa_berlaku_ktp" type="name" class="form-control" name="masa_berlaku_ktp" tabindex="1" autofocus value="{{ $user->masa_berlaku_ktp }}" placeholder="Masa berlaku KTP Anda" readonly>
                                 </div>
                               </div>
                             </div>
                             
                             <div class="form-group">
                               <label for="gender">Jenis Kelamin <b class="text-danger">*</b></label>
                               <input id="gender" type="name" class="form-control" name="gender" tabindex="1" autofocus value="{{ $user->gender }}" placeholder="Jenis Kelamin" readonly>
                               {{-- <select id="gender" name="gender" class="form-select form-control" @readonly(true)>
                                 <option value="">-- Pilih Jenis Kelamin --</option>
                                 <option {{ (old('gender', $user->gender) == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                 <option {{ (old('gender', $user->gender) == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                               </select> --}}
                             </div>
           
                             <div class="row">
                               <div class="col-12 col-sm-6 col-lg-8">
                                 <div class="form-group">
                                   <label for="tmpt_lahir">Tempat Lahir <b class="text-danger">*</b></label>
                                   <input id="tmpt_lahir" type="name" class="form-control" name="tmpt_lahir" tabindex="1" autofocus value="{{ $user->tmpt_lahir }}" placeholder="Masukkan Tempat Lahir Anda" readonly>
                                 </div>
                               </div>
                               <div class="col-12 col-sm-6 col-lg-4">
                                 <div class="form-group">
                                   <label for="tgl_lahir">Tanggal Lahir <b class="text-danger">*</b></label>
                                   <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" tabindex="1" autofocus value="{{ $user->tgl_lahir }}" placeholder="Tanggal Lahir" readonly>
                                 </div>
                               </div>
                             </div>
           
                             <div class="form-group">
                               <label for="alamat_ktp">Alamat (sesuai KTP) <b class="text-danger">*</b></label>
                               <input id="alamat_ktp" type="name" class="form-control" name="alamat_ktp" tabindex="1" autofocus value="{{ $user->alamat_ktp }}" placeholder="Masukkan alamat sesuai KTP Anda" readonly>
                             </div>
           
                             <div class="row">
                               <div class="col-12 col-sm-6 col-lg-6">
                                 <div class="form-group">
                                   <label for="kelu_ktp">Kelurahan <b class="text-danger">*</b></label>
                                   <input id="kelu_ktp" type="name" class="form-control" name="kelu_ktp" tabindex="1" autofocus value="{{ $user->kelu_ktp }}" placeholder="Masukkan Kelurahan sesuai KTP Anda" readonly>
                                 </div>
                               </div>
                               <div class="col-12 col-sm-6 col-lg-6">
                                 <div class="form-group">
                                   <label for="keca_ktp">Kecamatan <b class="text-danger">*</b></label>
                                   <input id="keca_ktp" type="name" class="form-control" name="keca_ktp" tabindex="1" autofocus value="{{ $user->keca_ktp }}" placeholder="Masukkan Kecamatan sesuai KTP Anda" readonly>
                                 </div>
                               </div>
                             </div>
           
                             <div class="row">
                               <div class="col-12 col-sm-6 col-lg-6">
                                 <div class="form-group">
                                   <label for="kabu_ktp">Kabupaten <b class="text-danger">*</b></label>
                                   <input id="kabu_ktp" type="name" class="form-control" name="kabu_ktp" tabindex="1" autofocus value="{{ $user->kabu_ktp }}" placeholder="Masukkan Kabupaten sesuai KTP Anda" readonly>
                                 </div>
                               </div>
                               <div class="col-12 col-sm-6 col-lg-6">
                                 <div class="form-group">
                                   <label for="kode_pos">Kode Pos <b class="text-danger">*</b></label>
                                   <input id="kode_pos" type="name" class="form-control" name="kode_pos" tabindex="1" autofocus value="{{ $user->kode_pos }}" placeholder="Masukkan kode pos sesuai KTP Anda" readonly>
                                 </div>
                               </div>
                             </div>

                             @if ($user->alamat_pri)
                             <div class="form-group form-check mb-3">
                              <label class="form-check-label" for="alamatTidakSesuaiKtp" style="color: red"><strong>Alamat Tempat Tinggal tidak sesuai KTP</strong></label>
                            </div>
                             
                             <div class="form-group" id="alamatTidakSesuaiKtpInp">
                               <div class="form-group">
                                 <label for="alamat_pri">Alamat Tempat Tinggal</label>
                                 <input id="alamat_pri" type="name" class="form-control" name="alamat_pri" tabindex="1" autofocus value="{{ $user->alamat_pri }}" readonly>
                               </div>
                             @else
                             <div class="form-group" id="alamatTidakSesuaiKtpInp" hidden>
                              <div class="form-group">
                                <label for="alamat_pri">Alamat Tempat Tinggal</label>
                                <input id="alamat_pri" type="name" class="form-control" name="alamat_pri" tabindex="1" autofocus value="{{ $user->alamat_pri }}" readonly>
                              </div>
                             @endif
                             
                               
                               <div class="row">
                                 <div class="col-12 col-sm-6 col-lg-6">
                                   <div class="form-group" id="alamatTidakSesuaiKtpInp">
                                     <label for="kelu_pri">Kelurahan</label>
                                     <input id="kelu_pri" type="name" class="form-control" name="kelu_pri" tabindex="1" autofocus value="{{ $user->kelu_pri }}" readonly>
                                   </div>
                                 </div>
                                 <div class="col-12 col-sm-6 col-lg-6">
                                   <div class="form-group" id="alamatTidakSesuaiKtpInp">
                                     <label for="keca_pri">Kecamatan</label>
                                     <input id="keca_pri" type="name" class="form-control" name="keca_pri" tabindex="1" autofocus value="{{ $user->keca_pri }}" readonly>
                                   </div>
                                 </div>
                               </div>
             
                               <div class="row" id="alamatTidakSesuaiKtpInp">
                                 <div class="col-12 col-sm-6 col-lg-6">
                                   <div class="form-group" id="alamatTidakSesuaiKtpInp">
                                     <label for="kabu_pri">Kabupaten</label>
                                     <input id="kabu_pri" type="name" class="form-control" name="kabu_pri" tabindex="1" autofocus value="{{ $user->kabu_pri }}" readonly>
                                   </div>
                                 </div>
                                 <div class="col-12 col-sm-6 col-lg-6">
                                   <div class="form-group" id="alamatTidakSesuaiKtpInp">
                                     <label for="kode_pos_pri">Kode Pos</label>
                                     <input id="kode_pos_pri" type="name" class="form-control" name="kode_pos_pri" tabindex="1" autofocus value="{{ $user->kode_pos_pri }}" readonly>
                                   </div>
                                 </div>
                               </div>
                             </div>
           
                             <div class="row">
                               <div class="col-6">
                                 <div class="form-group">
                                   <label for="no_telp_rmh">No. Telepon Rumah</label>
                                   <input id="no_telp_rmh" type="name" class="form-control" name="no_telp_rmh" tabindex="1" autofocus value="{{ $user->no_telp_rmh }}" readonly>
                                 </div>
                               </div>
                               <div class="col-6">
                                 <div class="form-group">
                                   <label for="no_hp">No. HP <b class="text-danger">*</b></label>
                                   <input id="no_hp" type="name" class="form-control" name="no_hp" tabindex="1"  autofocus value="{{ $user->no_hp }}" placeholder="Masukkan No HP Anda" readonly>
                                 </div>
                               </div>
                             </div>
           
                             <div class="form-group">
                               <label for="stat_tmpt_tgl">Status Tempat Tinggal <b class="text-danger">*</b></label>
                               <input id="stat_tmpt_tgl" type="name" class="form-control" name="stat_tmpt_tgl" tabindex="1"  autofocus value="{{ $user->stat_tmpt_tgl }}" placeholder="Masukkan No HP Anda" readonly>
                               {{-- <select id="stat_tmpt_tgl" name="stat_tmpt_tgl" class="form-select form-control @error('stat_tmpt_tgl') is-invalid @enderror"  >
                                 <option value="">-- Pilih Status Tempat Tinggal --</option>
                                 <option {{ (old('stat_tmpt_tgl') == 'Milik Sendiri') ? 'selected' : '' }}>Milik Sendiri</option>
                                 <option {{ (old('stat_tmpt_tgl') == 'Rumah Dinas') ? 'selected' : '' }}>Rumah Dinas</option>
                                 <option {{ (old('stat_tmpt_tgl') == 'Milik Orang Tua') ? 'selected' : '' }}>Milik Orang Tua</option>
                                 <option {{ (old('stat_tmpt_tgl') == 'Kontrak') ? 'selected' : '' }}>Kontrak</option>
                                 <option {{ (old('stat_tmpt_tgl') == 'Lain-lain') ? 'selected' : '' }}>Lain-lain</option>               
                               </select> --}}
                             </div>
           
                             <div class="form-group">
                               <label for="tgl_tmpti">Menempati Alamat tersebut sejak <b class="text-danger">*</b></label>
                               <input id="tgl_tmpti" type="date" class="form-control" name="tgl_tmpti" tabindex="1"  autofocus value="{{ $user->tgl_tmpti }}" readonly>
                             </div>
           
                             <div class="form-group">
                               <label for="pendd_akhir">Pendidikan Terakhir <b class="text-danger">*</b></label>
                               <input id="pendd_akhir" type="name" class="form-control" name="pendd_akhir" tabindex="1"  autofocus value="{{ $user->pendd_akhir }}" readonly>
                             </div>
           
                             <div class="form-group">
                               <label for="stat_kawin">Status Perkawinan <b class="text-danger">*</b></label>
                               <input id="stat_kawin" type="name" class="form-control" name="stat_kawin" tabindex="1"  autofocus value="{{ $user->stat_kawin }}" readonly>
                               {{-- <select id="stat_kawin" name="stat_kawin" class="form-select form-control @error('stat_kawin') is-invalid @enderror"  >
                                 <option value="">-- Pilih Status Perkawinan --</option>
                                 <option {{ (old('stat_kawin') == 'Lajang') ? 'selected' : '' }}>Lajang</option>
                                 <option {{ (old('stat_kawin') == 'Menikah') ? 'selected' : '' }}>Menikah</option>
                                 <option {{ (old('stat_kawin') == 'Duda/Janda') ? 'selected' : '' }}>Duda/Janda</option>          
                               </select> --}}
                             </div>

                            
                              @if($user->nama_istri_suami)
                              <div class="row">
                               <div class="col-12 col-sm-12 col-lg-8">
                                 <div class="form-group">
                                   <label for="nama_istri_suami">Nama Istri/Suami</label>
                                   <input id="nama_istri_suami" type="name" class="form-control" name="nama_istri_suami" tabindex="1" autofocus value="{{ $user->nama_istri_suami }}" readonly>
                                 </div>
                               </div>
                              @else
                              <div class="row">
                                <div class="col-12 col-sm-12 col-lg-8" hidden>
                                  <div class="form-group">
                                    <label for="nama_istri_suami">Nama Istri/Suami</label>
                                    <input id="nama_istri_suami" type="name" class="form-control" name="nama_istri_suami" tabindex="1" autofocus value="{{ $user->nama_istri_suami }}" readonly>
                                  </div>
                                </div>
                              @endif

                              @if($user->jml_anak)
                               <div class="col-12 col-sm-12 col-lg-4">
                                 <div class="form-group">
                                   <label for="jml_anak">Jumlah Anak</label>
                                   <input id="jml_anak" type="name" class="form-control" name="jml_anak" tabindex="1" autofocus value="{{ $user->jml_anak }}" readonly>
                                 </div>
                               </div>
                              </div>
                              @else
                              <div class="col-12 col-sm-12 col-lg-4" hidden>
                                <div class="form-group">
                                  <label for="jml_anak">Jumlah Anak</label>
                                  <input id="jml_anak" type="name" class="form-control" name="jml_anak" tabindex="1" autofocus value="{{ $user->jml_anak }}" readonly>
                                </div>
                              </div>
                             </div>
                             @endif
           
                             <div class="form-group">
                               <label for="nama_ibu_kdg">Nama Ibu Kandung Pemohon <b class="text-danger">*</b></label>
                               <input id="nama_ibu_kdg" type="name" class="form-control" name="nama_ibu_kdg" tabindex="1"  autofocus value="{{ $user->nama_ibu_kdg }}" placeholder="Masukkan Nama Ibu Kandung Pemohon" readonly>
                             </div>
           
                             <div class="form-group">
                               <label for="npwp">NPWP Pribadi <b class="text-danger">*</b></label>
                               <input id="npwp" type="name" class="form-control" name="npwp" tabindex="1"  autofocus value="{{ $user->npwp }}" placeholder="Masukkan NPWP Pribadi Anda" readonly>
                             </div>

                             @if($user->nama_ahli_waris)
                             <div class="row">
                               <div class="col-6">
                                 <div class="form-group">
                                   <label for="nama_ahli_waris">Nama Ahli Waris</label>
                                   <input id="nama_ahli_waris" type="name" class="form-control" name="nama_ahli_waris" tabindex="1" autofocus value="{{ $user->nama_ahli_waris }}" readonly>
                                 </div>
                               </div>
                               <div class="col-6">
                                 <div class="form-group">
                                   <label for="hub_ahli_waris">Hubungan Ahli Waris</label>
                                   <input id="hub_ahli_waris" type="name" class="form-control" name="hub_ahli_waris" tabindex="1" autofocus value="{{ $user->hub_ahli_waris }}" readonly>
                                   {{-- <select id="hub_ahli_waris" name="hub_ahli_waris" class="form-select form-control">
                                     <option value="">-- Pilih Hubungan Ahli Waris --</option>
                                     <option {{ (old('hub_ahli_waris') == 'Istri / Suami') ? 'selected' : '' }}>Istri / Suami</option>
                                     <option {{ (old('hub_ahli_waris') == 'Orangtua') ? 'selected' : '' }}>Orangtua</option>
                                     <option {{ (old('hub_ahli_waris') == 'Anak') ? 'selected' : '' }}>Anak</option>          
                                     <option {{ (old('hub_ahli_waris') == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>          
                                   </select> --}}
                                 </div>
                               </div>
                             </div>
                             @else
                             <div class="row" hidden>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="nama_ahli_waris">Nama Ahli Waris</label>
                                  <input id="nama_ahli_waris" type="name" class="form-control" name="nama_ahli_waris" tabindex="1" autofocus value="{{ $user->nama_ahli_waris }}" readonly>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="hub_ahli_waris">Hubungan Ahli Waris</label>
                                  <input id="hub_ahli_waris" type="name" class="form-control" name="hub_ahli_waris" tabindex="1" autofocus value="{{ $user->hub_ahli_waris }}" readonly>
                                  {{-- <select id="hub_ahli_waris" name="hub_ahli_waris" class="form-select form-control">
                                    <option value="">-- Pilih Hubungan Ahli Waris --</option>
                                    <option {{ (old('hub_ahli_waris') == 'Istri / Suami') ? 'selected' : '' }}>Istri / Suami</option>
                                    <option {{ (old('hub_ahli_waris') == 'Orangtua') ? 'selected' : '' }}>Orangtua</option>
                                    <option {{ (old('hub_ahli_waris') == 'Anak') ? 'selected' : '' }}>Anak</option>          
                                    <option {{ (old('hub_ahli_waris') == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>          
                                  </select> --}}
                                </div>
                              </div>
                            </div>
                            @endif

                             <div class="form-group">
                              <hr>
                             </div>
           
                             <div class="form-group mb-0 mt-3">
                               <label for="data_pekerjaan">
                                 <h6 style="color: #F2D230">Data Pekerjaan</h6>
                               </label>
                             </div>
           
                             <div class="form-group">
                               <label for="no_telp_ext_ktr">No. Telp ext Kantor <b class="text-danger">*</b></label>
                               <input id="no_telp_ext_ktr" type="name" class="form-control" name="no_telp_ext_ktr" tabindex="1"  autofocus value="{{ $user->no_telp_ext_ktr }}" placeholder="Masukkan No. Telp ext Kantor" readonly>
                             </div>
           
                             <div class="form-group">
                               <label for="nik">Nomor Induk Karyawan <b class="text-danger">*</b></label>
                               <input id="nik" type="name" class="form-control" name="nik" tabindex="1"  autofocus value="{{ $user->nik }}" placeholder="Masukkan Nomor Induk Karyawan Anda" readonly>
                             </div>
           
                             <div class="form-group">
                               <label for="no_rek_bni">Nomor Rekening BNI 46 <b class="text-danger">*</b></label>
                               <input id="no_rek_bni" type="name" class="form-control" name="no_rek_bni" tabindex="1"  autofocus value="{{ $user->no_rek_bni }}" placeholder="Masukkan Nomor Rekening BNI Anda" readonly> 
                             </div>
           
                             <div class="form-group">
                               <label for="divisi">Divisi / Bagian / Jabatan <b class="text-danger">*</b></label>
                               <input id="divisi" type="name" class="form-control" name="divisi" tabindex="1"  autofocus value="{{ $user->divisi }}" placeholder="Masukkan Divisi / Bagian / Jabatan Anda" readonly>
           
                               {{-- <select id="divisi" name="divisi" class="form-select form-control @error('divisi') is-invalid @enderror"  >
                                 <option value="">-- Pilih Divisi --</option>
                                 <option {{ (old('divisi') == 'Ketua Pengurus') ? 'selected' : '' }}>Ketua Pengurus</option>
                                 <option {{ (old('divisi') == 'Pengurus') ? 'selected' : '' }}>Pengurus</option>       
                                 <option {{ (old('divisi') == 'Pengawas') ? 'selected' : '' }}>Pengawas</option>       
                                 <option {{ (old('divisi') == 'Anggota') ? 'selected' : '' }}>Anggota</option>       
                               </select> --}}
                             </div>
           
                             <div class="row">
                               <div class="col-12 col-sm-6 col-lg-4">
                                 <div class="form-group">
                                   <label for="tgl_msk_prsh">Tanggal Masuk ke Perusahaan <b class="text-danger">*</b></label>
                                   <input id="tgl_msk_prsh" type="date" class="form-control" name="tgl_msk_prsh" tabindex="1"  autofocus value="{{ $user->tgl_msk_prsh }}" readonly>
                                 </div>
                               </div>
                               <div class="col-12 col-sm-6 col-lg-8">
                                 <div class="form-group">
                                   <label for="stat_karyawan">Status Karyawan <b class="text-danger">*</b></label>
                                   <input id="stat_karyawan" type="name" class="form-control" name="stat_karyawan" tabindex="1"  autofocus value="{{ $user->stat_karyawan }}" readonly>
                                   {{-- <select id="stat_karyawan" name="stat_karyawan" class="form-select form-control"  >
                                     <option value="">-- Pilih Status Karyawan --</option>
                                     <option {{ (old('stat_karyawan') == 'Karyawan Tetap') ? 'selected' : '' }}>Karyawan Tetap</option>
                                     <option {{ (old('stat_karyawan') == 'Kontrak') ? 'selected' : '' }}>Kontrak</option>       
                                   </select> --}}
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
                                   <label for="up_foto"><strong>Upload foto 2x3</strong> <b class="text-danger">*</b></label>
                                   <img src="{{ asset('storage/' . $user->up_foto) }}" class="img-preview-foto img-fluid mb-3" width="600" height="300">                                
                                   
                                   <a href="{{ asset('storage/' . $user->up_foto) }}" class="btn btn-primary" download="{{ $user->name }}-foto"><i class="bi bi-download"></i> Unduh Gambar</a>
                                 </div>
                               </div>
                               <div class="col-12 col-sm-6 col-lg-6">
                                 <div class="form-group">
                                   <label for="up_fc_ktp"><strong>Upload Foto Copy KTP</strong> <b class="text-danger">*</b></label>
                                   <img src="{{ asset('storage/' . $user->up_fc_ktp) }}" class="img-preview-foto img-fluid mb-3" width="600" height="300">
                                  
                                   <a href="{{ asset('storage/' . $user->up_fc_ktp) }}" class="btn btn-primary" download="{{ $user->name }}-foto-copy-ktp"><i class="bi bi-download"></i> Unduh Gambar</a>
                                 </div>
                               </div>
                             </div>
           
                             <div class="row">
                               <div class="col-12 col-sm-6 col-lg-6">
                                 <div class="form-group">
                                   <label for="up_id_card"><strong>Upload Foto Copy ID CARD</strong> <b class="text-danger">*</b></label>
                                   <img src="{{ asset('storage/' . $user->up_id_card) }}" class="img-preview-foto img-fluid mb-3" width="600" height="300">
                                  
                                   <a href="{{ asset('storage/' . $user->up_id_card) }}" class="btn btn-primary" download="{{ $user->name }}-foto-copy-id-card"><i class="bi bi-download"></i> Unduh Gambar</a>
                                 </div>
                               </div>
                               <div class="col-12 col-sm-6 col-lg-6">
                                 <div class="form-group">
                                   <label for="up_ttd"><strong>Upload Scan Tanda Tangan</strong> <b class="text-danger">*</b></label>
                                   <img src="{{ asset('storage/' . $user->up_ttd) }}" class="img-preview-foto img-fluid mb-3" width="600" height="300">
                                   
                                   <a href="{{ asset('storage/' . $user->up_ttd) }}" class="btn btn-primary" download="{{ $user->name }}-scan-ttd"><i class="bi bi-download"></i> Unduh Gambar</a>
                                 </div>
                               </div>
                             </div>

                             {{-- <div class="form-group">
                              <hr>
                             </div>

                             <div class="form-group mb-0 mt-3">
                              <label for="no_anggota">
                                <h6 style="color: #F2D230">Nomor Anggota</h6>
                              </label>
                            </div>

                             <form action="{{ route('users.update-no-anggota', $user) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                <label for="no_anggota">No Anggota <b class="text-danger">*</b></label>
                                <input id="no_anggota" type="no_anggota" class="form-control @error('no_anggota') is-invalid @enderror" name="no_anggota" tabindex="1" required autofocus value="{{ old('no_anggota', $user->no_anggota) }}" placeholder="Masukkan Nomor Anggota">
                                
                                @error('no_anggota')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="stat_akun">Status Akun <b class="text-danger">*</b></label>
                                <select id="stat_akun" name="stat_akun" class="form-select form-control @error('stat_akun') is-invalid @enderror"  required>
                                  <option value="">-- Pilih Status Akun --</option>
                                  <option {{ (old('stat_akun', $user->stat_akun) == 'Aktif') ? 'selected' : '' }}>Aktif</option>
                                  <option {{ (old('stat_akun', $user->stat_akun) == 'Non-Aktif') ? 'selected' : '' }}>Non-Aktif</option>       
                                </select>
                                
                                @error('stat_akun')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                <a href="{{ route('users.candidate') }}"><button type="button" class="btn btn-secondary mt-3" style="text-decoration: none;">Kembali</button></a>
                              </div>
                            </form> --}}
                    </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="form-group mb-0 mt-3">
                      <label for="konfirmasi_user">
                        <h6 style="color: #F2D230">Konfirmasi Penerimaan Anggota Koperasi</h6>
                      </label>
                    </div>

                    <div class="form-group">
                      <label for="no_telp_ext_ktr">Apakah Anda menerima <strong>{{ $user->name }}</strong> sebagai Anggota Koperasi Polibatam?</label>
                    </div>
                    
                    <div class="form-group">
                      <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Anda yakin menolak anggota?')" class="btn btn-danger mr-3">Tolak</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTerimaAnggota">
                          Terima
                        </button>
                      </form>

                      <!-- Modal -->
                      <div class="modal fade" id="modalTerimaAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penerimaan Anggota</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('users.update-no-anggota', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                  <label for="no_anggota">No Anggota <b class="text-danger">*</b></label>
                                  <input id="no_anggota" type="no_anggota" class="form-control @error('no_anggota') is-invalid @enderror" name="no_anggota" tabindex="1" required autofocus value="{{ old('no_anggota', $user->no_anggota) }}" placeholder="Masukkan Nomor Anggota">
                                  
                                  @error('no_anggota')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                  @enderror
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-success">Terima</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script>
        @if ($editNoAnggota)
            document.getElementById('no_anggota').focus();
        @endif
        setTimeout(function() {
            $(".alert").alert('close');
        }, 5000);

        window.setTimeout(function() {
            window.location.href = "{{ route('users.candidate') }}";
        }, 2000);
    </script>
@endpush
