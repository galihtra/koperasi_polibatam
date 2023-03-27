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
                        <i class="bi bi-person-gear" style="font-size: 2rem; color: white"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalAdmins }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon " style="background-color: rgb(46, 46, 244)">
                        <i class="fas fa-male" style="font-size: 1.5rem; color: white"></i>
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
                    <div class="card-icon" style="background-color: hotpink">
                        <i class="fas fa-female" style="font-size: 1.5rem; color: white"></i>
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

        {{-- Charts Status Anggota --}}
        <div class="d-flex justify-content-center">
            <div class="col-lg-4">
                <canvas id="chart-anggota" class="w-100"></canvas>
            </div>
        </div>
        {{-- End Chart --}}

        {{-- Start jenis simpanan --}}
        <div class="row mt-5">
            <div class="col-lg-4 col-md-8 col-sm-8 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success float-right">
                        <i class="bi bi-cash-stack" style="font-size: 1.5rem; color: white"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Saldo Pokok</h4>
                        </div>
                        <div class="card-body">
                            Rp {{ number_format($pokokTotal) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger float-right">
                        <i class="bi bi-cash-coin" style="font-size: 1.5rem; color: white"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Saldo Wajib</h4>
                        </div>
                        <div class="card-body">
                            Rp {{ number_format($wajibTotal) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning float-right">
                        <i class="bi bi-coin" style="font-size: 1.5rem; color: white"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Saldo Sukarela</h4>
                        </div>
                        <div class="card-body">
                            Rp {{ number_format($sukarelaTotal) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End jenis simpanan --}}

        {{-- Chart Simpanan --}}
        <div class="">
            <canvas id="chart"></canvas>
        </div>
        {{-- End Chart --}}

    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Total Simpanan',
                    data: {!! json_encode($values) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    {{-- Chart Status --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
        var ctx = document.getElementById('chart-anggota').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Aktif', 'Tidak Aktif'],
                datasets: [{
                    label: 'Jumlah Anggota',
                    data: [{{ $anggota_aktif }}, {{ $anggota_tidak_aktif }}],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Anggota Aktif dan Tidak Aktif'
                    }
                }
            }
        });
    </script>
@endsection
