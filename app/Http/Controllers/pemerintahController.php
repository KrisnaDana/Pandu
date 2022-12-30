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
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class pemerintahController extends Controller
{
    public function login()
    {
        // if ($userr = Auth::guard('userr')->user()) {
        //     return redirect()->intended('dashboard');
        // }

        // if ($pemerintah = Auth::guard('pemerintah')->user()) {
        //     return redirect()->intended('/pemerintah/dashboard');
        // }

        // if ($adm = Auth::guard('adm')->user()) {
        //     return redirect()->intended('/adm/dashboard');
        // }
        return view('pemerintah.login');
    }

    public function login_auth(Request $request)
    {
        $kondisi = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $auth = Auth::guard('pemerintah');
        if ($auth instanceof \Illuminate\Contracts\Auth\StatefulGuard) {

            if ($auth->attempt($request->only('email', 'password'))) {
                $request->session()->regenerate();
                return redirect()->intended('/pemerintah/dashboard');
            } else {
                return back()->with(['error' => 'Login Gagal']);
            }
        }
    }

    public function dashboard()
    {
        // $kategori = aduan_kategori::orderBy('kategori')->get();
        // $aduan = DB::table('aduans')
        //     ->select('aduans.*', 'user_datas.nama', 'aduan_statuses.status')
        //     ->join('userrs', 'userrs.id', '=', 'aduans.id_user')
        //     ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
        //     ->join('aduan_statuses', 'aduan_statuses.id', '=', 'aduans.id_aduan_status')
        //     ->orderBy('status', 'asc')->orderBy('dukungan', 'DESC')->paginate(5);
        // Paginator::useBootstrap();

        // return view('dashboard')->with(['aduan' => $aduan, 'kategori' => $kategori]);
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        $auth = Auth::guard('pemerintah');
        if ($auth instanceof \Illuminate\Contracts\Auth\StatefulGuard) {
            $auth->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('pemerintah-login');
        }
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

    public function balasan(Request $request, $id)
    {
        $aduan = aduan::find($id);
        $pemerintah = Auth::guard('pemerintah')->user()->id;


        $balasan = $request->validate([
            'balasan' => 'required|max:1000',
            'gambar.*' => 'file|max:4096'
        ]);

        // $balasan['gambar'] = $request->file('gambar')->store('gambar', ['disk' => 'public']);

        $tambah = array(
            'id_pemerintah' => $pemerintah,
            'id_aduan' => $id,
            'balasan' => $request->balasan,
            'waktu' => Carbon::now(),
        );
        balasan::create($tambah);

        $tambah_baru = balasan::where('id_pemerintah', '=', $pemerintah)->where('waktu', '=', $tambah['waktu'])
            ->get()->first();

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $key => $file) {
                $link = $file->store('gambar', ['disk' => 'public']);
                $id_balasan = $tambah_baru->id;

                $insert[$key]['id_balasan'] = $id_balasan;
                $insert[$key]['link'] = $link;
            }

            balasan_file::insert($insert);
        }

        // $tambah_file = array(
        //     'id_balasan' => $tambah_baru->id,
        //     'link' => $balasan['gambar']
        // );

        // balasan_file::create($tambah_file);

        return redirect()->route('pemerintah-aduan', $aduan->id);
    }

    public function selesai($id)
    {
        $aduan = aduan::find($id);

        $aduan->id_aduan_status = 2;
        $aduan->save();

        return back();
    }

    public function profil()
    {
        $id = Auth::guard('pemerintah')->user()->id;
        $profil = pemerintah_data::where('id_pemerintah', '=', $id)->first();
        $jabatan = pemerintah_jabatan::orderBy('jabatan', 'ASC')->get();

        return view('profil', compact('profil', 'jabatan'))->with('pemerintah', 'pemerintah');
    }

    public function profil_ubah(Request $request)
    {
        $id = Auth::guard('pemerintah')->user()->id;
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:80',
            'telepon' => 'required|numeric|digits_between:10,20',
            'alamat' => 'required|min:3|max:100',
            'foto' => 'file|image|max:4096'
        ]);
        $profil = pemerintah_data::where('id_pemerintah', '=', $id)->first();
        if ($request->foto) {
            $validatedData['foto'] = $request->file('foto')->store('foto', ['disk' => 'public']);
            $profil->foto = $validatedData['foto'];
        }
        $profil->nama = $request->nama;
        $profil->id_pemerintah_jabatan = $request->jabatan;
        $profil->no_telepon = $request->telepon;
        $profil->alamat = $request->alamat;
        $profil->save();

        return back()->with(['userr' => 'userr', 'success' => 'Berhasil Ganti Profil']);
    }

    public function validasi()
    {
        $daftar = DB::table('userrs')
            ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
            ->join('user_ktps', 'user_ktps.id_user_data', '=', 'user_datas.id')
            ->join('user_statuses', 'user_statuses.id_user', '=', 'userrs.id')
            ->orderBy('user_statuses.status', 'ASC')
            ->orderBy('userrs.id', 'DESC')
            ->paginate(10);
        Paginator::useBootstrap();

        return view('pemerintah.validasi', compact('daftar'));
    }

    public function validasi_verifikasi($id)
    {
        $akun = user_status::where('id_user', '=', $id)->first();
        $akun->status = "Terverifikasi";
        $akun->save();
        return back()->with('success', 'Berhasil Verifikasi Akun');
    }

    public function validasi_hapus($id)
    {
        $user = userr::find($id);
        $user_data = user_data::where('id_user', '=', $id)->first();
        $user_ktp = user_ktp::where('id_user_data', '=', $user_data->id)->first();
        $user_status = user_status::where('id_user', '=', $id)->first();

        if ($user_status) {
            $user_status->delete();
        }
        if ($user_ktp) {
            $user_ktp->delete();
        }
        if ($user_data) {
            $user_data->delete();
        }
        if ($user) {
            $user->delete();
        }
        return back()->with('success', 'Berhasil Hapus Akun');
    }

    public function akun_detail($id)
    {
        $profil = DB::table('userrs')
            ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
            ->join('user_ktps', 'user_ktps.id_user_data', '=', 'user_datas.id')
            ->join('user_statuses', 'user_statuses.id_user', '=', 'userrs.id')
            ->where('userrs.id', '=', $id)->first();

        return view('pemerintah.akun-detail', compact('profil'));
    }
}
