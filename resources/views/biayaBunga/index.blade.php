@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Start biaya bunga --}}
        <div class="row">
            @foreach($bungas as $bunga)
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h4 style="color: grey">{{ $bunga->nama }}</h4>
                      <div class="card-header-action">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEditBunga{{ $bunga->id }}">Ubah</button>
                      </div>
                    </div>
                    <div class="card-body">
                      <p style="font-size: 50px; color:black"><strong>{{ $bunga->nilai }}%</strong></p>
                    </div>
                  </div>
                </div>
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
                                                <input id="nama" type="text" class="form-control" value="{{ $bunga->nama }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nilai">Nilai</label>
                                                <div class="input-group">
                                                    <input id="nilai" name="nilai" type="text" class="form-control @error('nilai') is-invalid @enderror"
                                                        placeholder="Masukkan Nilai {{ $bunga->nama }}"
                                                        value="{{ $bunga->nilai }}" autofocus>
                                                    <span class="input-group-text">%</span>
                                                    @error('nilai')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End modal --}}
                @endforeach
        </div>
        {{-- End biaya bunga --}}

    </section>
@endsection
