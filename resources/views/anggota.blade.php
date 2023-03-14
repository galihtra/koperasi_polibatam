@extends('layouts.main')

@section('content')
<section class="section">
    {{-- Header --}}
    <div class="section-header">
      <h1>Data Anggota</h1>
    </div>

    {{-- Body --}}
    <div class="section-body">
        <div class="card">
            <div class="card-body">
              <table class="table table-striped table-responsive-lg" id="table1">
                <thead>
                  <tr>
                    <th>Nomor Anggota</th>
                    <th>Nama</th>
                    <th>Total Simpanan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>4342201010</td>
                    <td>
                        Galih Tri Risky Andiko
                        <button class="bg-primary text-white border-0 rounded-sm"><a href="anggota/profile">Detail</a></button>
                    </td>
                    <td>
                        Rp. 50,000
                        <button class="bg-primary text-white border-0 rounded-sm">Detail</button>
                    </td>
                    <td>
                      <span class="badge bg-success text-white">Active</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div>
  </section>
@endsection