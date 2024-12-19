@extends('adminlte::page')
@section('title', 'Data Anggota')
@section('content_header')
<h1 class="fa fa-user-secret"> Data Anggota</h1>
@stop
@section('content') {{-- Isi Konten Data Anggota --}}
@php
$ar_judul = ['No','NIP','Nama','Alamat','Email'];
$no = 1;
@endphp
<a class="btn btn-primary btn-md"
href="{{ route('anggota.create') }}" role="button"><i class="fa fa-plus"> Tambah Anggota</i></a><br/><br/>
<table class="table table-striped">
<thead>
<tr>
@foreach($ar_judul as $jdl)
<th>{{ $jdl }}</th>
@endforeach
</tr>
</thead>
<tbody>
@foreach($ar_anggota as $ang)
<tr>
<td>{{ $no++ }}</td>
<td>{{ $ang->nip }}</td>
<td>{{ $ang->nama }}</td>
<td>{{ $ang->alamat }}</td>
<td>{{ $ang->email }}</td>
</tr>
@endforeach
</tbody>
</table>
@stop       