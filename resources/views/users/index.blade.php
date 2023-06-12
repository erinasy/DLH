@extends('sb-admin.index')

@section('title')
    | DATA RHK
@endsection
@section('content')
<h2>DATA ADMIN</h2>
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            {{-- TOMBOL TAMBAH --}}
            <a href="rhk/create" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-40">
                     <i class="fas fa-plus"></i>
                </span>
                 <span class="text">Tambah Admin</span>
            </a>

            {{-- ALERT SUKSES --}}
            @if (session()->has('success'))
                 <div class="alert alert-success" role="alert">
                     {{ session('success') }}
                 </div> 
            @endif

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="users" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $s)
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->username }}</td>
                            <td>{{ $s->email }}</td>
                            <td>{{ $s->role }}</td>
                            <td>
                             <a href="/users/{{$s->id}}" class="btn btn-info">View</a>
                            </td>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
