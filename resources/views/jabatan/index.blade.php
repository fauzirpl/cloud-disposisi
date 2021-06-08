@extends('layouts.app')
@section('judul','Data Jabatan')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive pb-3">
                    <table id="table" class="display table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jabatan as $index => $k)
                            <tr>
                                <td class="text-center">{{$index+1}}</td>
                                <td class="text-center">
                                    <a href="{{route('jabatan.edit', $k->id)}}" class="btn btn-info btn-icon-text" role="button">Edit</a>
                                    <form onsubmit="return confirm('Yakin ingin menghapus data ini secara permanen?')" class="d-inline" action="{{route('jabatan.destroy', $k->id)}}" method="POST" id="form-hapus">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-icon-text">Hapus</button>
                                    </form>
                                </td>
                                <td>{{$k->nama}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4 class="m-b-0">
                    Tambah Data Jabatan
                </h4>
            </div>
            <div class="card-body">
                <form action="{{route('jabatan.store')}}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Nama Jabatan</label>
                            <div class="col-md-9">
                            <input type="text" name="nama" value="{{ old('nama') }}" value="" class="form-control @error('nama') is-invalid @enderror" required>
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

@push('js')
    <script>
    $(document).ready(function() {
        $('#table').DataTable({
            order: [[ 1, 'asc' ]]
        });
    });
    </script>
@endpush