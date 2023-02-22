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
              10
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
              42
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
              1,201
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- End icon anggota --}}

    {{-- Statistik --}}
    <div class="card">
      <div class="card-header">
        <h4>Statistics</h4>
        <div class="card-header-action">
          <a href="#" class="btn active">Week</a>
          <a href="#" class="btn">Month</a>
          <a href="#" class="btn">Year</a>
        </div>
      </div>
      <div class="card-body">
        <canvas id="myChart2" height="180"></canvas>
        <div class="statistic-details mt-1">
          <div class="statistic-details-item">
            <div class="text-small text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</div>
            <div class="detail-value">$243</div>
            <div class="detail-name">Today</div>
          </div>
          <div class="statistic-details-item">
            <div class="text-small text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</div>
            <div class="detail-value">$2,902</div>
            <div class="detail-name">This Week</div>
          </div>
          <div class="statistic-details-item">
            <div class="text-small text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</div>
            <div class="detail-value">$12,821</div>
            <div class="detail-name">This Month</div>
          </div>
          <div class="statistic-details-item">
            <div class="text-small text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</div>
            <div class="detail-value">$92,142</div>
            <div class="detail-name">This Year</div>
          </div>
        </div>
      </div>
    </div>
    
  </section>
@endsection