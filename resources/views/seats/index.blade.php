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
                                                        <a href="/seats/hapus/{{ $s['id'] }}" class="btn btn-danger"
                                                            onclick="confirmDelete(event, '{{ $s['id'] }}')">Hapus</a>
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

    <script>
        function confirmDelete(event, id) {
            event.preventDefault(); // Prevent the default link click behavior
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    }).then(() => {
                        // Navigate to the delete URL after the confirmation
                        window.location.href = '/seats/hapus/' + id;
                    });
                }
            });
        }
    </script>

@endsection
