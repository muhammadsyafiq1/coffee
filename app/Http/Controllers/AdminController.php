<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::count();
        $total_harga = Transaction::sum('price');
        $latesReservation = Transaction::with(['reservation.user','table'])->orderBy('id','desc')->take(10)->get(); 
        return view('pages.admin.dashboard', compact('user','total_harga','latesReservation'));
    }
}
