<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
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

    public function index()
    {
        $klasifikasi = \App\KlasifikasiSurat::count();
        $suratmasuk = \App\SuratMasuk::count();
        $suratkeluar = \App\SuratKeluar::count();
        $user = \App\User::count();
        return view('home', compact('klasifikasi', 'suratmasuk', 'suratkeluar', 'user'));
    }

    public function tracking($id, $user)
    {
        if(Auth::user()->role  != 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk mengakses halaman ini');
        }

        $disposisi = \App\Disposisi::where('surat_masuk_id', $id)->where('user_id', $user)->latest()->first()->id;
        $tracking = \App\Tracking::where('disposisi_id', $disposisi)->latest()->get();
        return view('tracking', compact('tracking'));
    }

    public function disposisi()
    {
        $disposisi = \App\Disposisi::where('user_id', Auth::user()->id)->latest()->paginate(10);
        $bread = "Disposisi";
        return view('disposisi', compact('disposisi', 'bread'));
    }

    public function respon(Request $req, $id)
    {
        $disposisi = \App\Disposisi::findOrFail($id);
        if($disposisi->user_id != Auth::user()->id) {
            abort(403, 'Anda tidak memiliki hak akses');
        }
        $disposisi->status = 1;
        $disposisi->save();
        
        $tracking = new \App\Tracking;
        $tracking->disposisi_id = $disposisi->id;
        $tracking->hasil_disposisi = $req->hasil_disposisi;
        $tracking->save();

        return back()->with('success', 'Tanggapan berhasil ditambahkan');
    }
}
