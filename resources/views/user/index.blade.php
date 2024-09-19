@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h1>Users Page</h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->password }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editUserModal{{ $user->id }}">
                                                    Edit
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="editUserModalLabel{{ $user->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editUserModalLabel{{ $user->id }}">Edit
                                                                    User: {{ $user->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST" action="/user/update/{{ $user->id }}">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="userName{{ $user->id }}">Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="userName{{ $user->id }}" name="name"
                                                                            value="{{ $user->name }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="userEmail{{ $user->id }}">Email</label>
                                                                        <input type="email" class="form-control"
                                                                            id="userEmail{{ $user->id }}"
                                                                            name="email" value="{{ $user->username }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="userPassword{{ $user->id }}">New
                                                                            Password</label>
                                                                        <input type="password" class="form-control"
                                                                            id="userPassword{{ $user->id }}"
                                                                            name="password"
                                                                            placeholder="Enter new password if changing">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
@endsection
