<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commentar;
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
        $komentars = Commentar::with('story')->where('story_id', $story->id)->get();
        $category = Category::with('menu')->get();
        $populars = Story::with('user','comments')->orderBy('popular', 'desc')->take(3)->get();

        return view('pages.blog.single', compact('story','times', 'category','komentars','populars'));
    }

    public function komentar(Request $request)
    {
        $data = $request->all();
        $data['story_id'] = $request->story_id;
        Commentar::create($data);
        
        Story::where('id', $request->story_id)->increment('popular');

        return redirect()->back();
    }

}
