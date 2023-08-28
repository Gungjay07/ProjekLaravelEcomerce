<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {

        $barang = Barang::get();
        // $query = Barang::getQuery()->toSql();
        // dd($barang);
        return view('barang.index', ['barang' => $barang]);
    }

    public function add()
    {
        $kategori = Kategori::get();
        // $barang = Barang::get();
        // dd($barang);
        return view('barang.form', ['kategori' => $kategori]);
    }

    public function save(Request $request)
    {
        $data = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->id_kategori,
            'gambar' => $request->file('gambar')->store('toPath', ['disk' => 'public']),
            // 'gambar' => $request->file('gambar')->store('post-images'),
            'harga' => $request->harga,
            'jumlah' => $request->jumlah
        ];

        // _token: rCzIA8WqhU8ugcu5fb0YmK26ZhEXLdLN0zokfFhC
        // kode_barang: B0a9da
        // nama_barang: sjkdasjd
        // gambar: (binary)
        // id_kategori: 1
        // harga: 12312
        // jumlah: 3123213

        $validatedData = $request->validate([
            'kode_barang' => ['required'],
            'nama_barang' => ['required'],
            'gambar' => ['image', 'file'],
            'id_kategori' => ['required'],
            'harga' => ['required'],
            'jumlah' => ['required']
        ]);

        Barang::create($data);

        return redirect()->route('barang');
    }

    public function edit(Request $request)
    {
        $barang = Barang::find($request->id);
        $kategori = Kategori::get();
        // dd($kategori);
        return view('barang.form', ['barang' => $barang, 'kategori' => $kategori]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah
        ];
        Barang::find($id)->update($data);
        // dd($id);
        return redirect()->route('barang');
    }

    public function delete(Request $request)
    {

        $data =  Barang::find($request->id)->delete();
        // return redirect()->route('barang');

        if ($data) {

            return response()->json([
                'http_code' => 200,
                'massage' => 'Sukses delete'
            ]);
        } else {
            return response()->json([
                'http_code' => 401,
                'massage' => 'GAGAL BOS'
            ]);
        }
    }

    public function dashboard1()
    {
        $dashboard1 = Barang::get();
        // var_dump($dashboard1);
        return view('dashboard', ['dashboard' => $dashboard1]);
    }
}
