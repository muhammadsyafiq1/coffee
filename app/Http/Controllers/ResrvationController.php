<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservationRequest;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\Time;
use Illuminate\Support\Facades\Auth;

class ResrvationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::with('user')->paginate(25);
        return view('pages.reservation.index', compact('reservations'));
    }

    public function reservationPage()
    {
        $times = Time::all();
        $tables = Table::all();
        return view('pages.reservation-page', compact('times','tables'));
    }

    public function store(CreateReservationRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['image'] = $request->file('image')->store('buktiPembayaran','public');
        Reservation::create($data);
        return redirect()->back();
    }

    public function show($id)
    {
        $reservation = Reservation::find($id);
        return view('pages.reservation.show', compact('reservation'));
    }

    public function delete($id)
    {
        $data = Reservation::find($id);
        $data->delete();
        return redirect()->route('reservation')->with('alert','Reservation berhasil dihapus');
    }
}
