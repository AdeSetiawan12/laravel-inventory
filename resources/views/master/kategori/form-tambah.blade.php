@extends('master/all')
@section('master-konten')

<form action="{{ route('master-kategori-simpan')}}" method="post">
    @csrf 
    <div class="mb-3">
        <label for="html_kode" class="form-label">Kode</label>
        <input type="text" class="form-control w-50" id="html_kode" name="html_kode" value="{{ old('html_kode')}}" placeholder="Kode Kategori" autofocus>
        @if ($errors->has('html_kode'))
            <div class="badge text-bg-danger">{{ $errors->first('html_kode') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="html_nama" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control w-50" id="html_nama_kategori" name="html_nama_kategori" value="{{ old('html_nama_kategori')}}" placeholder="Nama Kategori">
        @if ($errors->has('html_nama_kategori'))
            <div class="badge text-bg-danger">{{ $errors->first('html_nama_kategori') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="html_deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control w-50" id="html_deskripsi" name="html_deskripsi" rows="4">{{ old('html_deskripsi') }}</textarea>
        @if ($errors->has('html_deskripsi'))
            <div class="badge text-bg-danger">{{ $errors->first('html_deskripsi') }}</div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fa fa-solid fa-save me-2"></i>Simpan
    </button>
</form>
@endsection
