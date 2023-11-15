@extends('master/all')
@section('master-konten')
<div class="row">
  <h3 class="text-center">Master Data Kategori</h3>
  <div class="col-12 text-end">
      <a href="{{ route('master-kategori-tambah')}}" class="btn btn-primary rounded-circle">
      <i class="fa fa-solid fa-plus"></i>Tambah Data</a>
  </div>
</div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Pilihan</th>
       
          </tr>
        </thead>
        <tbody>
          @php
              $i = 1;
          @endphp
            @foreach($kategori as $b)
              <tr>
                <th scope='row'>{{ $i++}}</th>
                <td>{{ $b->kode }}</td>
                <td>{{ $b->nama_kategori }}</td>
                <td>{{ $b->deskripsi }}</td>
                <td>
                    <a href="{{ route('master-kategori-detail', ['id' => $b->id]) }}" 
                      class="btn btn-sm btn-success rounded-circle"> 
                      <i class="fa fa-solid fa-eye"></i> 
                    </a>

                    <a href="{{ route('master-kategori-edit', ['id' => $b->id]) }}" 
                      class="btn btn-sm btn-warning rounded-circle"> 
                      <i class="fa fa-solid fa-pencil"></i> 
                    </a>

                    <a href="{{ route('master-kategori-hapus', ['id' => $b->id]) }}" 
                      class="btn btn-danger rounded-circle" 
                      onclick="return confirm('Apakah anda yakin ingin hapus {{ $b->kode }} ?')">
                      <i class="fa fa-trash"></i> </a></td>
              </tr>
          @endforeach
          
        </tbody>
      </table>
@endsection