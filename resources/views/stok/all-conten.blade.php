@extends('template/index')

@section('konten')

<div class="tab-content">
  @yield('konten-form-stock')
</div>

<div class="tab-content">
  @yield('form-keluar')
</div>

<div class="tab-content">
  @yield('konten-master-stok')
</div>


<div class="tab-content">
  @yield('master-history-delete')
</div>

@endsection