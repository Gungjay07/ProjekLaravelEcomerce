@extends('layouts.app')
@section('title', 'Form Barang')
@section('content')
    <form class="addForm" action="{{ isset($barang) ? route('barang.add.update', $barang['id']) : route('barang.add') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($barang) ? 'Form Edit Barang' : 'Form Tambah Barang' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                                value="{{ isset($barang) ? $barang->kode_barang : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                value="{{ isset($barang) ? $barang->nama_barang : '' }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="gambar">Gambar Barang</label>
                            <input type="file" name="gambar" value="{{ isset($barang) ? $barang->gambar : '' }}" class="form-control" id="inputGroupFile02">
                            
                        </div>
                        <div class="form-group">
                            <label for="id_kategori">Kategori Barang</label>
                            <select class="custom-select" name="id_kategori" id="id_kategori">
                                @php
                                    $p = isset($barang->id_kategori) ? '' : 'selected';
                                @endphp
                                <option value="" {{ $p }}>Pilih Kategori Produk Anda</option>
                                @foreach ($kategori as $item)
                                    @php
                                        $x = isset($barang->id_kategori) && $barang->id_kategori == $item->id ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $item->id }}" {{ $x }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Barang</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ isset($barang->harga) ? $barang->harga : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah Barang</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah"
                                value="{{ isset($barang->jumlah) ? $barang->jumlah : '' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
