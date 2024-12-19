@extends('adminlte::page')
@section('title', 'Form Buku')
@section('content_header')
<h1>Data Buku</h1>
<br>
<a href="{{ route('buku.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content')
{{-- Panggil master data pengarang, penerbit dan kategori untuk
ditampilkan di element form edit buku --}}
@php
$rs1 = App\Models\Pengarang::all();
$rs2 = App\Models\Penerbit::all();
$rs3 = App\Models\Kategori::all();
@endphp
@foreach($data as $b)
<form method="POST" action="{{ route('buku.update',$b->id) }}">

@csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
@method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah
disetiap element form edit buku --}}

<div class="form-group">
<label>ISBN</label>
<input type="text" name="isbn" value="{{ $b->isbn }}" class="form-control"/>
</div>

<div class="form-group">
<label>Judul</label>
<input type="text" name="judul" class="form-control" value="{{ $b->judul }}" />
</div>

<div class="form-group">
<label>Tahun Cetak</label>
<input type="text" name="thn_cetak" class="form-control" value="{{ $b->thn_cetak }}" />
</div>

<div class="form-group">
<label>Stok</label>
<input type="text" name="stok" class="form-control" value="{{ $b->stok }}" />
</div>

<div class="form-group">
<label>Pengarang</label>
<select class="form-control" name="idpengarang">
<option value="">-- Pilih Pengarang --</option>
@foreach($rs1 as $p)
{{-- edit pengarang --}}
@php
$sel1 = ($p->id == $b->idpengarang) ? 'selected' : '';
@endphp
<option value="{{ $p->id }}" {{ $sel1 }}>{{ $p->nama }}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Penerbit</label>
<select type="text" name="idpenerbit" class="form-control">
<option value="">-- Pilih Penerbit --</option>
@foreach($rs2 as $pen)
{{-- edit penerbit --}}
@php
$sel2 = ($pen->id == $b->idpenerbit) ? 'selected' : '';
@endphp
<option value="{{ $pen->id }}" {{ $sel2 }}>{{ $pen->nama }}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Kategori</label>
<select type="text" name="idkategori" class="form-control">
<option value="">-- Pilih Kategori --</option>
@foreach($rs3 as $pen)
{{-- edit penerbit --}}
@php
$sel3 = ($pen->id == $b->idkategori) ? 'selected' : '';
@endphp
<option value="{{ $pen->id }}" {{ $sel3 }}>{{ $pen->nama }}</option>
@endforeach
</select>
</div>

<button type="submit" class="btn btn-primary"
name="proses">Ubah</button>
<button type="reset" class="btn btn-warning"
name="unproses">Batal</button>
@endforeach
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop