@extends('layout.layout-dashboard')

@auth('userr')
@section('title', 'Dashboard')
@endauth

@auth('pemerintah')
@section('title', 'Dashboard | Pemerintah')
@endauth

@auth('adm')
@section('title', 'Dashboard | Admin')
@endauth

@section('body')
<div>
    <h2 class="font-600">Daftar Pengaduan</h2>

    @auth('userr')
    <div class="text-end">
        <a type="button" href="{{route('aduan-tambah')}}" class="btn btn-primary px-4 mt-2">Tambahkan Pengaduan</a>
    </div>
    @endauth

    <livewire:kategori></livewire:kategori>

</div>
@endsection