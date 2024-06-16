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
                                <h2>Edit Seat</h2>
                            </div>
                            <div class="card-body">
                                <form action="/seats/simpan" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Seat Name</label>
                                        <input type="text" class="form-control" name="seats_name" id=""
                                            aria-describedby="helpId" placeholder="Seats Name" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Status</label>
                                        <select class="form-control" name="status" id="">
                                            <option value="Available">Available</option>
                                            <option value="Taken">Taken</option>
                                        </select>
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
