<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\anggota;

class anggotacontroller extends Controller
{
    public function index() 
    {
    $ar_anggota = DB::table('anggota')->get();
    return view('anggota.index',compact('ar_anggota'));
    }
    public function create(){
        //mengarahkan hal ke form
        return view('anggota.form');
    }

    //validasi data
    public function store(Request $request)
    {
    //1. proses validasi data
    $validasi = $request->validate(
    [
    'nip'=>'required|unique:anggota|numeric'
    ,
    'nama'=>'required|max:50',
    'alamat'=>'required',
    'email'=>'required|max:50|regex:/(.+)@(.+)\.(.+)/i',
    ],
    //2. menampilkan pesan kesalahan
    //pesan kesalahan saat invalid data (kelanjutan slide sebelumnya)
    [
        'nip.required'=>'NIP Wajib di Isi',
        'nip.unique'=>'NIP Tidak Boleh Sama',
        'nip.numeric'=>'Harus Berupa Angka',
        'nama.required'=>'Nama Wajib di Isi',
        'alamat.required'=>'Alamat Wajib di Isi',
        'email.required'=>'Email Wajib di Isi',
        'email.regex'=>'Harus berformat email',
        ],
        );

    //3. proses input data tangkap request dari form input
    DB::table('anggota')->insert(
    [
    'nip'=>$request->nip,
    'nama'=>$request->nama,
    'alamat'=>$request->alamat,
    'email'=>$request->email,
    ]
    );
    //4.landing page
    return redirect()->route('anggota.index')->with('success','Data anggota berhasil ditambahkan.');
    }   
        
}
