<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('/css/style.css')}}">
    <title>@yield('title')</title>
    @livewireStyles
</head>

<body id="dashboard-image">
    <div class=" x-font-rubik" style="display:block;">
        <nav class="navbar navbar-light x-bg-dark-blue fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="material-icons">
                        reorder
                    </span>
                </button>
                <div class="offcanvas offcanvas-start" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">PANDU</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-start flex-grow-1 pe-2">
                            @auth('userr')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('aduan-tambah')}}">Buat Aduan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('profil')}}">Profil</a>
                            </li>
                            @endauth

                            @auth('pemerintah')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('pemerintah-dashboard')}}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('pemerintah-validasi')}}">Validasi Pengguna</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('pemerintah-profil')}}">Profil</a>
                            </li>
                            @endauth

                            @auth('adm')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('adm-dashboard')}}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('adm-daftar-pengguna')}}">Daftar Pengguna</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('adm-kelola-pemerintah')}}">Kelola Akun Pemerintah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('adm-kelola-bantuan')}}">Kelola Bantuan</a>
                            </li>
                            @endauth
                            <!-- <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul> -->
                    </div>
                </div>
                <div class="btn-group">
                    @auth('userr')
                    <button type="button" class="btn btn-white px-0">
                        @php
                        $id = Auth::guard('userr')->user()->id;
                        $foto = DB::table('user_datas')->select('foto')->where('id_user', '=', $id)->first();
                        @endphp

                        @if(!empty($foto->foto))
                        <img style="width: 45px; height: 45px; border-radius:50%; object-fit: cover;" src="{{asset('storage/'. $foto->foto)}}">
                        @else
                        <img style="width: 45px; height: 45px; border-radius:50%; object-fit: cover;" src="https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1223671392?b=1&k=20&m=1223671392&s=170667a&w=0&h=J-o-ntQutLd5iHQEWAd-huWt8uBanu4O8V0O1BaG7nU=">
                        @endif
                    </button>
                    @endauth

                    @auth('pemerintah')
                    <button type="button" class="btn btn-white px-0">
                        @php
                        $id = Auth::guard('pemerintah')->user()->id;
                        $foto = DB::table('pemerintah_datas')->select('foto')->where('id_pemerintah', '=', $id)->first();
                        @endphp

                        @if(!empty($foto->foto))
                        <img style="width: 45px; height: 45px; border-radius:50%; object-fit: cover;" src="{{asset('storage/'. $foto->foto)}}">
                        @else
                        <img style="width: 45px; height: 45px; border-radius:50%; object-fit: cover;" src="https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1223671392?b=1&k=20&m=1223671392&s=170667a&w=0&h=J-o-ntQutLd5iHQEWAd-huWt8uBanu4O8V0O1BaG7nU=">
                        @endif
                    </button>
                    @endauth
                    <button type="button" class="btn btn-white text-white" data-bs-toggle="dropdown" aria-expanded="false">
                        @auth('userr')
                        @php
                        $id = Auth::guard('userr')->user()->id;
                        $nama = DB::table('user_datas')->select('nama')->where('id_user', '=', $id)->first();
                        @endphp
                        {{$nama->nama}}
                        @endauth

                        @auth('pemerintah')
                        @php
                        $id = Auth::guard('pemerintah')->user()->id;
                        $nama = DB::table('pemerintah_datas')->select('nama')->where('id_pemerintah', '=', $id)->first();
                        @endphp
                        {{$nama->nama}}
                        @endauth

                        @auth('adm')
                        {{Auth::guard('adm')->user()->email}}
                        @endauth
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            @auth('userr')
                            <a class="dropdown-item" href="{{route('profil')}}">Profil</a>
                            @endauth

                            @auth('pemerintah')
                            <a class="dropdown-item" href="{{route('pemerintah-profil')}}">Profil</a>
                            @endauth
                        </li>
                        <li>
                            @auth('userr')
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                            @endauth

                            @auth('pemerintah')
                            <form action="{{route('pemerintah-logout')}}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                            @endauth

                            @auth('adm')
                            <form action="{{route('adm-logout')}}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                            @endauth
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container x-font-rubik bg-white" style="padding-top:120px; padding-bottom:50px; margin-top:50px;">
        <div class="mx-5">
            @yield('body')
        </div>
    </div>

    @livewireScripts
</body>

</html>