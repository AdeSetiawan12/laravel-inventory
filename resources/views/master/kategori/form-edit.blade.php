@extends('master/all')
@section('master-konten')

<form action="{{ route('master-kategori-update', $kategori[0]->id)}}" method="post">
    @csrf 
    <h5>Edit Master Kategori</h5>
    <div class="mb-3">
        <label for="html_kode" class="form-label">Kode</label>
        <input type="text" class="form-control w-50" id="html_kode" name="html_kode" value="{{ old('html_kode', $kategori[0]->kode)}}" placeholder="Kode kategori" disabled>
        @if ($errors->has('html_kode'))
            <div class="badge text-bg-danger">{{ $errors->first('html_kode') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="html_nama_kategori" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control w-50" id="html_nama_kategori" name="html_nama_kategori" value="{{ old('html_nama_kategori', $kategori[0]->nama_kategori)}}" placeholder="Nama Kategori">
        @if ($errors->has('html_nama_kategori'))
            <div class="badge text-bg-danger">{{ $errors->first('html_nama_kategori') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="html_deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control w-50" id="html_deskripsi" name="html_deskripsi" rows="4">{{ old('html_deskripsi',$kategori[0]->deskripsi) }}</textarea>
        @if ($errors->has('html_deskripsi'))
            <div class="badge text-bg-danger">{{ $errors->first('html_deskripsi') }}</div>
        @endif
    </div>

    <button type="submit" class="btn btn-warning">
        <i class="fa fa-solid fa-save me-2"></i>Update
    </button>
</form>
@endsection
