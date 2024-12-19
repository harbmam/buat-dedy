@extends('adminlte::page')
@section('title', 'Data Pegawai')
@section('content_header')
<h1 class="fa fa-users"> Form Pegawai</h1>
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
<form action="{{ route('pegawai.store')}}" method="POST">
    @csrf
    {{-- cros-site request forgery (CSRF) = PENCEGAHAN serangan yang dilakukan oleh pengguna yang tidak terautentikasi --}}
    <div class="form-group">
    <label for="">NIP</label>
    <input type="text" name="nip" class="form-control"/>
    </div>

    <div class="form-group">
    <label for="">Nama</label>
    <input type="text" name="nama" class="form-control"/>
    </div>

    <div class="form-group">
    <label for="">Alamat</label>
    <textarea name="alamat" class="form-control"></textarea>
    </div>

    <div class="form-group">
    <label for="">E-mail</label>
    <input type="email" name="email" class="form-control"/>
    </div>

    <a class="btn btn-primary btn-md"
    href="{{ route('pegawai.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-check"> Simpan</i></button>
    
</form>
@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop
