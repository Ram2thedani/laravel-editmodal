@extends('layouts.master')
@section('title', 'User')
@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h2>Halaman Data User</h2>
                                <a href="/user/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah
                                    Data</i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Username</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $u)
                                                <tr class="">
                                                    <td>{{ $u['name'] }}</td>
                                                    <td>{{ $u['username'] }}</td>
                                                    <td>
                                                        <a href="/user/edit/{{ $u['id'] }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <a href="/user/hapus/{{ $u['id'] }}"
                                                            class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif



@endsection
