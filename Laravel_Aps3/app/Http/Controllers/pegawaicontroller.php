<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan kode dibawah ini
use DB;
use App\Models\Pegawai;
class pegawaicontroller extends Controller
{
    public function index() //fungsi untuk menampilkan data pegawai
    {
    //dapatkan seluruh data pegawai dengan query builder
    $ar_pegawai = DB::table('pegawai')->get();
    //arahkan ke halaman baru dengan menyertakan data pegawai(compact)
    //di resources/views/pegawai/index.blade.php
    return view('pegawai/index',compact('ar_pegawai'));
    //pegawai.index(juga bisa)
    }

    public function create(){
        //mengarahkan hal ke form
        return view('pegawai.form');
    }

    //validasi data
    public function store(Request $request)
    {
    //1. proses validasi data
    $validasi = $request->validate(
    [
    'nip'=>'required|unique:pegawai|numeric'
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
    DB::table('pegawai')->insert(
    [
    'nip'=>$request->nip,
    'nama'=>$request->nama,
    'alamat'=>$request->alamat,
    'email'=>$request->email,
    ]
    );
    //4.landing page
    return redirect()->route('pegawai.index')->with('success','Data pegawai berhasil ditambahkan.');
    }   
        
}
