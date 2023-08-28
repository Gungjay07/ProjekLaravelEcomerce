@extends('layouts.app')
@section('title', 'Data Barang')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('barang.add') }}" class="btn btn-success mb-3">Tambah Produk</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode barang</th>
                            <th>Nama Barang</th>
                            <th>Gambar Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($barang as $item)
                            {{-- {{ dd($item) }} --}}
                            <tr class="data-{{ $no }}">
                                <th>{{ $no }}</th>
                                <td>{{ $item->kode_barang }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                {{-- <td><img src="{{ Storage::disk('public')->url($item->gambar) }}"
                                    width="40" height="40">
                                </td> --}}
                                {{-- Misal : storage/app/public/post-images/namaimage.png --}}
                                <td><img src="{{ str_replace('localhost', 'localhost:8000', Storage::disk('public')->url($item->gambar)) }}"
                                        width="200" height="100">
                                </td>
                                <td>{{ $item->kategori->nama }}</td>
                                <td>{{ number_format($item->harga, 2) }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    <button class="btn btn-primary edit" data-id="{{ $item->id }}">Update</button>
                                    {{-- <a href="{{ route('barang.delete', $item->id) }}" onclick="confirmation(event)" class="btn btn-danger">Delete</a> --}}

                                    <button class="btn btn-danger delete" data-deleteClass="data-{{ $no }}"
                                        data-id="{{ $item->id }}">Delete</button>
                                </td>
                            </tr>
                            @php($no++)
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
