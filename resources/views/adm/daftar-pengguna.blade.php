@extends('layout.layout-dashboard')

@section('title', 'Daftar Pengguna | Admin')

@section('body')

@if(!empty($info))
<h2 class="font-600 mb-5">Daftar Pengguna</h2>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($daftar as $daftars)
            <tr>
                <th class="text-center">{{$loop->index+1+($daftar->currentPage()-1)*5}}</th>
                <td>{{$daftars->email}}</td>
                <td>{{$daftars->nama}}</td>
                <td>
                    <div class="text-center">
                        <a type="button" class="btn btn-sm btn-success" href="{{route('adm-daftar-pengguna-detail', $daftars->id_user)}}">Detail</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$daftar->links()}}
</div>

<div class="d-flex flex-row-reverse mt-5 mb-5">
    <div>
        <a type="button" href="{{route('adm-dashboard')}}" class="btn btn-danger">Kembali</a>
    </div>
</div>
@endif

@if(!empty($detail))
<h2 class="font-600 mb-5">Detail Akun</h2>

<div class="text-center">
    @if(!empty($profil->foto))
    <img style="width: 250px; height: 250px; border-radius:50%; object-fit: cover;" src="{{asset('storage/'. $profil->foto)}}">
    @else
    <img style="width: 250px; height: 250px; border-radius:50%; object-fit: cover;" src="https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1223671392?b=1&k=20&m=1223671392&s=170667a&w=0&h=J-o-ntQutLd5iHQEWAd-huWt8uBanu4O8V0O1BaG7nU=">
    @endif
</div>

<label class="form-label">NIK</label>
<input type="text" class="form-control" value="{{$profil->nik}}" disabled readonly>

<label class="form-label mt-3">Nama</label>
<input type="text" class="form-control" value="{{$profil->nama}}" disabled readonly>

<label class="form-label mt-3">Nomor Telepon</label>
<input type="text" class="form-control" value="{{$profil->no_telepon}}" disabled readonly>

<label class="form-label mt-3">Tanggal Lahir</label>
<input type="date" class="form-control" value="{{$profil->tanggal_lahir}}" disabled readonly>

<label class="form-label mt-3">Alamat</label>
<textarea class="form-control" disabled readonly>{{$profil->alamat}}</textarea>

<label class="form-label mt-3">Email</label>
<input type="email" class="form-control" value="{{$profil->email}}" disabled readonly>

<img class="mt-4" style="max-width:500px; max-height:500px;" src="{{asset('storage/'. $profil->ktp_scan)}}">
<img class="ms-2 mt-4" style="max-width:500px; max-height:500px;" src="{{asset('storage/'. $profil->ktp_foto)}}">

<div class="d-flex flex-row-reverse mt-4 mb-5">
    <div>
        <a type="button" href="{{route('adm-daftar-pengguna')}}" class="btn btn-danger">Kembali</a>
    </div>
</div>
@endif

@endsection