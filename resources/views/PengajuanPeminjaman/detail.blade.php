@extends('layouts.main')
@section('styles')
    <style>
        .card {
            z-index: 0;
        }

        .top {
            padding-top: 40px;
            padding-left: 13% !important;
            padding-right: 13% !important;
        }

        /* Icon progressbar */
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: #ffffff;
            padding-left: 0px;
            margin-top: 30px;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 33.33%;
            float: left;
            position: relative;
            font-weight: 400;
        }

        #progressbar.step0:before {
            font-family: FontAwesome;
            content: "\f10c";
            color: #fff;
        }

        #progressbar li:before {
            width: 40px;
            height: 40px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            background: #C5CAE9;
            border-radius: 50%;
            margin: auto;
            padding: 0px;
        }

        /* ProgressBar connectors */
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 12px;
            background: #C5CAE9;
            position: absolute;
            left: 0;
            top: 16px;
            z-index: -1;
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: absolute;
            left: -50%;
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            left: 50%;
        }

        /* Color number of the step and the connector before it */
        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #651FFF;
        }

        #progressbar li.active:before {
            font-family: FontAwesome;
            content: "\f00c";
        }

        .icon {
            width: 60px;
            height: 60px;
            margin-right: 15px;
        }

        .icon-content {
            padding-bottom: 20px;
        }

        @media screen and (max-width: 992px) {
            .icon-content {
                width: 50%;
            }
        }
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Pinjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="/">Beranda Saya</a>
                </div>
                <div class="breadcrumb-item">Detail Pinjaman</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row d-flex justify-content-between px-3 top">
                            <div class="d-flex">
                                <h5>PINJAMAN <span class="text-primary font-weight-bold">#{{ $loan->id }}</span></h5>
                            </div>
                            <div class="d-flex flex-column text-sm-right">
                                <p class="mb-0">Peminjaman Mendesak</p>
                                <p>Total Pinjaman <span class="font-weight-bold">@currency($loan->amount)</span></p>
                            </div>
                        </div>

                        <!-- Add class 'active' to progress -->
                        <div class="row d-flex justify-content-center">
                            <div class="col-12">
                                <ul id="progressbar" class="text-center">
                                    <li class="{{ $loan->isStatusActiveOrPassed('Menunggu Bendahara') ? 'active' : '' }} step0">
                                    </li>
                                    <li
                                        class="{{ $loan->isStatusActiveOrPassed('Menunggu Ketua') ? 'active' : '' }} step0">
                                    </li>
                                    <li
                                        class="{{ $loan->isStatusActiveOrPassed('Ditolak') ? 'active' : ($loan->isStatusActiveOrPassed('Disetujui') ? 'active' : '') }}">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row justify-content-between top">
                            <div class="row d-flex icon-content">
                                <img class="icon" src="/assets/img/verif_bendahara.png">
                                <div class="d-flex flex-column">
                                    <p class="font-weight-bold">Menunggu<br>Bendahara</p>
                                </div>
                            </div>
                            <div class="row d-flex icon-content">
                                <img class="icon" src="/assets/img/verif_ketua.png">
                                <div class="d-flex flex-column">
                                    <p class="font-weight-bold">Menunggu<br>Ketua</p>
                                </div>
                            </div>
                            <div class="row d-flex icon-content">
                                @if ($loan->isStatusActiveOrPassed('Ditolak'))
                                <img class="icon" src="/assets/img/reject.png">
                                    <div class="d-flex flex-column">
                                        <p class="font-weight-bold">Pinjaman<br>Ditolak</p>
                                    </div>
                                @elseif($loan->isStatusActiveOrPassed('Disetujui'))
                                    <img class="icon" src="/assets/img/accept.png">
                                    <div class="d-flex flex-column">
                                        <p class="font-weight-bold">Pinjaman<br>Disetujui</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        

                            @if ($loan->isStatusActiveOrPassed('Ditolak'))
                                <div class="row d-flex mr-5 ml-4">
                                    <div class="ml-auto text-left">
                                        <div class="keterangan_tolak-container"
                                            style="max-height: 100px; overflow-y: auto;">
                                            <p class="keterangan_tolak">Keterangan: <em>{{ $loan->keterangan_tolak }}</em></p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Peminjaman Anggota Koperasi</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <div>
                                <p>Jenis Pinjaman Mendesak: <strong>{{ $loan->jenis_pinjaman }}</strong></p>
                                <p>Nama Anggota: <strong>{{ $loan->user->name }}</strong></p>
                                <p>Nomor Anggota / NIK: <strong>{{ $loan->user->no_ktp }}</strong></p>
                                <p>Bagian: <strong>{{ $loan->user->divisi }}</strong></p>
                                <p>Status Karyawan: <strong>{{ $loan->user->stat_karyawan }}</strong></p>
                                @if($loan->user->alamat_ktp)
                                    <p>Alamat: <strong>{{ $loan->user->alamat_ktp }}</strong></p>
                                @elseif($loan->user->alamat_pri)
                                    <p>Alamat: <strong>{{ $loan->user->alamat_pri }}</strong></p>
                                @else
                                    <p>Alamat: <strong>Alamat tidak tersedia</strong></p>
                                @endif
                                <p>No Telp/HP: <strong>{{ $loan->user->no_hp }}</strong></p>
                                <p>Total Pinjaman: <strong>@currency($loan->amount)</strong></p>
                                <p>Status: <strong>{{ $loan->status }}</strong></p>
                                @if ($loan->status == 'Ditolak')
                                    <p>Keterangan Tolak: <strong>{{ $loan->keterangan_tolak }}</strong></p>
                                @endif
                                <p>Tanggal Akhir Pelunasan: <strong>{{ $loan->repayment_date }}</strong></p>
                                <p>Nomor Rekening: <strong>{{ $loan->user->no_rek_bni }}</strong></p>
                                <p>email: <strong>{{ $loan->user->email }}</strong></p>
                                <p>Alasan Peminjaman: <strong>{{ $loan->alasan_pinjam }}</strong></p>
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="amount_per_month">Jumlah per bulan:</label>
                                            <input type="text" name="amount_per_month" id="amount_per_month"
                                                class="form-control"
                                                value="{{ 'Rp. ' . number_format($loan->amount_per_month, 2, ',', '.') }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    @if ($loan->ttd)
                                        <div style="position: relative; margin-right: 40px;">
                                            <a href="{{ asset('storage/' . $loan->ttd) }}" download class="btn btn-info"
                                                style="position: absolute; top: 0;">Download</a>
                                            <img alt="image" src="{{ asset('storage/' . $loan->ttd) }}" class=""
                                                width="300" height="300">
                                        </div>
                                    @endif

                                    @if ($loan->up_ket)
                                        <div style="position: relative;">
                                            <a href="{{ asset('storage/' . $loan->up_ket) }}" download class="btn btn-info"
                                                style="position: absolute; top: 0;">Download</a>
                                            <img alt="image" src="{{ asset('storage/' . $loan->up_ket) }}"
                                                class="" width="300" height="300">
                                        </div>
                                    @endif
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
