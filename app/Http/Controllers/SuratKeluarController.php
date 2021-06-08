<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Gate;

class SuratKeluarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('admin')) return $next($request);
            abort(403, 'Anda tidak memiliki hak akses untuk mengakses halaman ini');
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratKeluar = \App\SuratKeluar::latest()->get();
        $bread = "Surat Keluar";
        return view('suratkeluar.index', compact('suratKeluar', 'bread'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bread = "Tambah Surat Keluar";
        $klasifikasi = \App\KlasifikasiSurat::get();
        return view('suratkeluar.insert', compact('bread', 'klasifikasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:50',
            'kode_surat' => 'required',
            'tanggal_surat' => 'required',
            'tujuan' => 'required|string|max:100',
            'isi_singkat' => 'required|string|max:200',
            'berkas_scan' => 'file|mimes:pdf|max:2048'
        ]);

        if($request->hasFile('berkas_scan')){
            $file = $request->file('berkas_scan');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'berkas/suratkeluar';
            $file->move($tujuan_upload,$nama_file);
        }

        $surat = new \App\SuratKeluar;
        $surat->nomor_surat = $request->nomor_surat;
        $surat->kode_surat = $request->kode_surat;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->tujuan = $request->tujuan;
        $surat->isi_singkat = $request->isi_singkat;
        $surat->berkas_scan = $nama_file;
        $surat->save();

        return back()->with('success', 'Surat keluar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suratkeluar =  \App\SuratKeluar::findOrFail($id);
        $bread = "Detail Surat Keluar";
        $klasifikasi = \App\KlasifikasiSurat::get();
        return view('suratkeluar.show', compact('suratkeluar', 'bread', 'klasifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suratkeluar =  \App\SuratKeluar::findOrFail($id);
        $bread = "Edit Surat Keluar";
        $klasifikasi = \App\KlasifikasiSurat::get();
        return view('suratkeluar.edit', compact('suratkeluar', 'bread', 'klasifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:50',
            'kode_surat' => 'required',
            'tanggal_surat' => 'required',
            'tujuan' => 'required|string|max:100',
            'isi_singkat' => 'required|string|max:200'
        ]);

        $surat = \App\SuratKeluar::findOrFail($id);
        $surat->nomor_surat = $request->nomor_surat;
        $surat->kode_surat = $request->kode_surat;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->tujuan = $request->tujuan;
        $surat->isi_singkat = $request->isi_singkat;
        if($request->hasFile('berkas_scan')){
            $request->validate([
                'berkas_scan' => 'file|mimes:pdf|max:2048'
            ]);
            $image_path = 'berkas/suratkeluar/'.$surat->berkas_scan; 
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $file = $request->file('berkas_scan');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'berkas/suratkeluar';
            $file->move($tujuan_upload,$nama_file);
            $surat->berkas_scan = $nama_file;
        }
        $surat->save();

        return back()->with('success', 'Surat keluar berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = \App\SuratKeluar::findOrFail($id);

        // $image_path = 'berkas/suratkeluar/'.$surat->berkas_scan; 
        // if(File::exists($image_path)) {
        //     File::delete($image_path);
        // }
        $surat->delete();
        return back()->with('success', 'Data surat keluar berhasil dihapus');
    }
}
