@extends('layouts.app')
@section('judul','Laporan Surat Keluar')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">
                    <a class="btn btn-primary btn-sm" href="{{route('surat-keluar.create')}}" role="button"><i class="fa fa-plus-square" aria-hidden="true"></i> Buat Surat Keluar</a>
                </h6>
                <div class="table-responsive pb-3">
                    <table id="table" class="display table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Nomor Surat</th>
                                <th>Ditujukan Kepada</th>
                                <th>Isi Singkat</th>
                                <th>Tanggal Surat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suratKeluar as $index => $s)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('surat-keluar.edit', $s->id)}}" class="btn btn-info btn-icon-text">Edit</a>
                                        <a href="{{route('surat-keluar.show', $s->id)}}" class="btn btn-primary btn-icon-text">Detail</a>
                                        <form onsubmit="return confirm('Yakin ingin menghapus data ini secara permanen?')" class="d-inline" action="{{route('surat-keluar.destroy', $s->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-icon-text">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                                <td>{{$s->nomor_surat}}</td>
                                <td>{{$s->tujuan}}</td>
                                <td>{{$s->isi_singkat}}</td>
                                <td>{{\Carbon\Carbon::parse($s->tanggal_surat)->format('d-m-Y')}}</td>
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