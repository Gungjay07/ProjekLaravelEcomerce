@extends('layouts.app')
@section('title', 'Data User') 
    
@section('content')
     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama User</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php ($no = 1)
                                        @foreach ($user as $item)
                                        {{-- {{ dd($item) }} --}}
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{  $item->nama }}</td>
                                            <td>{{  $item->level }}</td>
                                        </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection