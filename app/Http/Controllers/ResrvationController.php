<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservationRequest;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\Time;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResrvationController extends Controller
{

    public function index(Request $request)
    {
        $filterKeyword = $request->keyword;
        if($filterKeyword){
            $reservations = Reservation::with('user','table')->where('id', 'LIKE' , "%$filterKeyword%")->paginate(1);
        }else {

            $reservations = Reservation::with('user','table')->paginate(25);
        }
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
        $table = Table::where('id', $request->table_id)->first();
        $data['user_id'] = Auth::user()->id;
        $data['image'] = $request->file('image')->store('buktiPembayaran','public');

        Table::where('id', $request->table_id)->decrement('ready');

        $reservation = Reservation::create($data);

        Transaction::create([
            'reservation_id' => $reservation->id,
            'table_id' => $request->table_id,
            'price' => $table->price,
        ]);

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
