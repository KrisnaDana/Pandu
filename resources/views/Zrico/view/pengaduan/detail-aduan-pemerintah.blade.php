@extends('Zrico.view.pengaduan.layout-pengaduan')

@section('title','Pandu | Detail Aduan')

@section('body')
<div class="container-tambah-aduan">
    <div class="mb-5">
        <h1>Detail Pengaduan</h1>
    </div>
    <div>
        <div class="mb-4 new-text">
            <label for="deskripsi" class="form-label new-text">Deskripsi Pengaduan</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror bg-transparent" id="deskripsi" name="deskripsi" rows="5">Kelanjutan Proyek Perbaikan Jalan Turi <br>Terkait dengan perbaikan jalan yang terjadi pada Jalan Turi di depan Gang XVI yang dihentikan karena pandemi COVID-19 pada pertengahan tahun 2020, kelanjutannya saat ini pada tahun 2021 bagaimana ya? Mengingat bahwa jalan tersebut merupakan jalan utama bagi warga setempat yang berada di sekitar Jalan Turi. Mohon perhatiannya bagi pemerintah daerah Denpasar untuk segera menyelesaikan perbaikan Jalan tersebut.</textarea>
        </div>
        <div class="div-file">
            <div class="btn-group">
                <button type="button" class="bt-unduh-dok btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Unduh Dokumen
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="bt-unduh-gambar btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Unduh Gambar
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="bt-unduh-suara btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Unduh Suara
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="bt-unduh-video btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Unduh Video
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div>
        <label for="deskripsi" class="form-label new-text">Berikan Balasan</label>
        <div class="mb-4 form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Masukkan Balasan</label>
        </div>
        <div class="div-file">
            <div class="btn-group">
                <button type="button" class="bt-unduh-dok btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Upload Dokumen
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="bt-unduh-gambar btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Upload Gambar
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="bt-unduh-suara btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Upload Suara
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="bt-unduh-video btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Upload Video
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <a type="button" class="btn btn-danger" href="#">Kembali</a>
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</div>
@endsection