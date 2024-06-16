@extends('layouts.master')
@section('title', 'Tambah User')
@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h2>Edit Data User</h2>
                            </div>
                            <div class="card-body">
                                <form action="/user/update/{{ $user['id'] }}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="name" id=""
                                            aria-describedby="helpId" placeholder="Name" value="{{ $user['name'] }}" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id=""
                                            aria-describedby="helpId" placeholder="=Username"
                                            value="{{ $user['username'] }}" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Password</label>
                                        <input type="text" class="form-control" name="password" id=""
                                            aria-describedby="helpId" placeholder="Password"
                                            value="{{ $user['password'] }}" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
