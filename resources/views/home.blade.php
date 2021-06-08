@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between flex-wrap">
      <div class="d-flex align-items-end flex-wrap">
        <div class="mr-md-3 mr-xl-5">
          <h2>Beranda</h2>
        </div>
      </div>
    </div>
  </div>
</div>
@if(Auth::user()->role == 'admin')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body dashboard-tabs p-0">
        <div class="tab-content py-0 px-0">
          <div class="d-flex flex-wrap justify-content-xl-between">
            <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
              <i class="mdi mdi-download icon-lg mr-3 text-primary"></i>
              <div class="d-flex flex-column justify-content-around">
                <small class="mb-1 text-muted">Jumlah Surat Masuk</small>
                <h5 class="mb-0 d-inline-block">{{ $suratmasuk }}</h5>
              </div>
            </div>
            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
              <i class="mdi mdi-upload mr-3 icon-lg text-danger"></i>
              <div class="d-flex flex-column justify-content-around">
                <small class="mb-1 text-muted">Jumlah Surat Keluar</small>
                <h5 class="mr-2 mb-0">{{ $suratkeluar }}</h5>
              </div>
            </div>
            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
              <i class="mdi mdi-note-text mr-3 icon-lg text-success"></i>
              <div class="d-flex flex-column justify-content-around">
                <small class="mb-1 text-muted">Jumlah Klasifikasi Surat</small>
                <h5 class="mr-2 mb-0">{{ $klasifikasi }}</h5>
              </div>
            </div>
            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
              <i class="mdi mdi-account-check mr-3 icon-lg text-warning"></i>
              <div class="d-flex flex-column justify-content-around">
                <small class="mb-1 text-muted">Jumlah Pengguna</small>
                <h5 class="mr-2 mb-0">{{ $user }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
