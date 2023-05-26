@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Start total simpanan --}}
        <div class="row">
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
        {{-- End total simpanan --}}

        {{-- Chart Simpanan --}}
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan Total Simpanan</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="chart" height="158"></canvas>
                    </div>
                </div>
            </div>

            {{-- Pengajuan Saya --}}
            <div class="col-lg-4">
                <div class="card gradient-bottom">
                    <div class="card-header">
                        <h4>Pinjaman Saya</h4>
                        <div class="card-header-action dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Mendesak</a>
                            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <li class="dropdown-title">Pilih</li>
                                <li><a href="#" class="dropdown-item">Pinjaman Biasa</a></li>
                                <li><a href="#" class="dropdown-item">Pinjaman Khusus</a></li>
                                <li><a href="#" class="dropdown-item">Pinjaman Mendesak</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body" id="top-5-scroll">
                        {{-- Pengajuan Saya --}}
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($pinjamanUrgent as $pinjaman)
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="../assets/img/products/product-3-50.png"
                                        alt="product">
                                    <div class="media-body">
                                        <div class="float-right">
                                            <div class="font-weight-600 text-muted text-small">
                                                <a href="{{ route('pinjaman.urgent.detail', $pinjaman->id) }}">
                                                    <span
                                                        class="badge {{ $pinjaman->status == 'Disetujui' ? 'bg-success' : 'bg-warning' }} text-white">{{ $pinjaman->status }}</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-title">{{ $pinjaman->jenis_pinjaman }}</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="64%"></div>
                                                <div class="budget-price-label">@currency($pinjaman->amount)</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-visa" data-width="43%"></div>
                                                <div class="budget-price-label">@currency($pinjaman->amount_per_month)
                                                    ({{ $pinjaman->duration }} bulan)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>


                    </div>


                    <div class="card-footer pt-3 d-flex justify-content-center">
                        <div class="budget-price justify-content-center">
                            <div class="budget-price-square bg-primary" data-width="20"></div>
                            <div class="budget-price-label">Total Pinjaman</div>
                        </div>
                        <div class="budget-price justify-content-center">
                            <div class="budget-price-square bg-visa" data-width="20"></div>
                            <div class="budget-price-label">Cicilan Perbulan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pengajuan Pinjaman Saya --}}
        <div class="row">
            <div class="col-md-4">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="far fa-question-circle"></i>
                        </div>
                        <h4>14</h4>
                        <div class="card-description">Customers need help</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tickets-list">
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>My order hasn't arrived yet</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Laila Tazkiah</div>
                                    <div class="bullet"></div>
                                    <div class="text-primary">1 min ago</div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Please cancel my order</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Rizal Fakhri</div>
                                    <div class="bullet"></div>
                                    <div>2 hours ago</div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Do you see my mother?</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Syahdan Ubaidillah</div>
                                    <div class="bullet"></div>
                                    <div>6 hours ago</div>
                                </div>
                            </a>
                            <a href="features-tickets.html" class="ticket-item ticket-more">
                                View All <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pengajuan Pinjaman Saya --}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Pengajuan Pinjaman Saya</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Jenis Pinjaman</th>
                                    <th>Kebutuhan Pinjaman</th>
                                    <th>Status</th>
                                    <th>Jumlah Pinjaman</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($pinjamanUrgent as $pinjaman)
                                    <tr>
                                        <td class="text-primary">Peminjaman Mendesak</td>
                                        <td class="font-weight-600">{{ $pinjaman->jenis_pinjaman }}</td>
                                        <td>
                                            <div class="badge badge-warning">Menunggu</div>
                                        </td>
                                        <td>@currency($pinjaman->amount)</td>
                                        <td>
                                            <a href="{{ route('pinjaman.urgent.detail', $pinjaman->id) }}" class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelsPokok) !!}, // asumsikan semua jenis memiliki label yang sama
                datasets: [{
                        label: 'Simpanan Pokok',
                        data: {!! json_encode($valuesPokok) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Simpanan Wajib',
                        data: {!! json_encode($valuesWajib) !!},
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Simpanan Sukarela',
                        data: {!! json_encode($valuesSukarela) !!},
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    },
                ]
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
@endsection
