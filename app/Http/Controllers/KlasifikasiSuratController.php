<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

class KlasifikasiSuratController extends Controller
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
        $klasifikasi = \App\KlasifikasiSurat::orderBy('kode')->get();
        return view('klasifikasisurat.index', compact('klasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klasifikasisurat.insert');
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
            'kode' => 'required|string|unique:klasifikasi_surat|max:10',
            'nama' => 'required|string|max:150',
        ]);

        \App\KlasifikasiSurat::insert($request->except('_token'));
        return back()->with('success', 'Data klasifikasi surat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $klasifikasi =  \App\KlasifikasiSurat::findOrFail($id);
        return view('klasifikasisurat.edit', compact('klasifikasi'));
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
            'nama' => 'required|string|max:150',
        ]);

        $klasifikasi =  \App\KlasifikasiSurat::findOrFail($id);
        \App\KlasifikasiSurat::where('id', $id)->update($request->except(['_token', '_method']));
        return back()->with('success', 'Data klasifikasi surat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\KlasifikasiSurat::findOrFail($id)->delete();
        return back()->with('success', 'Data klasifikasi surat berhasil dihapus');
    }
}
