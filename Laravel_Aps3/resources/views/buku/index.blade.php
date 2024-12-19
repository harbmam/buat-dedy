@extends('adminlte::page')
@section('title', 'Data Anggota')
@section('content_header')
<h3 class="fa fa-book"> Data Buku</h3>
@stop
@section('content')
@if (session('success'))
<div class="alert alert-info">
    {{session('success')}}
</div>
@endif
@php
$ar_judul = ['No','ISBN','Judul','Stok','Pengarang','Penerbit','Kategori','Action'];
$no = 1;
@endphp
<a class="btn btn-primary" href="{{ route('buku.create') }}"
role="button">Tambah Buku</a><br/><br/>
<div class="card">
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
@foreach($ar_judul as $jdl)
<th>{{ $jdl }}</th>
@endforeach
</tr>
</thead> 
<tbody>
@foreach($ar_buku as $b)
<tr>
<td>{{ $no++ }}</td>
<td>{{ $b->isbn }}</td>
<td>{{ $b->judul }}</td>
<td>{{ $b->stok }}</td>
<td>{{ $b->nama }}</td>
<td>{{ $b->pen }}</td>
<td>{{ $b->kat }}</td>
<td>
    <form method="POST" action="{{ route('buku.destroy',$b->id) }}">
        @csrf {{--security untuk menghindari dari serangan pada saat input form--}}
        @method('delete') {{--method delete digunakan untuk menghapus data--}}
        <a class="btn btn-info" href="{{ route('buku.show',$b->id )}}">Detail</a>
        <a class="btn btn-success"href="{{ route('buku.edit',$b->id )}}">Edit</a>
        <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data Dihapus?')">Hapus</button>
    </form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
@stop
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@stop 

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script> console.log('Hi!');</script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <!-- Page specific script -->
@stop