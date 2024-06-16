@extends('layouts.master')
@section('title', 'Seats')
@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h2>Seats Data</h2>
                                <a href="/seats/tambah" class="btn btn-primary">Add New</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Seat Name</th>
                                                <th scope="col">Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($seats as $s)
                                                <tr class="">
                                                    <td>{{ $s['seats_name'] }}</td>
                                                    <td>{{ $s['status'] }}</td>
                                                    <td>
                                                        <a href="/seats/edit/{{ $s['id'] }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <a href="/seats/hapus/{{ $s['id'] }}"
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

@endsection
