<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use app/models/buku;

class bukucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_buku = DB::table('buku') //join tabel dengan Query Builder Laravel
        ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
        ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
        ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
        ->select('buku.*', 'pengarang.nama', 'penerbit.nama AS pen','kategori.nama AS kat')
        ->get();
        return view('buku.index',compact('ar_buku'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.c');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validasi = $request->validate(
                [
                'isbn'=>'required|numeric',
                'judul'=>'required|max:50',
                'thn_cetak'=>'required|numeric',
                'stok'=>'required|max:50',
                'idpengarang'=>'required',
                'idpenerbit'=>'required',
                'idkategori'=>'required',
                ],
                //2. menampilkan pesan kesalahan
                //pesan kesalahan saat invalid data (kelanjutan slide sebelumnya)
                [
                    'isbn.required'=>'ISBN Wajib di Isi',
                    'isbn.numeric'=>'Harus Berupa Angka',
                    'judul.required'=>'Judul Wajib di Isi',
                    'thn_cetak.required'=>'Wajib di Isi',
                    'thn_cetak.numeric'=>'Harus Berupa Angka',
                    'stok.required'=>'Stok Wajib di Isi',
                    'idpengarang.required'=>'ID Pengarnang Wajib di Isi',
                    'idpenerbit.required'=>'ID PenerbitWajib di Isi',
                    'idkategori.required'=>'ID Kategori Wajib di Isi',
                ],  
                );
                 //proses input data tangkap request dari form buku
        DB::table('buku')->insert(
            [
                'isbn'=>$request->isbn,
                'judul'=>$request->judul,
                'thn_cetak'=>$request->thn_cetak,
                'stok'=>$request->stok,
                'idpengarang'=>$request->idpengarang,
                'idpenerbit'=>$request->idpenerbit,
                'idkategori'=>$request->idkategori,
            ]
            );
            //landing page
            return redirect()->route('buku.index')->with('success','Data pegawai berhasil ditambahkan.');
        }   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilkan detail buku
        $ar_buku = DB::table('buku') //join tabel dengan Query Builder Laravel
        ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
        ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
        ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
        ->select('buku.*', 'pengarang.nama', 'penerbit.nama AS pen','kategori.nama AS kat')
        ->where('buku.id','=',$id)
        ->get();
        return view('buku.detail',compact('ar_buku')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         //mengarahkan ke halaman form edit buku
         $data = DB::table('buku')
         ->where('id','=',$id)->get();
         return view('buku.e',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('buku')->where('id','=',$id)->update(
            [
                'isbn'=>$request->isbn,
                'judul'=>$request->judul,
                'thn_cetak'=>$request->thn_cetak,
                'stok'=>$request->stok,
                'idpengarang'=>$request->idpengarang,
                'idpenerbit'=>$request->idpenerbit,
                'idkategori'=>$request->idkategori,
            ]
            );
            //landing page
            return redirect('/buku'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('buku')->where('id',$id)->delete();
        return redirect('/buku');
    }
}
