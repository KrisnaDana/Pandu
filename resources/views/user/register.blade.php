@extends('layout.layout-register')

@section('title', 'Pandu | Registrasi')

@section('body')
<div>
    <h5 class="login pt-5 pb-3 text-center">Registrasi</h5>
    <div class="mx-5 mt-5">
        <form action="{{route('register-submit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="form-label">NIK</label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" placeholder="Masukkan NIK" id="nik" name="nik" value="{{old('nik')}}" required spellcheck="false">
            @error('nik')
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

            <label class="form-label mt-3">Scan KTP</label>
            <input type="file" class="form-control @error('scan') is-invalid @enderror" id="scan" name="scan">
            @error('scan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label class="form-label mt-3">Foto Diri Dengan KTP</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
            @error('foto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="text-center" style="margin-top:100px;">
                <button type="submit" class="btn btn-success px-5 mb-3">Registrasi</button>
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

    <br><br><br><br><br>
</div>
@endsection