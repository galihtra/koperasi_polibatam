@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $title }}</h1>
    </div>
    <div class="container-fluid">
        
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Verifikasi Pinjaman Mendesak</div>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    

                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jumlah Pinjaman</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Repayment Date</th>
                                    <th scope="col" colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($loans as $loan)
                                <tr>
                                    <td>{{ $loan->id }}</td>
                                    <td>{{ $loan->User->name }}</td>
                                    <td> @currency($loan->amount)</td>
                                    <td>{{ $loan->status }}</td>
                                    <td>{{ $loan->repayment_date }}</td>
                                    <td>
                                        <a href="{{ route('pinjaman.urgent.show', $loan->id) }}">
                                            <button class="btn btn-info" id="lihat-btn-calon">Lihat</button>
                                        </a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="d-flex justify-content-lg-end mt-4">
                            {{ $loans->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
