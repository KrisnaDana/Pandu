<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class publicController extends Controller
{
    public function landing()
    {
        return view('public.landing');
    }

    public function help()
    {
        return view('public.help');
    }

    public function login()
    {
        return view('user.login');
    }

    public function aduan()
    {
        return view('pengaduan.daftar-aduan');
    }

    public function newAduan()
    {
        return view('pengaduan.tambah-aduan');
    }

    public function detailAduan()
    {
        return view('pengaduan.detail-aduan');
    }

    public function detailAduanPemerintah()
    {
        return view('pengaduan.detail-aduan-pemerintah');
    }

    public function registrasiPemerintah()
    {
        return view('pengaduan.registrasi-pemerintah');
    }
}
