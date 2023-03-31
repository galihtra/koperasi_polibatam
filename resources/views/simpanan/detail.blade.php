@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Simpanan Anggota Koperasi</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Total Simpanan Anggota Koperasi per Bulan</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <div>
                                @foreach ($total_simpanan_perbulan as $simpanan)
                                    <p>Nama : <strong>{{ $simpanan['nama'] }}</strong></p>
                                    <p>Nomor Anggota : <strong>{{ $simpanan['no_anggota'] }}</strong></p>
                                    <p>Total Simpanan : <strong>Rp.
                                            {{ number_format(array_sum($simpanan) - intval($simpanan['no_anggota']) - intval($simpanan['nama']), 0, ',', '.') }}</strong>
                                    </p>
                                @endforeach
                            </div>
                            <form action="{{ route('simpanan.detail', ['id' => $id]) }}" method="GET">
                                <div class="form-group row">
                                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                    <div class="col-sm-4">
                                        <select name="tahun" id="tahun" class="form-control">
                                            @for ($i = date('Y'); $i >= 2000; $i--)
                                                <option value="{{ $i }}"
                                                    {{ $i == $tahun ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                        @if ($tahun)
                                            <a href="{{ route('simpanan.detail', ['id' => $id]) }}"
                                                class="btn btn-danger">Reset</a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Bulan</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($total_simpanan_perbulan as $simpanan)
                                        <tr>
                                            <td>Januari</td>
                                            <td>Rp. {{ number_format($simpanan['total_simpanan_januari'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Februari</td>
                                            <td>Rp. {{ number_format($simpanan['total_simpanan_februari'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Maret</td>
                                            <td>Rp. {{ number_format($simpanan['total_simpanan_maret'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>April</td>
                                            <td>Rp. {{ number_format($simpanan['total_simpanan_april'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mei</td>
                                            <td>Rp. {{ number_format($simpanan['total_simpanan_mei'], 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Juni</td>
                                            <td>Rp. {{ number_format($simpanan['total_simpanan_juni'], 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Juli</td>
                                            <td>Rp. {{ number_format($simpanan['total_simpanan_juli'], 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Agustus</td>
                                            <td>Rp. {{ number_format($simpanan['total_simpanan_agustus'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>September</td>
                                            <td>Rp. {{ number_format($simpanan['total_simpanan_september'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Oktober</td>
                                            <td>Rp. {{ number_format($simpanan['total_simpanan_oktober'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>November</td>
                                            <td>Rp. {{ number_format($simpanan['total_simpanan_november'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Desember</td>
                                            <td>Rp. {{ number_format($simpanan['total_simpanan_desember'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
