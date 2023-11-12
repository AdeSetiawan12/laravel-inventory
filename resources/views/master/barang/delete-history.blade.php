@extends('stok/all-conten')

@section('master-history-delete')

  <h2 style="text-align: center;">Restore Data Barang</h2>
    <table class="table table-hover" style="margin: 2rem;">
  <thead><hr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode</th>
      <th scope="col">Nama</th>
      <th style="width: 30%;" scope="col">Deskripsi</th>
      <th scope="col">Restore</th>
     
    </tr>
  </thead>
  <tbody>

  @php
    $i = 1;
  @endphp
@foreach ($barang as $b)
    <tr>
      <th>{{$i++}}</th>
      <td>{{$b -> kode}}</td>
      <td>{{$b -> nama}}</td>
      <td>{{$b -> deskripsi}}</td>
      <td>
          <a href="{{route('update-item', ['id' => $b->id]) }}" 
          class="btn btn-primary rounded-circle"
          onclick="return confirm('Apakah {{ $b->kode }} ingin di Restore : {{$b -> kode_barang}} ?')"> 
          <i class="fa-solid fa-trash-can-arrow-up"></i></a>
      </td>
    </tr>
@endforeach
  </tbody>
</table>

@endsection