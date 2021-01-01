<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use App\Models\Time;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function allBlog()
    {
        $times = Time::all();
        $stories = Story::with(['user','category'])->get();
        return view('pages.blog.index', compact('stories','times'));
    }

    public function singleBlog($slug)
    {
        $times = Time::all();
        $story = Story::with('user','category')->where('slug', $slug)->first();

        $category = Category::with('menu')->get();

        return view('pages.blog.single', compact('story','times', 'category'));
    }
}
