@extends('master/all')
@section('master-konten')
<h3>Detail Kategori</h3>
@if (isset($kategori[0]))
@php
//konversi format tanggal sql menjadi mudah dibaca oleh manusia
$tanggal_dibuat = new DateTime($kategori[0]->dibuat_kapan);
$dibuat = $tanggal_dibuat->format('D, d M Y');

$tanggal_diperbarui = new DateTime($kategori[0]->diperbarui_oleh);
$diperbarui = $tanggal_diperbarui->format('D, d M Y');

@endphp
<div class="card w-50 shadow">
<div class="card-body">
  <h5 class="card-title">{{$kategori[0]->kode}}</h5>
  <h6 class="card-title">{{$kategori[0]->nama_kategori}}</h6>
  
  <p class="card-text">{{$kategori[0]->deskripsi}}</p>
  <span class="card-text">Dibuat: {{$dibuat}} | {{$kategori[0]->dibuat_nama}}</span><br>  
  <span class="card-text">Terakhir Diperbarui: {{$diperbarui}} | {{$kategori[0]->diperbarui_nama}}</span>  
  {{-- <a href="#" class="btn btn-primary">Print</a> --}}
</div>
</div>
    
@else
    <h5>Data Barang tidak ada</h5>
@endif

@endsection
