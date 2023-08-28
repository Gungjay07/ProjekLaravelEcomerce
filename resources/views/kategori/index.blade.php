@extends('layouts.app')
@section('title', 'Data Kategori') 
    

@section('content')
     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('kategori.add') }}" class="btn btn-success mb-3">Tambah Kategori</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php ($no = 1)
                                        @foreach ($kategori as $item)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{  $item->nama }}</td>
                                            <td> 
                                                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ route('kategori.delete', $item->id) }}" class="btn btn-danger">Delete</a>
                                            </td>

                                        </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection