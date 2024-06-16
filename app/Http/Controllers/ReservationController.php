<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Seats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seats = Seats::all();
        return view('reservation.index', compact('seats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function checkout(Request $request)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Get the selected seats from the request
        $selectedSeats = explode(',', $request->input('selected_seats'));

        // Insert the selected seats into the reservation table
        foreach ($selectedSeats as $seatId) {
            Reservation::create([
                'user_id' => $userId,
                'seats_id' => $seatId
            ]);
            $seat = Seats::find($seatId);
            if ($seat) {
                $seat->update([
                    'status' => 'Taken',
                ]);
            }
        }

        return redirect()->back()->with('success', 'Seats reserved successfully!');
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
