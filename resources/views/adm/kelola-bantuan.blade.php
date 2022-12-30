@extends('layout.layout-dashboard')

@section('title', 'Kelola Bantuan | Admin')

@section('body')

@if(!empty($info))
<h2 class="font-600 mb-5">Kelola Bantuan</h2>

<div class="text-start">
    <a type="button" href="{{route('adm-kelola-bantuan-tambah')}}" class="btn btn-primary px-4 mt-2 mb-4">Tambah</a>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Jawaban</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($daftar as $daftars)
            <tr>
                <th class="text-center">{{$loop->index+1+($daftar->currentPage()-1)*5}}</th>
                <td>{{Str::limit($daftars->pertanyaan, 30)}}</td>
                <td>{{Str::limit($daftars->jawaban, 70)}}</td>
                <td>
                    <div class="btn-group dropstart">
                        <button type="button" class="btn px-0 py-0 btn-link-disabled-color" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="material-icons">
                                more_vert
                            </span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('adm-kelola-bantuan-detail', $daftars->id)}}">Detail</a></li>
                            <li><a class="dropdown-item" href="{{route('adm-kelola-bantuan-ubah', $daftars->id)}}">Ubah</a></li>
                            <form action="{{route('adm-kelola-bantuan-hapus', $daftars->id)}}" method="post">
                                @csrf
                                <li><button type="submit" class="dropdown-item">Hapus</button></li>
                            </form>
                        </ul>
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

@if ($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    <strong>{{$message}}</strong>
</div>
@endif
@endif


@if(!empty($tambah))
<form action="{{route('adm-kelola-bantuan-tambah-submit')}}" method="post">
    @csrf
    <h2 class="font-600 mb-5">Tambah Bantuan</h2>

    <label class="form-label mt-3">Pertanyaan</label>
    <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" placeholder="Masukkan pertanyaan" id="pertanyaan" name="pertanyaan" value="{{old('pertanyaan')}}" required spellcheck="false">
    @error('pertanyaan')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label class="form-label mt-3">Jawaban</label>
    <textarea class="form-control @error('jawaban') is-invalid @enderror" placeholder="Masukkan jawaban" rows="3" id="jawaban" name="jawaban" required spellcheck="false">{{old('jawaban')}}</textarea>
    @error('jawaban')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror


    <div class="d-flex flex-row-reverse mt-5 mb-5">
        <div class="text-end">
            <button type=" submit" class="btn btn-success">Simpan</button>
        </div>
        <div class="me-4">
            <a type="button" href="{{route('adm-kelola-bantuan')}}" class="btn btn-danger">Kembali</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        <strong>{{$message}}</strong>
    </div>
    @endif
</form>
@endif

@if(!empty($detail))
<h2 class="font-600 mb-5">Detail Bantuan</h2>

<label class="form-label mt-3">Pertanyaan</label>
<input type="text" class="form-control" value="{{$help->pertanyaan}}" disabled readonly>

<label class="form-label mt-3">Jawaban</label>
<textarea class="form-control" rows="3" id="jawaban" disabled readonly>{{$help->jawaban}}</textarea>

@if ($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    <strong>{{$message}}</strong>
</div>
@endif

<div class="d-flex flex-row-reverse mt-5 mb-5">
    <div>
        <a type="button" href="{{route('adm-kelola-bantuan')}}" class="btn btn-danger">Kembali</a>
    </div>
</div>
@endif


@if(!empty($ubah))
<form action="{{route('adm-kelola-bantuan-ubah-submit', $help->id)}}" method="post">
    @csrf
    <h2 class="font-600 mb-5">Ubah Bantuan</h2>

    <label class="form-label mt-3">Pertanyaan</label>
    <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" placeholder="Masukkan pertanyaan" id="pertanyaan" name="pertanyaan" value="{{old('pertanyaan') ?? $help->pertanyaan}}" required spellcheck="false">
    @error('pertanyaan')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label class="form-label mt-3">Jawaban</label>
    <textarea class="form-control @error('jawaban') is-invalid @enderror" placeholder="Masukkan jawaban" rows="3" id="jawaban" name="jawaban" required spellcheck="false">{{old('jawaban') ?? $help->jawaban}}</textarea>
    @error('jawaban')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror


    <div class="d-flex flex-row-reverse mt-5 mb-5">
        <div class="text-end">
            <button type=" submit" class="btn btn-success">Simpan</button>
        </div>
        <div class="me-4">
            <a type="button" href="{{route('adm-kelola-bantuan')}}" class="btn btn-danger">Kembali</a>
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