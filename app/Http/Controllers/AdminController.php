<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::count();

        return view('pages.admin.dashboard', compact('user'));
    }
}
