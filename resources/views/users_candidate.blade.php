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
                    <div class="card-header">Verifikasi Calon Anggota</div>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    

                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    {{-- <th scope="col">Data Anggota</th> --}}
                                    <th scope="col" colspan="2">Aksi</th>
                                    {{-- <th scope="col">Hapus</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $user) }}"><button class="btn btn-info" onclick="lihatDataCalon()" id="lihat-btn-calon">Verifikasi</button></span></a>
                                        </td>
                                        {{-- <td>
                                            <form method="POST" action="{{ route('users.approve', $user->id) }}">
                                                @csrf
                                                <button class="btn btn-success" type="submit">Setujui</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Anda yakin menolak anggota?')" class="btn btn-danger">Tolak</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-lg-end mt-4">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
