@extends('layout.layout-dashboard')

@section('title', 'Validasi | Admin')

@section('body')
<h2 class="font-600 mb-5">Validasi Akun Pengguna</h2>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($daftar as $daftars)
            <tr>
                <th class="text-center">{{$loop->index+1+($daftar->currentPage()-1)*5}}</th>
                <td>{{$daftars->email}}</td>
                <td>{{$daftars->nama}}</td>
                <td>{{$daftars->created_at}}</td>
                <td>
                    <div class="text-center">
                        @if($daftars->status == 'Terverifikasi')
                        <span class="material-icons text-success">
                            task_alt
                        </span>
                        @else
                        <span class="material-icons text-warning">
                            schedule
                        </span>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="btn-group dropstart">
                        <button type="button" class="btn px-0 py-0 btn-link-disabled-color" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="material-icons">
                                more_vert
                            </span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('pemerintah-akun-detail', $daftars->id_user)}}">Detail</a></li>
                            @if($daftars->status == 'Menunggu')
                            <form action="{{route('pemerintah-validasi-verifikasi', $daftars->id_user)}}" method="post">
                                @csrf
                                <li><button type="submit" class="dropdown-item">Verifikasi</button></li>
                            </form>
                            <form action="{{route('pemerintah-validasi-hapus', $daftars->id_user)}}" method="post">
                                @csrf
                                <li><button type="submit" class="dropdown-item">Hapus</button></li>
                            </form>
                            @endif
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$daftar->links()}}
    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-4" role="alert">
        <strong>{{$message}}</strong>
    </div>
    @endif

</div>
@endsection