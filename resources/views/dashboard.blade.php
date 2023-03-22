@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        {{-- Start icon anggota --}}
        <div class="row">
            <div class="col-lg-4 col-md-8 col-sm-8 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalAdmins  }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Anggota Laki-Laki</h4>
                        </div>
                        <div class="card-body">
                            {{ $stats['laki_laki'] }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Anggota Perempuan</h4>
                        </div>
                        <div class="card-body">
                            {{ $stats['perempuan'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End icon anggota --}}

        {{-- Statistik --}}
        <div class="mt-5">
            <canvas id=""></canvas>
        </div>

    </section>
@endsection
