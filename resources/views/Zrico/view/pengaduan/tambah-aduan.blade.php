@extends('Zrico.view.pengaduan.layout-pengaduan')

@section('title','Pandu | Tambah Aduan')

@section('body')
<div class="container-tambah-aduan">
    <h1>Tambah Pengaduan</h1>
    <div class="mb-4 new-text">
        <label for="judul-pengaduan" class="form-label ">judul Pengaduan</label>
        <input type="text" class="form-control @error('judul-pengaduan') is-invalid @enderror bg-transparent" id="kabupaten" name="judul-pengaduan" placeholder="Berikan Judul Pengaduan" value="{{old('judul-pengaduan')}}">
        @error('kabupaten')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-4 new-text">
        <label for="deskripsi" class="form-label new-text">Deskripsi Pengaduan</label>
        <textarea class="form-control @error('deskripsi') is-invalid @enderror bg-transparent text-white" id="deskripsi" name="deskripsi" rows="5">{{old('deskripsi')}}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <label for="kategori" class="form-label new-text">Kategori Pengaduan</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Semua Kategori </option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Dokumen Pendukung</label>
        <input class="form-control" type="file" id="formFile">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Gambar Pendukung</label>
        <input class="form-control" type="file" id="formFile">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Suara Pendukung</label>
        <input class="form-control" type="file" id="formFile">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Video Pendukung </label>
        <input class="form-control" type="file" id="formFile">
    </div>
    <div class="form-check form-switch">
        <label class="form-check-label" for="flexSwitchCheckDefault">Sembunyikan Identitas</label>
        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
    </div>
    <div class="mt-4">
        <a type="button" class="btn btn-outline-danger" href="#">Back</a>
        <button type="submit" class="btn btn-outline-primary">Save</button>
    </div>
</div>
@endsection