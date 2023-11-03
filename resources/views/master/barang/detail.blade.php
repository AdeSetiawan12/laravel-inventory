@extends('master/all')
@section('master-konten')
<h3>Detail Barang</h3>
@if (isset($barang[0]))
@php
//konversi format tanggal sql menjadi mudah dibaca oleh manusi
$tanggal_dibuat = new DateTime($barang[0]->dibuat_kapan);
$dibuat = $tanggal_dibuat->format('D, d M Y');

$tanggal_diperbarui = new DateTime($barang[0]->diperbarui_oleh);
$diperbarui = $tanggal_diperbarui->format('D, d M Y');

@endphp
<div class="card w-50 shadow">
<div class="card-body">
  <h5 class="card-title">{{$barang[0]->kode}}</h5>
  <h6 class="card-title">{{$barang[0]->nama}}</h6>
  
  <p class="card-text">{{$barang[0]->deskripsi}}</p>
  <span class="card-text">Dibuat: {{$dibuat}} | {{$barang[0]->dibuat_nama}}</span><br>  
  <span class="card-text">Terakhir Diperbarui: {{$diperbarui}} | {{$barang[0]->diperbarui_nama}}</span>  
  {{-- <a href="#" class="btn btn-primary">Print</a> --}}
</div>
</div>
    
@else
    <h5>Data Barang tidak ada</h5>
@endif

@endsection
