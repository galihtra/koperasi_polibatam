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
                    @if (!auth()->user()->admin)
                        <a href="/">Dashboard</a>
                    @else
                        <a href="/dashboard">Dashboard</a>
                    @endif
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
                                <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                                <div class="d-flex flex-column">
                                    <p class="font-weight-bold">Menunggu<br>Bendahara</p>
                                </div>
                            </div>
                            <div class="row d-flex icon-content">
                                <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
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
                                    <img class="icon" src="https://i.imgur.com/TkPm63y.png">
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
        </div>
    </section>
@endsection
