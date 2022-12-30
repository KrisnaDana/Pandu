@extends('layout.layout-dashboard')

@auth('userr')
@section('title', 'Profil')
@endauth

@auth('pemerintah')
@section('title', 'Profil | Pemerintah')
@endauth

@section('body')

@if(!empty($userr))
<h2 class="font-600 mb-5">Ubah Profil</h2>

<form action="{{route('profil-ubah')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="text-center">
        @if(!empty($profil->foto))
        <img style="width: 250px; height: 250px; border-radius:50%; object-fit: cover;" src="{{asset('storage/'. $profil->foto)}}">
        @else
        <img style="width: 250px; height: 250px; border-radius:50%; object-fit: cover;" src="https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1223671392?b=1&k=20&m=1223671392&s=170667a&w=0&h=J-o-ntQutLd5iHQEWAd-huWt8uBanu4O8V0O1BaG7nU=">
        @endif
    </div>

    <label class="form-label mt-3">Nama</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" id="nama" name="nama" value="{{old('nama') ?? $profil->nama}}" required spellcheck="false">
    @error('nama')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label class="form-label mt-3">Nomor Telepon</label>
    <input type="text" class="form-control @error('telepon') is-invalid @enderror" placeholder="Masukkan Nomor Telepon" id="telepon" name="telepon" value="{{old('telepon') ?? $profil->no_telepon}}" required spellcheck="false">
    @error('telepon')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label class="form-label mt-3">Alamat</label>
    <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat" rows="3" id="alamat" name="alamat" required spellcheck="false">{{old('alamat') ?? $profil->alamat}}</textarea>
    @error('alamat')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label class="form-label mt-3">Ubah Foto Profil</label>
    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
    @error('foto')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="d-flex flex-row-reverse mt-5 mb-5">
        <div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        <div class="me-4">
            <a type="button" href="{{route('dashboard')}}" class="btn btn-danger">Kembali</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        <strong>{{$message}}</strong>
    </div>
    @endif

</form>
@endif

@if(!empty($pemerintah))
<h2 class="font-600 mb-5">Ubah Profil</h2>

<form action="{{route('pemerintah-profil-ubah')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="text-center">
        @if(!empty($profil->foto))
        <img style="width: 250px; height: 250px; border-radius:50%; object-fit: cover;" src="{{asset('storage/'. $profil->foto)}}">
        @else
        <img style="width: 250px; height: 250px; border-radius:50%; object-fit: cover;" src="https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1223671392?b=1&k=20&m=1223671392&s=170667a&w=0&h=J-o-ntQutLd5iHQEWAd-huWt8uBanu4O8V0O1BaG7nU=">
        @endif
    </div>

    <label class="form-label mt-3">Nama</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" id="nama" name="nama" value="{{old('nama') ?? $profil->nama}}" required spellcheck="false">
    @error('nama')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label class="form-label mt-3">Jabatan</label>
    <select class="form-select" aria-label="Default select example" name="jabatan">
        @foreach($jabatan as $jabatans)
        @if(!old('jabatan') && $profil->pemerintah_jabatan->jabatan == $jabatans->jabatan)
        <option value="{{$profil->pemerintah_jabatan->id}}" selected>{{$profil->pemerintah_jabatan->jabatan}}</option>
        @elseif(old('jabatan') && old('jabatan') == $jabatans->id)
        <option value="{{old('jabatan')}}" selected>{{$jabatans->jabatan}}</option>
        @elseif(old('jabatan') == $jabatans->id)
        @else
        <option value="{{$jabatans->id}}">{{$jabatans->jabatan}}</option>
        @endif
        @endforeach
    </select>

    <label class="form-label mt-3">Nomor Telepon</label>
    <input type="text" class="form-control @error('telepon') is-invalid @enderror" placeholder="Masukkan Nomor Telepon" id="telepon" name="telepon" value="{{old('telepon') ?? $profil->no_telepon}}" required spellcheck="false">
    @error('telepon')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label class="form-label mt-3">Alamat</label>
    <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat" rows="3" id="alamat" name="alamat" required spellcheck="false">{{old('alamat') ?? $profil->alamat}}</textarea>
    @error('alamat')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label class="form-label mt-3">Ubah Foto Profil</label>
    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
    @error('foto')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="d-flex flex-row-reverse mt-5 mb-5">
        <div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        <div class="me-4">
            <a type="button" href="{{route('pemerintah-dashboard')}}" class="btn btn-danger">Kembali</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        <strong>{{$message}}</strong>
    </div>
    @endif

</form>
@endif

@endsection