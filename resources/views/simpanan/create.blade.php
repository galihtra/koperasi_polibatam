@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Simpanan Anggota</h1>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('simpanan.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    @if ($errors->has('user_id'))
                                        <div class="invalid-feedback">{{ $errors->first('user_id') }}</div>
                                    @endif
                                    <label for="user_id">Anggota</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        @foreach ($users as $user)
                                            @if ($user->stat_akun == 'Aktif')
                                                <option value="{{ $user->id }}">{{ $user->no_anggota }} -
                                                    {{ $user->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_simpanan">Jenis Simpanan</label>
                                    <select name="jenis_simpanan" id="jenis_simpanan" class="form-control">
                                        <option value="pokok">Simpanan Pokok</option>
                                        <option value="wajib">Simpanan Wajib</option>
                                        <option value="sukarela">Simpanan Sukarela</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Nominal Rupiah</label>
                                    <input type="text" name="jumlah_text" id="jumlah_text" class="form-control" required>
                                    <input type="hidden" name="jumlah" id="jumlah">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('simpanan.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
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
    </script>
@endsection
