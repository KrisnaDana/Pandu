<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\userr;
use App\Models\user_data;
use App\Models\user_ktp;
use App\Models\user_status;
use App\Models\aduan;
use App\Models\aduan_file;
use App\Models\balasan;
use App\Models\balasan_file;
use App\Models\aduan_kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function dashboard()
    {
        // $kategori = aduan_kategori::orderBy('kategori')->get();
        // $aduan = DB::table('aduans')
        //     ->select('aduans.*', 'user_datas.nama', 'aduan_statuses.status')
        //     ->join('userrs', 'userrs.id', '=', 'aduans.id_user')
        //     ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
        //     // ->join('user_likes', 'user_likes.id_user', '=', 'userrs.id')
        //     ->join('aduan_statuses', 'aduan_statuses.id', '=', 'aduans.id_aduan_status')
        //     ->orderBy('status', 'asc')->orderBy('dukungan', 'DESC')->paginate(5);
        // Paginator::useBootstrap();

        return view('dashboard');
        // ->with(['aduan' => $aduan, 'kategori' => $kategori]);
    }

    public function aduan_tambah()
    {
        $kategori = aduan_kategori::orderBy('kategori')->get();

        return view('user.aduan-tambah', compact('kategori'));
    }

    public function aduan_tambah_submit(Request $request)
    {

        $userr = Auth::guard('userr')->user()->id;

        if ($request->gambar) {
            $aduan = $request->validate([
                'judul' => 'required|max:60',
                'aduan' => 'required|max:1000',
                'gambar.*' => 'file|max:4096'
            ]);

            // $aduan['gambar'] = $request->file('gambar')->store('gambar', ['disk' => 'public']);


            if ($request->hide == 1) {
                $hide = 1;
            } else {
                $hide = 0;
            }

            $tambah = array(
                'id_aduan_kategori' => $request->kategori,
                'id_aduan_status' => 1,
                'id_user' => $userr,
                'judul' => $request->judul,
                'aduan' => $request->aduan,
                'dukungan' => 0,
                'waktu' => Carbon::now(),
                'hide_status' => $hide
            );
            aduan::create($tambah);
            $tambah_baru = aduan::where('judul', '=', $request->judul)
                ->where('id_user', '=', $userr)->where('waktu', '=', $tambah['waktu'])
                ->get()->first();

            if ($request->hasFile('gambar')) {
                foreach ($request->file('gambar') as $key => $file) {
                    $link = $file->store('gambar', ['disk' => 'public']);
                    $id_aduan = $tambah_baru->id;

                    $insert[$key]['id_aduan'] = $id_aduan;
                    $insert[$key]['link'] = $link;
                }

                aduan_file::insert($insert);
            }

            // $tambah_file = array(
            //     'id_aduan' => $tambah_baru->id,
            //     'link' => $aduan['gambar']
            // );

            // aduan_file::create($tambah_file);

            return redirect()->route('dashboard');
        } else {
            $aduan = $request->validate([
                'judul' => 'required|max:60',
                'aduan' => 'required|max:1000',
            ]);

            if ($request->hide == 1) {
                $hide = 1;
            } else {
                $hide = 0;
            }

            $tambah = array(
                'id_aduan_kategori' => $request->kategori,
                'id_aduan_status' => 1,
                'id_user' => $userr,
                'judul' => $request->judul,
                'aduan' => $request->aduan,
                'dukungan' => 0,
                'waktu' => Carbon::now(),
                'hide_status' => $hide
            );
            aduan::create($tambah);
        }
        return redirect()->route('dashboard');
    }

    public function aduan($id)
    {
        $aduan = aduan::find($id);
        $aduan_file = aduan_file::where('id_aduan', '=', $id)->get();
        $user_data = user_data::where('id_user', '=', $aduan->userr->id)->first();

        // $balasan = balasan::where('id_aduan', '=', $id)->get();
        // $balasan_file = balasan_file::where('id_balasan', '=', $balasan->id)->get();

        $balasan = DB::table('balasans')
            ->select('balasans.id', 'id_pemerintah', 'balasan', 'waktu', 'balasan_files.id as file_id', 'balasan_files.id_balasan', 'link')
            ->join('balasan_files', 'balasan_files.id_balasan', '=', 'balasans.id')
            ->where('balasans.id_aduan', '=', $id)
            ->get();

        return view('aduan', compact('aduan', 'aduan_file', 'user_data'))->with('balasan', $balasan);
    }

    public function profil()
    {
        $id = Auth::guard('userr')->user()->id;
        $profil = user_data::where('id_user', '=', $id)->first();

        return view('profil', compact('profil'))->with('userr', 'userr');
    }

    public function profil_ubah(Request $request)
    {
        $id = Auth::guard('userr')->user()->id;
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:80',
            'telepon' => 'required|numeric|digits_between:10,20',
            'alamat' => 'required|min:3|max:100',
            'foto' => 'file|image|max:4096'
        ]);
        $profil = user_data::where('id_user', '=', $id)->first();
        if ($request->foto) {
            $validatedData['foto'] = $request->file('foto')->store('foto', ['disk' => 'public']);
            $profil->foto = $validatedData['foto'];
        }
        $profil->nama = $request->nama;
        $profil->no_telepon = $request->telepon;
        $profil->alamat = $request->alamat;
        $profil->save();

        return back()->with(['userr' => 'userr', 'success' => 'Berhasil Ganti Profil']);
    }
}
