@extends('layouts.app')
@section('judul','Detail Surat Masuk')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                @if (Auth::user()->role == 'admin')
                <h4 class="m-b-0 text-white">
                    <a class="btn btn-sm btn-danger" href="{{route('surat-masuk.index')}}" role="button">Kembali ke Laporan Surat Keluar</a>
                </h4>
                @endif
            </div>
            <div class="card-body">
                <form>
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Tanggal Penerimaan</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="tanggal_penerimaan" value="{{ $suratmasuk->tanggal_penerimaan }}" placeholder="hh/bb/tttt" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Kode/Klasifikasi Surat</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select select2" name="kode_surat" disabled>
                                    @foreach($klasifikasi as $k)
                                    <option value="{{$k->kode}}" @if($suratmasuk->kode_surat == $k->kode) selected="selected" @endif>{{$k->kode}} - {{$k->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Nomor Surat</label>
                            <div class="col-md-9">
                            <input type="text" name="nomor_surat" value="{{ $suratmasuk->nomor_surat }}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Tanggal Surat</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" disabled value="{{ $suratmasuk->tanggal_surat }}" name="tanggal_surat" placeholder="hh/bb/tttt">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Pengirim</label>
                            <div class="col-md-9">
                            <input type="text" name="pengirim" value="{{ $suratmasuk->pengirim }}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Isi Singkat/Perihal</label>
                            <div class="col-md-9">
                            <textarea name="isi_singkat" class="form-control" disabled>{{ $suratmasuk->isi_singkat }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Sifat Surat</label>
                            <div class="col-md-9">
                            <input name="sifat" list="sifat" value="{{ $suratmasuk->sifat }}" class="form-control" disabled>
                            <datalist id="sifat">
                                <option value="Sangat Segera">
                                <option value="Segera">
                                <option value="Penting">
                                <option value="Rahasia">
                              </datalist>
                            </div>
                        </div>
                        @if (Auth::user()->role == 'admin')
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Disposisi Kepada</label>
                            <div class="col-md-9">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pamong as $index => $p)
                                        @if(in_array($p->id, json_decode($suratmasuk->disposisi_ke == NULL ? '[]' : $suratmasuk->disposisi_ke)))
                                        <tr class="text-center">
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $p->name }}</td>
                                            <td><a href="{{ url('/tracking-disposisi/'.$suratmasuk->id.'/user/'.$p->id) }}" class="btn btn-primary">Tracking Disposisi</a></td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Isi Disposisi</label>
                            <div class="col-md-9">
                            <textarea name="isi_disposisi" class="form-control" disabled>{{ $suratmasuk->isi_disposisi }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Berkas Scan Surat Masuk</label>
                            <div class="col-md-9">
                                <iframe class="col-12" height="500" src="{{url('/berkas/suratmasuk/'.$suratmasuk->berkas_scan)}}">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Yakin ingin menghapus file ini : \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File telah dihapus');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Terjadi kesalahan');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
@endpush