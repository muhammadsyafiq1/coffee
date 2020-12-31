<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Time;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $special = Menu::with(['gallery'])->whereHas('gallery')->where('is_special', 1)->take(3)->get();
        $times = Time::all();
        $tables = Table::all();
        $category = Category::with('menu.gallery')->get(); 
        return view('pages.landingPage.index', compact([
            'special','times','tables','category'
        ]));
    }

    public function allMenu()
    {
        $times = Time::all();;
        $category = Category::with('menu.gallery')->get(); 
        return view('pages.semua_menu', compact([
            'times','category'
        ]));
    }
}
