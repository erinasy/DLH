@extends('sb-admin.index')

@section('title')
    | LAPORAN
@endsection
@section('content')
<h2>Tambah Data RHK</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                
                {{-- ID --}}
                <div class="form-group mt-4">
                    <label for="exampleInputEmail1">ID</label>
                    <input type-"text class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id')}}">
                    {{-- PESAN ERROR --}}
                    @error('id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                 </div>
                {{-- USERNAME --}}
                <div class="form-group mt-4">
                    <label for="exampleInputEmail1">Nama RHK</label>
                    <input type-"text class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username')}}">
                    {{-- PESAN ERROR --}}
                    @error('username')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                 </div>
                {{-- NAME --}}
                <div class="form-group mt-4">
                    <label for="exampleInputEmail1">Nama RHK</label>
                    <input type-"text class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}">
                    {{-- PESAN ERROR --}}
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                 </div>

                 <label for="exampleInputEmail1" class="form-label mt-4">Kode Bidang</label>
                {{-- dropdown bidang --}}
                <div class="dropdown">
                    <div class="btn-group">
                            <select id="bidang-dropdown" class="form-control" name="bidang_id">
                                <option value="">-- Pilih Kode Bidang --</option>
                                @foreach ($bidang as $data) 
                                <option value="{{$data->id}}">
                                    {{$data->nama_bidang}} -- {{$data->id}}
                                </option>
                                @endforeach
                            </select>
                    </div>
                </div>

                <label for="exampleInputEmail1" class="form-label mt-4">Kode ASN</label>
                {{-- dropdown kategori --}}
                <div class="dropdown">
                    <div class="btn-group">
                            <select id="user-dropdown" class="form-control" name="user_id">
                                <option value="">-- Pilih Kode Kategori Bidang --</option>
                                @foreach ($user as $data) 
                                <option value="{{$data->id}}">
                                    {{$data->nama_kategori}} - {{$data->id}}
                                </option>
                                @endforeach
                            </select>
                    </div>
                </div>
                {{-- TOMBOL TAMBAH --}}   
                <button type="submit" value="submit" name="add" class="btn btn-md btn-success mt-2">SAVE</button>
                {{-- TOMBOL BACK --}}
                <a href="/rhk" class="btn btn-md btn-secondary mt-2">BACK
                    {{-- <span class="text">Tambah</span> --}}
                </a>
            </form>
        </div>
    </div>
@endsection