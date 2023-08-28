@extends('layouts.app')
@section('title', 'Form Kategori')
@section('content')
<form action="{{ isset($kategori) ? route('kategori.save.update', $kategori->nama) :  route('kategori.add.save') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($kategori) ? 'Form Edit Barang' : 'Form Tambah Kategori' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($kategori) ? $kategori->nama : '' }}">
                        <input type="text" id="id" name="id" value="{{ isset($kategori->id) ? $kategori->id : '' }}" hidden>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
