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

        {{-- Start biaya bunga --}}
        <div class="card">
           <div class="card-body table-responsive">
            <h6>Daftar Biaya Bunga Pinjaman</h6><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Bunga</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bungas as $bunga)
                        <tr>
                            <td>{{ $bunga->id }}</td>
                            <td>{{ $bunga->nama }}</td>
                            <td>{{ $bunga->nilai }}%</td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEditBunga{{ $bunga->id }}">Edit</button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modalEditBunga{{ $bunga->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal Ubah Nilai Bunga Pinjaman</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('persentase.bunga.update', $bunga->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <input id="nama" type="name" class="form-control @error('nama') is-invalid @enderror" tabindex="1" value="{{ $bunga->nama }}" readonly>
                                                    </div>
                                                <div class="form-group">
                                                    <label for="">Nilai</label>
                                                    <div class="input-group mb-3">
                                                        <input id="nilai" name="nilai" type="text" class="form-control @error('nilai') is-invalid @enderror" placeholder="Masukkan Nilai {{ $bunga->nama }}" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $bunga->nilai }}" autofocus>
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
           </div>
        </div>

            
        {{-- End Biaya Bunga --}}

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
