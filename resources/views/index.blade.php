<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Form Dendaftaran Koperasi Polibatam</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="/assets/css/montserrat-font.css" />
    <link rel="stylesheet" type="text/css" href="/assets/fonts/material-design-iconic-font.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/fonts/material-design-iconic-font.css" />
    <!-- Main Style Css -->
    <link rel="stylesheet" href="assets/css/register-style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  </head>
  <body class="form-v10">
    <div class="page-content">
      <div class="form-v10-content">
        <form class="form-detail" action="#" method="post" id="myform">
          <div class="form-left">
            <h2>Data Pribadi</h2>
            <div class="form-row">
              <input type="text" name="company" class="company" id="company" placeholder="Nama Lengkap" required />
            </div>
            <div class="form-group">
              <div class="form-row form-row-1">
                <input type="text" name="first_name" id="first_name" class="input-text" placeholder="No KTP" required />
              </div>
              <div class="form-row form-row-2">
                <input type="text" name="last_name" id="last_name" class="input-text" placeholder="Masa Berlaku" required />
              </div>
            </div>
            <div class="form-row">
              <input type="text" name="company" class="company" id="company" placeholder="Tempat & Tanggal Lahir" required />
            </div>
            <div class="form-row">
              <select name="position">
                <option value="position">Jenis Kelamin</option>
                <option value="director">Laki-laki</option>
                <option value="manager">Perempuan</option>
              </select>
              <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
              </span>
            </div>
            <div class="form-group">
              <div class="form-row form-row-1">
                <input type="text" name="first_name" id="first_name" class="input-text" placeholder="Alamat (Sesuai KTP)" required />
              </div>
              <div class="form-row form-row-2">
                <input type="text" name="last_name" id="last_name" class="input-text" placeholder="Kelurahan" required />
              </div>
            </div>
            <div class="form-group">
              <div class="form-row form-row-1">
                <input type="text" name="first_name" id="first_name" class="input-text" placeholder="Kecamatan" required />
              </div>
              <div class="form-row form-row-2">
                <input type="text" name="last_name" id="last_name" class="input-text" placeholder="Kabupaten" required />
              </div>
            </div>
            <div class="form-group">
              <div class="form-row form-row-1">
                <input type="text" name="first_name" id="first_name" class="input-text" placeholder="Alamat (T. Sesuai KTP)" required />
              </div>
              <div class="form-row form-row-2">
                <input type="text" name="last_name" id="last_name" class="input-text" placeholder="Kelurahan" required />
              </div>
            </div>
            <div class="form-group">
              <div class="form-row form-row-1">
                <input type="text" name="first_name" id="first_name" class="input-text" placeholder="Kecamatan" required />
              </div>
              <div class="form-row form-row-2">
                <input type="text" name="last_name" id="last_name" class="input-text" placeholder="Kabupaten" required />
              </div>
            </div>

            <div class="form-group">
              <div class="form-row form-row-1">
                <input type="text" name="first_name" id="first_name" class="input-text" placeholder="No. Telepon HP" required />
              </div>
              <div class="form-row form-row-2">
                <input type="text" name="last_name" id="last_name" class="input-text" placeholder="No. Telepon Rumah" required />
              </div>
            </div>
            <div class="form-row">
              <input type="text" name="company" class="company" id="company" placeholder="Status Tempat Tinggal" required />
            </div>
            <div class="form-group">
              <div class="form-row form-row-1">
                <input type="text" name="first_name" id="first_name" class="input-text" placeholder="Pendidikan Terakhir" required />
              </div>
              <div class="form-row form-row-2">
                <input type="text" name="last_name" id="last_name" class="input-text" placeholder="Status Perkawinan" required />
              </div>
            </div>
            <div class="form-group">
              <div class="form-row form-row-1">
                <input type="text" name="first_name" id="first_name" class="input-text" placeholder="Nama Suami/Istri" required />
              </div>
              <div class="form-row form-row-2">
                <input type="text" name="last_name" id="last_name" class="input-text" placeholder="Jumlah Anak" required />
              </div>
            </div>
            <div class="form-row">
              <input type="text" name="company" class="company" id="company" placeholder="Nama Ibu Kandung Pemohon" required />
            </div>
            <div class="form-row">
              <input type="text" name="company" class="company" id="company" placeholder="NPWP Pribadi" required />
            </div>
            <div class="form-group">
              <div class="form-row form-row-3">
                <input type="text" name="business" class="business" id="business" placeholder="Nama Ahli Waris" required />
              </div>
              <div class="form-row form-row-4">
                <select name="employees">
                  <option value="employees">H. Ahli Waris</option>
                  <option value="trainee">Istri/Suami</option>
                  <option value="colleague">Orang Tua</option>
                  <option value="associate">Anak</option>
                  <option value="associate">Lainnya</option>
                </select>
                <span class="select-btn">
                  <i class="zmdi zmdi-chevron-down"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-right">
            <h2>Data Pekerjaan</h2>
            <div class="form-row">
              <input type="text" name="street" class="street" id="street" placeholder="No. Telp EXT Kantor" required />
            </div>
            <div class="form-row">
              <input type="text" name="additional" class="additional" id="additional" placeholder="N.I.K" required />
            </div>
            <div class="form-row">
              <input type="text" name="additional" class="additional" id="additional" placeholder="No. Rekening BNI" required />
            </div>
            <div class="form-row">
              <input type="text" name="additional" class="additional" id="additional" placeholder="Divisi/Bagian/Jabatan" required />
            </div>
            <div class="form-row">
              <input type="text" name="additional" class="additional" id="additional" placeholder="Tanggal Masuk Ke Perusaan" required />
            </div>
            <div class="form-row">
              <select name="country">
                <option value="country">Status Karyawan</option>
                <option value="Vietnam">Tetap</option>
                <option value="Malaysia">Kontrak</option>
              </select>
              <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
              </span>
            </div>
            <div class="form-row">
              <label for="formFile" class="form-label">Upload Foto Copy KTP</label>
              <input class="form-control" type="file" id="formFile" />
            </div>
            <div class="form-row">
              <label for="formFile" class="form-label">Upload Tanda Tangan</label>
              <input class="form-control" type="file" id="formFile" />
            </div>
            <div class="form-row">
              <label for="formFile" class="form-label">Upload Foto 2x3</label>
              <input class="form-control" type="file" id="formFile" />
            </div>
            <div class="form-row">
              <label for="formFile" class="form-label">Upload Foto Copy ID Card</label>
              <input class="form-control" type="file" id="formFile" />
            </div>

            <div class="form-row-last">
              <input type="submit" name="register" class="register" value="Daftar" />
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
  <!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
