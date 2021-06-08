@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="mr-md-3 mr-xl-5">
            <h2>Tracking Proses Disposisi</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Hasil Tracking') }}</div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 offset-md-1">
                      <ul class="timeline">
                        @forelse ($tracking as $item)
                        <li>
                          <a target="_blank" href="{{ route('surat-masuk.show', $item->disposisi->surat_masuk_id) }}">{{ $item->disposisi->user->name.' - '.$item->disposisi->user->jabatan->nama }}</a> 
                          <small class="float-right">{{ $item->created_at->diffForHumans() }}</small>
                          <p>Respon : {{ $item->hasil_disposisi }}
                          </p>
                        </li>
                        @empty
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Tutup</span>
                              </button>
                              <strong>Tidak ada hasil tracking!</strong>.
                            </div>
                        @endforelse
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
      ul.timeline {
          list-style-type: none;
          position: relative;
      }
      ul.timeline:before {
          content: ' ';
          background: #d4d9df;
          display: inline-block;
          position: absolute;
          left: 29px;
          width: 2px;
          height: 100%;
          z-index: 400;
      }
      ul.timeline > li {
          margin: 20px 0;
          padding-left: 40px;
      }
      ul.timeline > li:before {
          content: ' ';
          background: white;
          display: inline-block;
          position: absolute;
          border-radius: 50%;
          border: 3px solid #22c0e8;
          left: 20px;
          width: 20px;
          height: 20px;
          z-index: 400;
      }
    </style>
@endpush