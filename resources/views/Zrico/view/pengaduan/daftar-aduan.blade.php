@extends('Zrico.view.pengaduan.layout-pengaduan')

@section('title','Pandu | Daftar Aduan')

@section('body')
<section id="daftar-pengaduan">
    <div class="daftar">
        <h1>Daftar Pengaduan</h1>
        <div class="div-bt-tambah">
            <button type="button" class="btn btn-primary">Tambah Pengaduan</button>
        </div>
    </div>
    <div class="filcar">
        <div class="filter">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Semua Kategori</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="search">
            <form class="search-form">
                <div class="input"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" /></div>
                <div class="button"><button class="btn btn-outline-success" type="submit">Search</button></div>
            </form>
        </div>
    </div>
    <div class="box-aduan">
        <div class="conten-kiri">
            <h5>Lorem, ipsum dolor.</h5>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis, explicabo.</p>
        </div>
        <div class="konten-kanan">
            <div class="btn-go">
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</section>
@endsection