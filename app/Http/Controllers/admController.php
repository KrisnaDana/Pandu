<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\userr;
use App\Models\user_data;
use App\Models\user_ktp;
use App\Models\user_status;
use App\Models\pemerintah;
use App\Models\pemerintah_data;
use App\Models\pemerintah_jabatan;
use App\Models\aduan;
use App\Models\aduan_file;
use App\Models\balasan;
use App\Models\balasan_file;
use App\Models\aduan_kategori;
use App\Models\pandu_help;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class admController extends Controller
{
    public function login()
    {
        return view('adm.login');
    }

    public function login_auth(Request $request)
    {
        $kondisi = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $auth = Auth::guard('adm');
        if ($auth instanceof \Illuminate\Contracts\Auth\StatefulGuard) {
            if ($auth->attempt($request->only('email', 'password'))) {
                $request->session()->regenerate();
                return redirect()->intended('/adm/dashboard');
            } else {
                return back()->with(['error' => 'Login Gagal']);
            }
        }
    }

    public function dashboard()
    {
        // $kategori = aduan_kategori::orderBy('kategori')->get();
        // $aduan = DB::table('aduans')
        //     ->select('aduans.*', 'user_datas.nama', 'aduan_statuses.status', 'user_likes.like_status')
        //     ->join('userrs', 'userrs.id', '=', 'aduans.id_user')
        //     ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
        //     ->join('user_likes', 'user_likes.id_user', '=', 'userrs.id')
        //     ->join('aduan_statuses', 'aduan_statuses.id', '=', 'aduans.id_aduan_status')
        //     ->orderBy('status', 'asc')->orderBy('dukungan', 'DESC')->paginate(5);
        // Paginator::useBootstrap();
        return view('dashboard');

        // return view('dashboard')->with(['aduan' => $aduan, 'kategori' => $kategori]);
    }

    public function aduan($id)
    {
        $aduan = aduan::find($id);
        $aduan_file = aduan_file::where('id_aduan', '=', $id)->get();
        $user_data = user_data::where('id_user', '=', $aduan->userr->id)->first();
        $list_balasan = balasan::where('id_aduan', '=', $id)->get();
        // $balasan = balasan::where('id_aduan', '=', $id)->get();
        // $balasan_file = balasan_file::where('id_balasan', '=', $balasan->id)->get();

        $balasan = DB::table('balasans')
            ->select('balasans.id', 'id_pemerintah', 'balasan', 'waktu', 'balasan_files.id as file_id', 'balasan_files.id_balasan', 'link')
            ->join('balasan_files', 'balasan_files.id_balasan', '=', 'balasans.id')
            ->where('balasans.id_aduan', '=', $id)
            ->get();

        return view('aduan', compact('aduan', 'aduan_file', 'user_data'))->with('balasan', $balasan);
    }

    public function logout(Request $request)
    {
        $auth = Auth::guard('adm');
        if ($auth instanceof \Illuminate\Contracts\Auth\StatefulGuard) {
            $auth->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('adm-login');
        }
    }

    public function register_pemerintah()
    {
        $jabatan = pemerintah_jabatan::all();

        return view('adm.register-pemerintah', compact('jabatan'));
    }

    public function register_pemerintah_submit(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|numeric|digits_between:10,20',
            'nip' => 'required|numeric|digits_between:10,20',
            'nama' => 'required|min:3|max:80',
            'telepon' => 'required|numeric|digits_between:10,20',
            'tanggal' => 'required',
            'alamat' => 'required|min:3|max:100',
            'email' => 'required|unique:userrs',
            'password' => 'required|min:8|max:20',
            'konfirmasi' => 'required|min:8|max:20',
        ]);

        if ($request->password == $request->konfirmasi) {
            $pemerintah = array(
                'email' => $request->email,
                'password' => $request->password
            );
            $pemerintah['password'] = Hash::make($pemerintah['password']);
            pemerintah::create($pemerintah);

            $id_pemerintah = pemerintah::where('email', "=", $request->email)->first();

            $pemerintah_data = array(
                'nik' => $request->nik,
                'nip' => $request->nip,
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal,
                'no_telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'id_pemerintah_jabatan' => $request->jabatan,
                'id_pemerintah' => $id_pemerintah->id
            );

            pemerintah_data::create($pemerintah_data);

            return back()->with('success', 'Akun Pemerintah Berhasil Dibuat');
        } else {
            return back()->with('error', 'Password dan Konfirmasi Tidak Sesuai');
        }
    }

    public function kelola_pemerintah()
    {
        $daftar = DB::table('pemerintahs')
            ->join('pemerintah_datas', 'pemerintah_datas.id_pemerintah', '=', 'pemerintahs.id')
            ->join('pemerintah_jabatans', 'pemerintah_jabatans.id', '=', 'pemerintah_datas.id_pemerintah_jabatan')
            ->orderBy('pemerintahs.id', 'DESC')
            ->paginate(10);
        Paginator::useBootstrap();

        return view('adm.kelola-pemerintah', compact('daftar'))->with('kelola', 'kelola');
    }

    public function kelola_pemerintah_detail($id)
    {
        $profil = DB::table('pemerintah_datas')
            ->join('pemerintahs', 'pemerintahs.id', '=', 'pemerintah_datas.id_pemerintah')
            ->join('pemerintah_jabatans', 'pemerintah_jabatans.id', '=', 'pemerintah_datas.id_pemerintah_jabatan')
            ->where('pemerintahs.id', '=', $id)
            ->first();

        return view('adm.kelola-pemerintah', compact('profil'))->with('detail', 'detail');
    }

    public function daftar_pengguna()
    {
        $daftar = DB::table('userrs')
            ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
            ->join('user_ktps', 'user_ktps.id_user_data', '=', 'user_datas.id')
            ->join('user_statuses', 'user_statuses.id_user', '=', 'userrs.id')
            ->orderBy('userrs.id', 'DESC')
            ->where('user_statuses.status', '=', 'Terverifikasi')
            ->paginate(10);
        Paginator::useBootstrap();

        return view('adm.daftar-pengguna', compact('daftar'))->with('info', 'info');
    }

    public function daftar_pengguna_detail($id)
    {
        $profil = DB::table('userrs')
            ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
            ->join('user_ktps', 'user_ktps.id_user_data', '=', 'user_datas.id')
            ->join('user_statuses', 'user_statuses.id_user', '=', 'userrs.id')
            ->where('userrs.id', '=', $id)->first();

        return view('adm.daftar-pengguna', compact('profil'))->with('detail', 'detail');
    }

    public function kelola_bantuan()
    {
        $daftar = pandu_help::orderBy('id', 'ASC')->paginate(10);
        Paginator::useBootstrap();

        return view('adm.kelola-bantuan', compact('daftar'))->with('info', 'info');
    }

    public function kelola_bantuan_detail($id)
    {
        $help = pandu_help::find($id);

        return view('adm.kelola-bantuan', compact('help'))->with('detail', 'detail');
    }

    public function kelola_bantuan_tambah()
    {
        return view('adm.kelola-bantuan')->with('tambah', 'tambah'); //$tambah = 'tambah';
    }

    public function kelola_bantuan_tambah_submit(Request $request)
    {
        $validatedData = $request->validate([
            'pertanyaan' => 'required|max:255',
            'jawaban' => 'required|max:1000'
        ]);

        $help = array(
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban
        );

        pandu_help::create($help);

        return back()->with('success', 'Berhasil Membuat Bantuan');
    }

    public function kelola_bantuan_ubah($id)
    {
        $help = pandu_help::find($id);

        return view('adm.kelola-bantuan', compact('help'))->with('ubah', 'ubah');
    }

    public function kelola_bantuan_ubah_submit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pertanyaan' => 'required|max:255',
            'jawaban' => 'required|max:1000'
        ]);

        $help = pandu_help::find($id);

        $help->pertanyaan = $request->pertanyaan;
        $help->jawaban = $request->jawaban;

        $help->save();

        return back()->with('success', 'Berhasil Mengubah Bantuan');
    }

    public function kelola_bantuan_hapus($id)
    {
        $help = pandu_help::find($id);
        $help->delete();

        return back()->with('success', 'Berhasil Menghapus Bantuan');
    }
}
