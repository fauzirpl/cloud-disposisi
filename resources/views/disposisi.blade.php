@extends('layouts.app')
@section('judul','Laporan Disposisi')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive pb-3">
                    <table id="table" class="display table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu Disposisi</th>
                                <th>Sifat</th>
                                <th>Isi Singkat Surat</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($disposisi as $index => $s)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{\Carbon\Carbon::parse($s->created_at)->format('d-m-Y h:i')}}</td>
                                <td>{{$s->surat_masuk->sifat}}</td>
                                <td>{{$s->surat_masuk->isi_singkat}}</td>
                                <td>{{$s->status == NULL ? 'Belum Ditanggapi' : 'Sudah Ditanggapi'}}</td>
                                <td class="text-center">
                                    <a href="{{ route('surat-masuk.show', $s->surat_masuk->id) }}" class="btn p-2 btn-primary">Lihat Detail Disposisi</a>
                                    <button type="button" class="btn p-2 btn-success" data-toggle="modal" data-target="#exampleModal{{ $s->id }}">
                                        Tanggapi
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal{{ $s->id }}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal{{ $s->id }}Label">Tanggapi Disposisi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('respon', $s->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                    <input type="text" name="hasil_disposisi" class="form-control" autofocus placeholder="Masukkan laporan progres disini" required>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $disposisi->links() }}
            </div>
        </div>
    </div>
</div>
@endsection  