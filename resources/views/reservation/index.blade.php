@extends('layouts.master')
@section('title', 'Reservation')
@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card text-bg-secondary">
                            <div class="card-header">
                                <h1>Select Seats</h1>
                            </div>
                            <div class="card-body">
                                <div class="card grey">
                                    <center>
                                        <p>Screen</p>
                                    </center>
                                </div>
                                <form action="/checkout" method="post">
                                    @csrf
                                    <div class="seat-container">
                                        @foreach ($seats as $seat)
                                            <button type="button"
                                                class="seat
                                            @if ($seat->status == 'Taken') seat-taken
                                            @else seat-available @endif"
                                                data-seat-id="{{ $seat->id }}"
                                                @if ($seat->status == 'Taken') disabled @endif>
                                                {{ $seat->seats_name }}
                                            </button>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="selected_seats" id="selected_seats">

                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span>Selected seat(s): </span>
                                    <span id="selected-seats"></span>
                                </li>
                            </ul>
                            <button type="submit" class="btn btn-primary">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .seat-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        .seat {
            padding: 10px;
            border: 1px solid #ccc;
            cursor: pointer;
            text-align: center;
            background-color: #d4edda;
            transition: background-color 0.3s;
        }

        .seat-taken {
            background-color: #f8d7da;
            cursor: not-allowed;
        }

        .seat-selected {
            background-color: #09c735;
            color: white;
        }

        .grey {
            background-color: rgb(199, 199, 199);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seats = document.querySelectorAll('.seat-available');
            const selectedSeatsContainer = document.getElementById('selected-seats');
            const selectedSeatsInput = document.getElementById('selected_seats');
            let selectedSeats = [];

            seats.forEach(seat => {
                seat.addEventListener('click', function() {
                    const seatId = this.getAttribute('data-seat-id');
                    const seatName = this.textContent;

                    if (selectedSeats.includes(seatId)) {
                        selectedSeats = selectedSeats.filter(id => id !== seatId);
                        this.classList.remove('seat-selected');
                    } else {
                        selectedSeats.push(seatId);
                        this.classList.add('seat-selected');
                    }

                    selectedSeatsContainer.textContent = selectedSeats.map(id => {
                        const seatElement = document.querySelector(
                            `[data-seat-id="${id}"]`);
                        return seatElement ? seatElement.textContent : '';
                    }).join(', ');

                    // Update the hidden input with selected seat IDs
                    selectedSeatsInput.value = selectedSeats.join(',');
                });
            });
        });
    </script>

@endsection
