<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Auth;

class SuratMasukController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role  != 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk mengakses halaman ini');
        }
        $suratMasuk = \App\SuratMasuk::latest()->get();
        $bread = "Surat Masuk";
        return view('suratmasuk.index', compact('suratMasuk', 'bread'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role  != 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk mengakses halaman ini');
        }
        $bread = "Tambah Surat Masuk";
        $klasifikasi = \App\KlasifikasiSurat::get();
        $pamong = \App\User::get();
        return view('suratmasuk.insert', compact('bread', 'klasifikasi', 'pamong'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role  != 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk mengakses halaman ini');
        }
        $request->validate([
            'nomor_surat' => 'required|string|max:50',
            'sifat' => 'required|string|max:20',
            'kode_surat' => 'required',
            'tanggal_penerimaan' => 'required',
            'tanggal_surat' => 'required',
            'isi_disposisi' => 'string',
            'pengirim' => 'required|string|max:100',
            'isi_singkat' => 'required|string|max:200',
            'berkas_scan' => 'file|mimes:pdf|max:2048'
        ]);

        if($request->hasFile('berkas_scan')){
            $file = $request->file('berkas_scan');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'berkas/suratmasuk';
            $file->move($tujuan_upload,$nama_file);
        }

        $surat = new \App\SuratMasuk;
        $surat->nomor_surat = $request->nomor_surat;
        $surat->sifat = $request->sifat;
        $surat->kode_surat = $request->kode_surat;
        $surat->tanggal_penerimaan = $request->tanggal_penerimaan;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->pengirim = $request->pengirim;
        $surat->isi_singkat = $request->isi_singkat;
        $surat->isi_disposisi = $request->isi_disposisi;
        if($request->disposisi_ke) {
            $surat->disposisi_ke = json_encode($request->disposisi_ke);
        }
        $surat->berkas_scan = $nama_file;
        $surat->save();

        foreach($request->disposisi_ke as $user) {
            $disposisi = new \App\Disposisi;
            $disposisi->user_id = $user;
            $disposisi->surat_masuk_id = $surat->id;
            $disposisi->save();

            $tracking = new \App\Tracking;
            $tracking->disposisi_id = $disposisi->id;
            $tracking->hasil_disposisi = 'Belum ditanggapi';
            $tracking->save();
        }

        return back()->with('success', 'Surat masuk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suratmasuk =  \App\SuratMasuk::findOrFail($id);
        $bread = "Detail Surat Masuk";
        $klasifikasi = \App\KlasifikasiSurat::get();
        $pamong = \App\User::get();
        return view('suratmasuk.show', compact('suratmasuk', 'bread', 'klasifikasi', 'pamong'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role  != 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk mengakses halaman ini');
        }
        $suratmasuk =  \App\SuratMasuk::findOrFail($id);
        $bread = "Edit Surat Masuk";
        $klasifikasi = \App\KlasifikasiSurat::get();
        $pamong = \App\User::get();
        return view('suratmasuk.edit', compact('suratmasuk', 'bread', 'klasifikasi', 'pamong'));
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
        if(Auth::user()->role  != 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk mengakses halaman ini');
        }
        $surat = \App\SuratMasuk::findOrFail($id);
        $surat->nomor_surat = $request->nomor_surat;
        $surat->sifat = $request->sifat;
        $surat->kode_surat = $request->kode_surat;
        $surat->tanggal_penerimaan = $request->tanggal_penerimaan;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->pengirim = $request->pengirim;
        $surat->isi_singkat = $request->isi_singkat;
        $surat->isi_disposisi = $request->isi_disposisi;
        if($request->disposisi_ke) {
            $surat->disposisi_ke = json_encode($request->disposisi_ke);
        }
        if($request->hasFile('berkas_scan')){
            $request->validate([
                'berkas_scan' => 'file|mimes:pdf|max:2048'
            ]);
            $image_path = 'berkas/suratmasuk/'.$surat->berkas_scan; 
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $file = $request->file('berkas_scan');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'berkas/suratmasuk';
            $file->move($tujuan_upload,$nama_file);
            $surat->berkas_scan = $nama_file;
        }
        $surat->save();

        foreach($request->disposisi_ke as $user) {
            $check = \App\Disposisi::where('user_id', $user)->where('surat_masuk_id', $surat->id)->first();
            if(!$check) {
                $disposisi = new \App\Disposisi;
                $disposisi->user_id = $user;
                $disposisi->surat_masuk_id = $surat->id;
                $disposisi->save();
            }
        }

        $deleteother = \App\Disposisi::where('surat_masuk_id', $surat->id)->whereNotIn('user_id', $request->disposisi_ke)->delete();

        return back()->with('success', 'Surat masuk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->role  != 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk mengakses halaman ini');
        }
        $surat = \App\SuratMasuk::findOrFail($id);

        $image_path = 'berkas/suratmasuk/'.$surat->berkas_scan; 
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $surat->delete();

        $disposisi = $surat = \App\Disposisi::where('surat_masuk_id', $id)->delete();

        return back()->with('success', 'Data surat masuk berhasil dihapus');
    }
}
