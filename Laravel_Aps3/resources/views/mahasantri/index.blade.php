@extends('adminlte::page')
@section('title', 'Data Mahasantri')
@section('content_header')
<h3 class="fa fa-graduation-cap" > Data Mahasantri</h3>
@stop
@section('content')
@php
$ar_tabel = ['No','Nama','NIM','Jurusan','Mata Kuliah','Dosen Pengajar'];
$no = 1;
@endphp
<a class="btn btn-primary" href="{{ route('mahasantri.create') }}"
role="button">Tambah</a><br/><br/>
<table class="table table-striped">
<thead>
<tr>
@foreach($ar_tabel as $jdl)
<th>{{ $jdl }}</th>
@endforeach
</tr>   
</thead> 
<tbody>
@foreach($ar_mahasantri as $b)
<tr>
<td>{{ $no++ }}</td>
<td>{{ $b->nama}}</td>
<td>{{ $b->nim }}</td>
<td>{{ $b->pen}}</td>
<td>{{ $b->mt}}</td>
<td>{{ $b->dos}}</td>
@endforeach
</tbody>
</table>
@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop