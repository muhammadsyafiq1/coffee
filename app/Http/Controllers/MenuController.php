<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->keyword;
        $filterKategori = $request->cari;
        $categories = Category::all();
        

        if($filterKeyword){
            $items = Menu::with('category')->where('name', 'LIKE', "%$filterKeyword%")->paginate(25);
        }elseif($filterKategori){
            $items = Menu::with('category')->where('category_id',$filterKategori)->paginate(25);
        }else{
            $items = Menu::with('category')->paginate(25);
        }

        // $drink = Menu::with('category')->where('category_id', '5')->get();
        //  dd($drink);
        return view('pages.menu.index', compact('items','categories'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.menu.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMenuRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Menu::create($data);

        return redirect()->back()->with('alert','Menu Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        return view('pages.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $menu = Menu::find($id);
        return view('pages.menu.edit', compact([
            'categories','menu'
        ]));
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
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $item = Menu::find($id);
        $item->update($data);
        return redirect(route('menu.index'))->with('alert', 'Kategori berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Menu::find($id);
        $item->delete();
        return redirect(route('menu.index'))->with('alert','Menu berhasil dihapus');
    }
}
