@extends('layouts.app')
@section('judul','Tambah Data Pengguna')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="m-b-0 text-white">
                    <a class="btn btn-sm btn-danger" href="{{route('pengguna.index')}}" role="button">Kembali ke Daftar Pengguna</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{route('pengguna.store')}}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">NIP</label>
                            <div class="col-md-9">
                            <input type="text" name="nip" value="{{ old('nip') }}" class="form-control @error('nip') is-invalid @enderror" required>
                            @error('nip')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Jabatan</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select select2" name="jabatan_id" required>
                                    @foreach($jabatan as $k)
                                    <option value="{{$k->id}}">{{$k->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Hak Akses</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select select2" name="role" required>
                                    <option value="pegawai">Pegawai</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Alamat E-mail</label>
                            <div class="col-md-9">
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Kata Sandi</label>
                            <div class="col-md-9">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
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