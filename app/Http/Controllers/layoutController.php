<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class layoutController extends Controller
{

    public function login_pemerintah()
    {
        return view('pemerintah.login');
    }

    public function login_adm()
    {
        return view('adm.login');
    }

    public function layout()
    {
        return view('public.layout.layout');
    }

    public function layoutLogin()
    {
        return view('layout-login');
    }

    public function layoutRegistrasi()
    {
        return view('layout-registrasi');
    }

    public function daftar_aduan()
    {
        return view('Zrico.view.pengaduan.daftar-aduan');
    }
    public function detail_aduan()
    {
        return view('Zrico.view.pengaduan.detail-aduan');
    }

    public function detail_aduan_pemerintah()
    {
        return view('Zrico.view.pengaduan.detail-aduan-pemerintah');
    }

    public function registrasi_pemerintah()
    {
        return view('Zrico.view.pengaduan.registrasi-pemerintah');
    }

    public function tambah_aduan()
    {
        return view('Zrico.view.pengaduan.tambah-aduan');
    }
}
