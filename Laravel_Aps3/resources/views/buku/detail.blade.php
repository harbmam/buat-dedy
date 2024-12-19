@extends('adminlte::page')
@section('title', 'Form Buku')
@section('content_header')
<h1>Data Buku</h1>
<br/>
<a href="{{ route('buku.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content')

@php
$rs1 = App\Models\Pengarang::all();
$rs2 = App\Models\Penerbit::all();
$rs3 = App\Models\Kategori::all();
@endphp

@foreach($ar_buku as $b)
<form method="POST" action="{{ route('buku.store') }}">
@csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
<br>
<div class="form-group">
<label>ISBN</label>
<input type="text" name="isbn" class="form-control" value="{{ $b->isbn }}" disabled/>
</div>

<div class="form-group">
<label>Judul</label>
<input type="text" name="judul" class="form-control" value="{{ $b->judul }}" disabled/>
</div>

<div class="form-group">
<label>Tahun Cetak</label>
<input type="text" name="thn_cetak" class="form-control" value="{{ $b->thn_cetak }}" disabled/>
</div>

<div class="form-group">
<label>Stok</label>
<input type="text" name="stok" class="form-control" value="{{ $b->stok }}" disabled/>
</div>

<div class="form-group">
<label>Pengarang</label>
<select name="idpengarang" class="form-control" disabled>
<option value="">-- Pilih Pengarang --</option>
@foreach($rs1 as $p)
@php
$sel1 = ($p->id == $b->idpengarang) ? 'selected' : '';
@endphp
<option value="{{ $p->id }}" {{ $sel1 }}>{{ $p->nama }}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Penerbit</label>
<select type="text" name="idpenerbit" class="form-control" disabled>
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
<select type="text" name="idkategori" class="form-control" disabled>
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

<!-- 
<div class="form-group">
<label>Pengarang</label>
<select name="idpengarang" class="form-control" value="{{ $b->nama }}" disabled>
</div>

<div class="form-group">
<label>Penerbit</label>
<input type="text" name="idpenerbit" class="form-control" value="{{ $b->pen }}" disabled>
</div>

<div class="form-group">
<label>Kategori</label>
<input type="text" name="idkategori" class="form-control" value="{{ $b->kat }}" disabled>
</div> -->

<!-- <div class="media">
    <div class="media-body">
        <h3><u>{{ $b->judul }}</u></h3>
        <p>
            ISBN : {{ $b->thn_cetak }} <br>
            Stok : {{ $b->stok }} <br>
            Pengarang : {{ $b->nama }} <br>
            Penerbit : {{ $b->pen }} <br>
            Kategori : {{ $b->kat }}
        </p>
        <hr>
    </div>
</div> -->
@endforeach 
@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop