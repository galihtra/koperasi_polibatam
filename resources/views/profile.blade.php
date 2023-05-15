@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    @if (!auth()->user()->admin)
                        <a href="/">Dashboard</a>
                    @else
                        <a href="/dashboard">Dashboard</a>
                    @endif
                </div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h2 class="section-title">Hi, {{ auth()->user()->name }}!</h2>
            <p class="section-lead">
                Ubah informasi tentang diri Anda di halaman ini.
            </p>

            {{-- Content --}}
            <div class="row mt-sm-4">
                {{-- Photo --}}
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ asset('storage/' . auth()->user()->up_foto) }}"
                                class="rounded-circle profile-widget-picture">


                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $user->no_anggota }}<div
                                    class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> {{ $user->name }}
                                </div>
                            </div>Tanggal bergabung {{ $user->approved_at }}</div>
                    </div>
                </div>
                {{-- Update form --}}
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="name">Nama lengkap</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="{{ auth()->user()->name }}" required>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ auth()->user()->email }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Upload Photo Baru</label>
                                        <input type="file" name="up_foto" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- End Form --}}
            </div>
            {{-- End Content --}}
        </div>
    </section>
@endsection
