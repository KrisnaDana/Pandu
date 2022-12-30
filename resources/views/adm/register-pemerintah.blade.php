@extends('layout.layout-dashboard')

@section('title', 'Registrasi Pemerintah | Admin')

@section('body')
<h2 class="font-600 mb-5">Registrasi Akun Pemerintah</h2>

<div class="mx-5 mt-5">
    <form action="{{route('adm-register-pemerintah-submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label class="form-label">NIK</label>
        <input type="text" class="form-control @error('nik') is-invalid @enderror" placeholder="Masukkan NIK" id="nik" name="nik" value="{{old('nik')}}" required spellcheck="false">
        @error('nik')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label class="form-label mt-3">NIP</label>
        <input type="text" class="form-control @error('nip') is-invalid @enderror" placeholder="Masukkan NIP" id="nip" name="nip" value="{{old('nip')}}" required spellcheck="false">
        @error('nip')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label class="form-label mt-3">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" id="nama" name="nama" value="{{old('nama')}}" required spellcheck="false">
        @error('nama')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label class="form-label mt-3">Jabatan</label>
        <select class="form-select" aria-label="Default select example" name="jabatan">
            @foreach($jabatan as $jabatans)
            @if(old('jabatan') && old('jabatan') == $jabatans->id)
            <option value="{{old('jabatan')}}" selected>{{$jabatans->jabatan}}</option>
            @elseif(old('jabatan') == $jabatans->id)
            @else
            <option value="{{$jabatans->id}}">{{$jabatans->jabatan}}</option>
            @endif
            @endforeach
        </select>

        <label class="form-label mt-3">Nomor Telepon</label>
        <input type="text" class="form-control @error('telepon') is-invalid @enderror" placeholder="Masukkan Nomor Telepon" id="telepon" name="telepon" value="{{old('telepon')}}" required spellcheck="false">
        @error('telepon')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label class="form-label mt-3">Tanggal Lahir</label>
        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Masukkan Tanggal Lahir" id="tanggal" name="tanggal" value="{{old('tanggal')}}" required spellcheck="false">
        @error('tanggal')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label class="form-label mt-3">Alamat</label>
        <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat" rows="3" id="alamat" name="alamat" required spellcheck="false">{{old('alamat')}}</textarea>
        @error('alamat')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label class="form-label mt-3">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" id="email" name="email" value="{{old('email')}}" required spellcheck="false">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label class="form-label mt-3">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password" id="password" name="password" required spellcheck="false">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label class="form-label mt-3">Konfirmasi Password</label>
        <input type="password" class="form-control  @error('konfirmasi') is-invalid @enderror" placeholder="Masukkan Konfirmasi Password" id="konfirmasi" name="konfirmasi" required spellcheck="false">
        @error('konfirmasi')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="d-flex flex-row-reverse mt-5 mb-5">
            <div class="text-end">
                <button type=" submit" class="btn btn-success">Registrasi</button>
            </div>
            <div class="me-4">
                <a type="button" href="{{route('adm-kelola-pemerintah')}}" class="btn btn-danger">Kembali</a>
            </div>
        </div>

    </form>
    @if ($message = Session::get('error'))
    <div class="alert alert-danger mt-3" role="alert">
        <strong>{{$message}}</strong>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        <strong>{{$message}}</strong>
    </div>
    @endif
</div>
@endsection