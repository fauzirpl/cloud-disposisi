@extends('layouts.app')
@section('judul','Edit Data Pengguna')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            @if(Auth::user()->role == 'admin')
            <div class="card-header">
                <h4 class="m-b-0 text-white">
                    <a class="btn btn-sm btn-danger" href="{{route('pengguna.index')}}" role="button">Kembali ke Daftar Pengguna</a>
                </h4>
            </div>
            @endif
            <div class="card-body">
                <form action="{{route('pengguna.update', $pengguna->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">NIP</label>
                            <div class="col-md-9">
                            <input type="text" name="nip" value="{{ $pengguna->nip }}" class="form-control @error('nip') is-invalid @enderror" required>
                            @error('nip')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                            <input type="text" name="name" value="{{ $pengguna->name }}" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        @if(Auth::user()->role == 'admin')
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Jabatan</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select select2" name="jabatan_id" required>
                                    @foreach($jabatan as $k)
                                    <option value="{{$k->id}}" @if($pengguna->jabatan_id == $k->id) selected="selected" @endif>{{$k->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Hak Akses</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select select2" name="role" required>
                                    <option value="pegawai" @if($pengguna->role == "pegawai") selected="selected" @endif>Pegawai</option>
                                    <option value="admin" @if($pengguna->role  == "admin") selected="selected" @endif>Admin</option>
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Alamat E-mail</label>
                            <div class="col-md-9">
                            <input type="email" value="{{ $pengguna->email }}" name="email" class="form-control @error('email') is-invalid @enderror" readonly>
                            @error('email')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Kata Sandi</label>
                            <div class="col-md-9">
                            <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection