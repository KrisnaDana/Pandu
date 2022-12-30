<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\userr;
use App\Models\user_data;
use App\Models\user_ktp;
use App\Models\user_status;
use App\Models\pandu_help;
use Illuminate\Pagination\Paginator;

class publicController extends Controller
{
    public function landing()
    {
        return view('public.landing');
    }

    public function login()
    {
        return view('user.login');
    }

    public function login_auth(Request $request)
    {
        $kondisi = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $kondisi['password'] = Hash::make($kondisi['password']);

        // $login = userr::where(['email' => $request->email, 'password' => $kondisi['password']])->first();
        $login = userr::where('email', '=', $request->email)->first();
        $pass = Hash::check($request->password, $login->password);

        if ($login && $pass) {
            $status = user_status::where('id_user', '=', $login->id)->first();

            if ($status->status == "Menunggu") {
                return back()->with(['warning' => 'Menunggu Verifikasi']);
            } else {
                $auth = Auth::guard('userr');
                if ($auth instanceof \Illuminate\Contracts\Auth\StatefulGuard) {

                    if ($auth->attempt($request->only('email', 'password'))) {
                        $request->session()->regenerate();
                        return redirect()->intended('dashboard');
                    } else {
                        return back()->with(['error' => 'Akun Belum Terdaftar Atau Tidak Terverifikasi']);
                    }
                }
            }
        } else {
            return back()->with(['error' => 'Akun Belum Terdaftar Atau Tidak Terverifikasi']);
        }
    }

    public function logout(Request $request)
    {
        $auth = Auth::guard('userr');
        if ($auth instanceof \Illuminate\Contracts\Auth\StatefulGuard) {
            $auth->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('landing');
        }
    }

    public function register()
    {
        return view('user.register');
    }

    public function register_submit(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|numeric|digits_between:10,20',
            'nama' => 'required|min:3|max:80',
            'telepon' => 'required|numeric|digits_between:10,20',
            'tanggal' => 'required',
            'alamat' => 'required|min:3|max:100',
            'email' => 'required|unique:userrs',
            'password' => 'required|min:8|max:20',
            'konfirmasi' => 'required|min:8|max:20',
            'scan' => 'required|image|file|max:4096',
            'foto' => 'required|image|file|max:4096'
        ]);

        if ($request->password == $request->konfirmasi) {
            $userrs = array(
                'email' => $request->email,
                'password' => $request->password
            );
            $userrs['password'] = Hash::make($userrs['password']);
            userr::create($userrs);
            // $emails = $request->email;

            $id_user = userr::where('email', "=", $request->email)->first();

            $user_statuses = array(
                'status' => 'Menunggu',
                'id_user' => $id_user->id
            );

            user_status::create($user_statuses);

            $user_datas = array(
                'nik' => $request->nik,
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal,
                'no_telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'id_user' => $id_user->id
            );

            user_data::create($user_datas);

            $id_user_data = user_data::where('id_user', "=", $id_user->id)->first();

            $validatedData['scan'] = $request->file('scan')->store('/ktp/ktp-scan', ['disk' => 'public']);
            $validatedData['foto'] = $request->file('foto')->store('/ktp/ktp-foto', ['disk' => 'public']);

            $user_ktps = array(
                'id_user_data' => $id_user_data->id,
                'ktp_scan' => $validatedData['scan'],
                'ktp_foto' => $validatedData['foto']
            );

            user_ktp::create($user_ktps);

            return redirect()->route('register')->with(['success' => 'Berhasil Register']);
        } else {
            return redirect()->route('register')->with(['error' => 'Password Dan Konfirmasi Tidak Sesuai']);
        }
    }

    public function help()
    {
        $help = pandu_help::orderBy('id', 'ASC')->paginate(5);
        Paginator::useBootstrap();
        return view('public.help', compact('help'));
    }
}
