<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoryRequest;
use App\Http\Requests\UpdateStoryRequest;
use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $stories = Story::with('user','category')->paginate(25);
        return view('pages.story.index', compact('stories','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.story.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = Auth::user()->id;
        $data['image'] = $request->file('image')->store('storyImage','public');
        Story::create($data);

        return redirect()->back()->with('alert','Story berhasil ditambah');
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
        $story = Story::find($id);
        $categories = Category::all();
        return view('pages.story.edit', compact('story','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoryRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = Auth::user()->id;
        if($request->hasFile('image')){
            if($request->image && file_exists(storage_path('app/public/'.$request->image))){
                Storage::delete('public/',$request->image);
            }
            $file = $request->file('image')->store('storyImage','public');
            $data['image'] = $file;
        }
        $item = Story::find($id);
        $item->update($data);
        return redirect(route('story.index'))->with('alert','Story berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Story::find($id);
        $data->delete();
        return redirect(route('story.index'))->with('alert','Story berhasil dihapus');
    }
}
