<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\aduan_kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\user_like;
use App\Models\aduan;

use function PHPUnit\Framework\isEmpty;

class Like extends Component
{
    public $like = 0;
    public $id_aduan;

    public function mount($id)
    {
        $this->id_aduan = $id;
    }

    public function render()
    {
        $dukungan = aduan::find($this->id_aduan);
        if (Auth::guard('userr')->check()) {
            $id_user = Auth::guard('userr')->user()->id;
            $cek = user_like::where('id_user', '=', $id_user)
                ->where('id_aduan', '=', $this->id_aduan)
                ->first();
            if ($cek !== null) {
                if ($cek->like_status == 1) {
                    $this->like = 1;
                }
            }

            // dd($cek);
            return view('livewire.like')->with(['like' => $this->like, 'dukungan' => $dukungan, 'id_aduan' => $this->id_aduan]);
        } else {
            return view('livewire.like')->with(['dukungan' => $dukungan, 'id_aduan' => $this->id_aduan]);
        }
    }

    public function like_aduan()
    {
        $id_user = Auth::guard('userr')->user()->id;
        $dukungan = aduan::find($this->id_aduan);

        $status = user_like::where('id_user', '=', $id_user)
            ->where('id_aduan', '=', $this->id_aduan)
            ->first();

        if ($status === null || isEmpty($status) || $status == null) {
            $tambah = array(
                'like_status' => 0,
                'id_user' => $id_user,
                'id_aduan' => $this->id_aduan
            );
            user_like::create($tambah);
            // $this->like = 0;
            $status = user_like::where('id_user', '=', $id_user)
                ->where('id_aduan', '=', $this->id_aduan)
                ->first();
        }


        if ($this->like == 0) {
            $dukungan->dukungan = $dukungan->dukungan + 1;
            $dukungan->save();
            $status->like_status = 1;
            $status->save();
            $this->like = 1;
        } else {
            $dukungan->dukungan = $dukungan->dukungan - 1;
            $dukungan->save();
            $status->like_status = 0;
            $status->save();
            $this->like = 0;
        }
    }
}
