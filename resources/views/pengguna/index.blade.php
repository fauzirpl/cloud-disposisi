@extends('layouts.app')
@section('judul','Manajemen Pengguna')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">
                    <a class="btn btn-primary btn-sm" href="{{route('pengguna.create')}}" role="button"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Pengguna Baru</a>
                </h6>
                <div class="table-responsive pb-3">
                    <table id="table" class="display table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Role</th>
                                <th>Nama</th>
                                <th>e-Mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengguna as $index => $k)
                            <tr>
                                <td class="text-center">{{$index+1}}</td>
                                <td class="text-center">
                                    <a href="{{route('pengguna.edit', $k->id)}}" class="btn btn-info btn-icon-text" role="button">Edit</a>
                                    <form onsubmit="return confirm('Yakin ingin menghapus data ini secara permanen?')" class="d-inline" action="{{route('pengguna.destroy', $k->id)}}" method="POST" id="form-hapus">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-icon-text">Hapus</button>
                                    </form>
                                </td>
                                <td>{{$k->nip}}</td>
                                <td>{{$k->jabatan->nama}}</td>
                                <td class="text-uppercase">{{$k->role}}</td>
                                <td>{{$k->name}}</td>
                                <td>{{$k->email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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