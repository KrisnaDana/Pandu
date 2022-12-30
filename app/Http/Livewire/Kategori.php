<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\aduan_kategori;
use App\Models\user_like;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;


use function PHPUnit\Framework\isEmpty;

class Kategori extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $filter;
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        // $id = Auth::guard('userr')->user()->id;

        $kategori = aduan_kategori::orderBy('kategori')->get();
        if ($this->filter == '0' && $this->search === null) {
            $aduan = DB::table('aduans')
                ->select('aduans.*', 'user_datas.nama', 'aduan_statuses.status')
                ->join('userrs', 'userrs.id', '=', 'aduans.id_user')
                ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
                ->join('aduan_statuses', 'aduan_statuses.id', '=', 'aduans.id_aduan_status')
                ->orderBy('status', 'asc')->orderBy('dukungan', 'DESC')->paginate(5);
        } else if ($this->filter == '0' && $this->search !== null) {
            $aduan = DB::table('aduans')
                ->select('aduans.*', 'user_datas.nama', 'aduan_statuses.status')
                ->join('userrs', 'userrs.id', '=', 'aduans.id_user')
                ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
                ->join('aduan_statuses', 'aduan_statuses.id', '=', 'aduans.id_aduan_status')
                ->where('aduans.judul', 'like', '%' . $this->search . '%')
                ->orWhere('aduans.aduan', 'like', '%' . $this->search . '%')
                ->orderBy('status', 'asc')->orderBy('dukungan', 'DESC')->paginate(5);
            // dd($aduan);
        } else if ($this->filter === null && $this->search === null) {
            $aduan = DB::table('aduans')
                ->select('aduans.*', 'user_datas.nama', 'aduan_statuses.status')
                ->join('userrs', 'userrs.id', '=', 'aduans.id_user')
                ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
                ->join('aduan_statuses', 'aduan_statuses.id', '=', 'aduans.id_aduan_status')
                ->orderBy('status', 'asc')->orderBy('dukungan', 'DESC')->paginate(5);
        } else if ($this->filter === null && $this->search !== null) {
            $aduan = DB::table('aduans')
                ->select('aduans.*', 'user_datas.nama', 'aduan_statuses.status')
                ->join('userrs', 'userrs.id', '=', 'aduans.id_user')
                ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
                ->join('aduan_statuses', 'aduan_statuses.id', '=', 'aduans.id_aduan_status')
                ->where('aduans.judul', 'like', '%' . $this->search . '%')
                ->orWhere('aduans.aduan', 'like', '%' . $this->search . '%')
                ->orderBy('status', 'asc')->orderBy('dukungan', 'DESC')->paginate(5);
            // dd($aduan);
        } else if ($this->filter !== null && $this->search === null) {
            $aduan = DB::table('aduans')
                ->select('aduans.*', 'user_datas.nama', 'aduan_statuses.status')
                ->join('userrs', 'userrs.id', '=', 'aduans.id_user')
                ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
                ->join('aduan_statuses', 'aduan_statuses.id', '=', 'aduans.id_aduan_status')
                ->where('aduans.id_aduan_kategori', '=', $this->filter)
                ->orderBy('status', 'asc')->orderBy('dukungan', 'DESC')->paginate(5);
        } else {
            $aduan = DB::table('aduans')
                ->select('aduans.*', 'user_datas.nama', 'aduan_statuses.status')
                ->join('userrs', 'userrs.id', '=', 'aduans.id_user')
                ->join('user_datas', 'user_datas.id_user', '=', 'userrs.id')
                ->join('aduan_statuses', 'aduan_statuses.id', '=', 'aduans.id_aduan_status')
                ->where('aduans.id_aduan_kategori', '=', $this->filter)
                ->where(function ($query) {
                    $query->where('aduans.judul', 'like', '%' . $this->search . '%')
                        ->orWhere('aduans.aduan', 'like', '%' . $this->search . '%');
                })
                ->orderBy('status', 'asc')->orderBy('dukungan', 'DESC')->paginate(5);
        }

        return view('livewire.kategori')->with(['aduan' => $aduan, 'kategori' => $kategori]);
    }
}
