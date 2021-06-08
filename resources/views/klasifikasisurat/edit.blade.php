@extends('layouts.app')
@section('judul','Edit Klasifikasi Surat')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="m-b-0 text-white">
                    <a class="btn btn-sm btn-danger" href="{{route('klasifikasi-surat.index')}}" role="button">Kembali ke Daftar Klasifikasi Surat</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{route('klasifikasi-surat.update', $klasifikasi->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Kode</label>
                            <div class="col-md-9">
                            <input type="text" name="kode" value="{{$klasifikasi->kode}}" class="form-control @error('kode') is-invalid @enderror" disabled required>
                            @error('kode')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Nama</label>
                            <div class="col-md-9">
                            <input type="text" name="nama" value="{{$klasifikasi->nama}}" class="form-control @error('nama') is-invalid @enderror" required>
                            @error('nama')
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