<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        $data = DB::table('bookings')
        ->select('posts.roomName', 'posts.roomNumber', 'bookings.id', 'bookings.guestName', 'bookings.date')
        ->join('posts', 'bookings.roomNumber', 'posts.roomNumber')
        ->get();
        return view('posts.booking')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Post::all();
        return view('posts.createOne')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'guestName' => 'required',
            'date' => 'required'
        ]);

        //create booking
        $booking = new Booking;
        //used to get the input from the form and put it into the correct row
        $booking->roomNumber = $request->input('roomNumber');
        $booking->guestName = $request->input('guestName');
        $booking->date = $request->input('date');

        $booking->save();

        return redirect('/bookings')->with('success', 'Booking created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = booking::find($id);
        return view('bookings.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('bookings.edit')->with('booking', $booking);
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
        $this->validate($request, [
            'roomDesc' => 'required',
        ]);

        //create room
        $booking = Booking::find($id);
        //used to get the input from the form and put it into the correct row
        $booking->roomDesc = $request->input('roomDesc');

        $booking->save();

        return redirect('/bookings')->with('success', 'Booking Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        return redirect('/bookings')->with('success', 'Booking Deleted');
    }
}
