@extends('master/all')
@section('master-konten')
<div class="row">
  <div class="col-12 text-end">
    <a href="{{ route('master-barang-tambah')}}" class="btn btn-primary rounded-circle">
      <i class="fa fa-solid fa-plus"></i>Tambah Data</a>
  </div>
</div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode</th>
            <th scope="col">Nama</th>
            <th scope="col">Kategori</th>
       
          </tr>
        </thead>
        <tbody>
          @php
              $i = 1;
          @endphp
            @foreach($barang as $b)
              <tr>
                <th scope='row'>{{ $i++}}</th>
                <td>{{ $b->kode }}</td>
                <td>{{ $b->nama }}</td>
                <td>{{ $b->deskripsi }}</td>
                <td><a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm">Hapus</a></td>
              </tr>
          @endforeach
          
        </tbody>
      </table>
@endsection