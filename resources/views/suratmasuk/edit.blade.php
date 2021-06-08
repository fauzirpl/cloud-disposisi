@extends('layouts.app')
@section('judul','Edit Surat Keluar')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="m-b-0 text-white">
                    <a class="btn btn-sm btn-danger" href="{{route('surat-masuk.index')}}" role="button">Kembali ke Laporan Surat Keluar</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{route('surat-masuk.update', $suratmasuk->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Tanggal Penerimaan</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="tanggal_penerimaan" value="{{ $suratmasuk->tanggal_penerimaan }}" placeholder="hh/bb/tttt" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Berkas Scan Surat Masuk</label>
                            <div class="col-md-9">
                                <input type="file" id="input-file-now" class="dropify" name="berkas_scan" placeholder="Masukkan berkas PDF" accept=".pdf" data-default-file="{{url('/berkas/suratmasuk/'.$suratmasuk->berkas_scan)}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Kode/Klasifikasi Surat</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select select2" name="kode_surat" required>
                                    @foreach($klasifikasi as $k)
                                    <option value="{{$k->kode}}" @if($suratmasuk->kode_surat == $k->kode) selected="selected" @endif>{{$k->kode}} - {{$k->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Nomor Surat</label>
                            <div class="col-md-9">
                            <input type="text" name="nomor_surat" value="{{ $suratmasuk->nomor_surat }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Tanggal Surat</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" value="{{ $suratmasuk->tanggal_surat }}" required name="tanggal_surat" placeholder="hh/bb/tttt">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Pengirim</label>
                            <div class="col-md-9">
                            <input type="text" name="pengirim" value="{{ $suratmasuk->pengirim }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Isi Singkat/Perihal</label>
                            <div class="col-md-9">
                            <textarea name="isi_singkat" class="form-control" required>{{ $suratmasuk->isi_singkat }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Sifat Surat</label>
                            <div class="col-md-9">
                            <input name="sifat" list="sifat" value="{{ $suratmasuk->sifat }}" class="form-control" required>
                            <datalist id="sifat">
                                <option value="Sangat Segera">
                                <option value="Segera">
                                <option value="Penting">
                                <option value="Rahasia">
                              </datalist>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Disposisi Kepada</label>
                            <div class="col-md-9">
                                <div class="demo-checkbox">
                                    @foreach($pamong as $p)
                                    <input type="checkbox" id="disposisi{{$p->id}}" class="filled-in" name="disposisi_ke[]" value="{{$p->id}}" @if(in_array($p->id, json_decode($suratmasuk->disposisi_ke == NULL ? '[]' : $suratmasuk->disposisi_ke))) checked @endif />
                                    <label for="disposisi{{$p->id}}" class="mr-3">{{$p->name.' - '.$p->jabatan->nama}}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Isi Disposisi</label>
                            <div class="col-md-9">
                            <textarea name="isi_disposisi" class="form-control">{{ $suratmasuk->isi_disposisi }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
                        <button type="reset" class="btn btn-inverse">Reset</button>
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