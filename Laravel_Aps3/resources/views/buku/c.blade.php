@extends('adminlte::page')
@section('title', 'Form Buku')
@section('content_header')
<h1>Data Buku</h1>
<br/>
<a href="{{ route('buku.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content')
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
{{-- Panggil master data pengarang, penerbit dan kategori untuk
ditampilkan di element form --}}
@php
$rs1 = App\Models\Pengarang::all();
$rs2 = App\Models\Penerbit::all();
$rs3 = App\Models\Kategori::all();
@endphp
<form method="POST" action="{{ route('buku.store') }}">
@csrf {{-- security untuk menghindari dari serangan pada saat input form --}}

<div class="form-group">
<label>ISBN</label>
<input type="text" name="isbn" class="form-control"/>
</div>

<div class="form-group">
<label>Judul</label>
<input type="text" name="judul" class="form-control"/>
</div>

<div class="form-group">
<label>Tahun Cetak</label>
<input type="text" name="thn_cetak" class="form-control"/>
</div>

<div class="form-group">
<label>Stok</label>
<input type="text" name="stok" class="form-control"/>
</div>
{{-- Panggil master data pengarang untuk ditampilkan di element form select --}}
<div class="form-group">
<label>Pengarang</label>
<select class="form-control" name="idpengarang">
<option value="">-- Pilih Pengarang --</option>
@foreach($rs1 as $p)
<option value="{{ $p->id }}">{{ $p->nama }}</option>
@endforeach
</select>
</div>
{{-- Panggil master data penerbit untuk ditampilkan di element form select --}}
<div class="form-group">
<label>Penerbit</label>
<select class="form-control" name="idpenerbit">
<option value="">-- Pilih Penerbit --</option>
@foreach($rs2 as $pen)
<option value="{{ $pen->id }}">{{ $pen->nama }}</option>
@endforeach
</select>
</div>
{{-- Panggil master data kategori untuk ditampilkandi element radio button--}}
<div class="form-group">
<label>Kategori</label>
<select class="form-control" name="idkategori">
<option value="">-- Pilih Kategori --</option>
@foreach($rs3 as $k)
<option value="{{ $k->id }}">{{ $k->nama }}</option>
@endforeach
</select>
</div>
<button type="submit" class="btn btn-primary"
name="proses">Simpan</button>
<button type="reset" class="btn btn-warning"
name="unproses">Batal</button>
@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop