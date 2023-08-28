<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::get();
        return view('kategori.index', ['kategori' => $kategori]);
    }

    public function add()
    {
        return view('kategori.form');
    }
    public function save(Request $request)
    {
        Kategori::create(['nama' => $request->nama]);
        return redirect()->route('kategori');
    }

    public function edit($id, Request $request)
    {
        $kategori = Kategori::where('id', $id)->first();
        return view('kategori.form', ['kategori' => $kategori]);
    }
    public function update(Request $request)
    {
        Kategori::where('id', $request->id)->update(['nama' => $request->nama]);
        return redirect()->route('kategori');
    }
    public function delete($id)
    {
        Kategori::find($id)->delete();
        // dd($id);
        return redirect()->route('kategori');
    }
}
