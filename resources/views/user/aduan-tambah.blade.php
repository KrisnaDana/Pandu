@extends('layout.layout-dashboard')

@section('title', 'Tambah Aduan')

@section('body')
<div>
    <h2 class="font-600 mb-5">Tambah Pengaduan</h2>

    <form action="{{route('aduan-tambah-submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label class="form-label">Judul</label>
        <input type="text" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan judul" id="judul" name="judul" value="{{old('judul')}}" required spellcheck="false">
        @error('judul')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label class="form-label mt-3">Deskripsi</label>
        <textarea class="form-control @error('aduan') is-invalid @enderror" placeholder="Masukkan aduan" rows="3" id="aduan" name="aduan" required spellcheck="false">{{old('aduan')}}</textarea>
        @error('aduan')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label class="form-label mt-3">Kategori</label>
        <select class="form-select" aria-label="Default select example" name="kategori">
            @foreach($kategori as $kategoris)
            <option value="{{$kategoris->id}}">{{$kategoris->kategori}}</option>
            @endforeach
        </select>

        <label class="form-label mt-3">Upload File</label>
        <!-- <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar"> -->
        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar[]" multiple>
        @error('gambar')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="form-check form-switch mt-3">
            <input class="form-check-input" type="checkbox" role="switch" id="hide" value="1" name="hide">
            <label class="form-check-label" for="hide">Sembunyikan Identitas</label>
        </div>

        <div class="d-flex flex-row-reverse mt-4 mb-5">
            <div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <div class="me-4">
                <a type="button" href="{{route('dashboard')}}" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
</div>

@endsection