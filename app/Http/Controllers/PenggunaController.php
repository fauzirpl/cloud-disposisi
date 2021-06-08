<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class PenggunaController extends Controller
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
        $pengguna = \App\User::orderBy('name')->get();
        return view('pengguna.index', compact('pengguna'));
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
        $jabatan = \App\Jabatan::orderBy('nama')->get();
        return view('pengguna.insert', compact('jabatan'));
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
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:10',
            'jabatan_id' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'nip' => 'required|integer|digits_between:8,18',
            'password' => 'required|string|min:8|max:32',
        ]);

        $check = \App\Jabatan::findOrFail($request->jabatan_id);

        \App\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'nip' => $request->nip,
            'jabatan_id' => $request->jabatan_id,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Data pengguna berhasil ditambahkan');
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
        if(Auth::user()->role  != 'admin' && Auth::user()->id != $id) {
            abort(403, 'Anda tidak memiliki akses untuk mengakses halaman ini');
        }

        $pengguna =  \App\User::findOrFail($id);
        
        if(\Auth::user()->role != 'admin' && $pengguna->id != \Auth::user()->id)
            abort(403, 'Anda tidak mempunyai hak akses');

        $jabatan = \App\Jabatan::orderBy('nama')->get();
        return view('pengguna.edit', compact('jabatan', 'pengguna'));
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
        if(Auth::user()->role  != 'admin' && Auth::user()->id != $id) {
            abort(403, 'Anda tidak memiliki akses untuk mengakses halaman ini');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|integer|digits_between:8,18'
        ]);

        $user =  \App\User::findOrFail($id);
        if(\Auth::user()->role != 'admin' && $user->id != \Auth::user()->id)
            abort(403, 'Anda tidak mempunyai hak akses');

        $user->nip = $request->nip;
        if(Auth::user()->role == 'admin') {
        $request->validate([
            'role' => 'required|string|max:10',
            'jabatan_id' => 'required|integer'
        ]);
        $check = \App\Jabatan::findOrFail($request->jabatan_id);
        $user->role = $request->role;
        $user->jabatan_id = $request->jabatan_id;
        }
        $user->name = $request->name;
        if($request->password) {
            $request->validate([
                'password' => 'required|string|min:8|max:32',
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return back()->with('success', 'Data pengguna berhasil diubah');
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

        \App\User::findOrFail($id)->delete();
        return back()->with('success', 'Data pengguna berhasil dihapus');
    }
}
