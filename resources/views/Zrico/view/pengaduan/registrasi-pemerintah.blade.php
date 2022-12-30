@extends('Zrico.view.pengaduan.layout-registrasi-pemerintah')

@section('title','Pandu | Registrasi Pemerintah')

@section('body')
<div>
    <div>
        <h1 class="text-center">Registrasi Pemerintah Daerah</h1>
    </div>
    <div>
        <form action="">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NIK</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan NIK">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nomor Telepon">
            </div>
        </form>
    </div>
</div>
@endsection