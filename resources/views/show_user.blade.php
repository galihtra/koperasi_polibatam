@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ $user->name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-lg-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ $user->email }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_anggota" class="col-lg-4 col-form-label text-md-right">No Anggota</label>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('users.update-no-anggota', $user) }}">
                                    @csrf
                                    @method('PUT')
                                    <input id="no_anggota" type="text"
                                        class="form-control @error('no_anggota') is-invalid @enderror" name="no_anggota">

                                    @error('no_anggota')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>

                                </form>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('users.candidate') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        @if ($editNoAnggota)
            document.getElementById('no_anggota').focus();
        @endif
        setTimeout(function() {
            $(".alert").alert('close');
        }, 5000);

        window.setTimeout(function() {
            window.location.href = "{{ route('users.candidate') }}";
        }, 2000);
    </script>
@endpush
