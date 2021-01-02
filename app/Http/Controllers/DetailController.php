<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Time;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($slug)
    {
        $times = Time::all();
        $item = Menu::with('category','gallery')->where('slug', $slug)->first();
        return view('pages.menu.detail', compact('item','times'));
    }
}
