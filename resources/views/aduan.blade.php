@extends('layout.layout-dashboard')

@auth('userr')
@section('title', 'Aduan')
@endauth

@auth('pemerintah')
@section('title', 'Aduan | Pemerintah')
@endauth

@auth('adm')
@section('title', 'Aduan | Admin')
@endauth

@section('body')
<h2 class="font-600 mb-5">Detail Pengaduan</h2>

@auth('pemerintah')
@if($aduan->id_aduan_status == '1')
<div class="text-end mb-4">
    <form action="{{route('pemerintah-selesai', $aduan->id)}}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Selesai</button>
    </form>
</div>
@endif
@endauth

<div class="card mb-3">
    <div class="card-body">
        <h4 class="card-title">{{$aduan->judul}}</h4>

        <p class="card-text">{{$aduan->aduan}}</p>
        <div class="d-flex flex-row">
            <div class="mt-2">
                @if($aduan->hide_status == 0)
                <h6 class="card-sub-title">{{$user_data->nama}}</h6>
                @else
                <h6 class="card-sub-title">Anonim</h6>
                @endif

            </div>
        </div>
        <div class="mt-2">
            <p class="card-text">{{$aduan->waktu}}</p>
        </div>
    </div>
</div>

@if(count($aduan_file)>0)
<div class="btn-group mt-2 mb-5">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Download
    </button>
    <ul class="dropdown-menu">
        @php
        $x=1;
        @endphp
        @foreach($aduan_file as $files)
        <li><a class="dropdown-item" href="{{asset('/storage/'.$files->link)}}" download>Gambar {{$x}}</a></li>
        @php
        $x++;
        @endphp
        @endforeach
    </ul>
</div>
@endif


@php
$id = 0;
@endphp
@foreach($balasan as $balasans)
@if($balasans->id == $id)
@break
@endif
<div class="card mt-3 mb-3">
    <div class="card-body">
        <h4 class="card-title">Balasan</h4>

        <p class="card-text">{{$balasans->balasan}}</p>
        <div class="d-flex flex-row">
            <div class="mt-2">
                <h6 class="card-sub-title">Pemerintah</h6>
            </div>
        </div>
        <div class="mt-2">
            <p class="card-text">{{$balasans->waktu}}</p>
        </div>
    </div>


</div>
@php
$id = $balasans->id
@endphp
@if(count($balasan)>0 && $balasans->link != '0')
<div class="btn-group mt-2 mb-3">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Download
    </button>
    <ul class="dropdown-menu">
        @php
        $i=1;
        @endphp
        @foreach($balasan as $file)
        @if($id == $file->id_balasan)
        <li><a class="dropdown-item" href="{{asset('/storage/'.$file->link)}}" download>Gambar {{$i}}</a></li>
        @php
        $i++;
        @endphp
        @endif
        @endforeach
    </ul>
</div>
@endif
@endforeach

@auth('userr')
<div class="text-end mb-5">
    <a type="button" class="btn btn-danger" href="{{route('dashboard')}}">Kembali</a>
</div>
@endauth

@auth('pemerintah')

<h4 class="font-600 mb-3 mt-5">Buat Balasan</h4>
<form action="{{route('pemerintah-balasan', $aduan->id)}}" method="post" enctype="multipart/form-data">
    @csrf

    <label class="form-label mt-3">Deskripsi</label>
    <textarea class="form-control @error('balasan') is-invalid @enderror" placeholder="Masukkan balasan" rows="3" id="balasan" name="balasan" required spellcheck="false">{{old('balasan')}}</textarea>
    @error('balasan')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label class="form-label mt-3">Upload File</label>
    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar[]" multiple>
    @error('gambar')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="d-flex flex-row-reverse mt-4 mb-5">
        <div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        <div class="me-4">
            <a type="button" href="{{route('pemerintah-dashboard')}}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</form>
@endauth

@auth('adm')
<div class="text-end mb-5">
    <a type="button" class="btn btn-danger" href="{{route('adm-dashboard')}}">Kembali</a>
</div>
@endauth

@endsection