<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $kategoris = kategori::where('name','LIKE',"%$search%")->orderBy('id','desc')->paginate(10);
        return view('kategori.index', compact('kategoris'));
    }


    public function create()
    {
        return view('kategori.add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'service' => 'required',
        ]);

        $kategori = new kategori;
        $kategori->name = $request->name;
        $kategori->price = $request->price;
        $kategori->service = $request->service;
        $kategori->save();

        session()->flash('success','Sukses tambah kategori!');
        return redirect()->route('kategori.index');
    }


    public function edit($id)
    {
        $kategori = kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $kategori = kategori::findOrFail($id);
        $kategori->name = $request->name;
        $kategori->price = $request->price;
        $kategori->service = $request->service;
        $kategori->update();

        session()->flash('success','Sukses ubah data kategori!');
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $kategori = kategori::findOrFail($id);
        $kategori->delete();

        session()->flash('success','Sukses hapus kategori!');
        return redirect()->back();
    }

}
