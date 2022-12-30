<div>
    <div class="row mt-5 mb-5">
        <div class="col">
            <div class="text-start">
                <label class="form-label">Filter</label>
                <select wire:model="filter" class="form-select" style="max-width: 350px;" aria-label="Default select example">
                    <option value="0" selected>Semua Kategori</option>
                    @foreach($kategori as $kategoris)
                    <option value="{{$kategoris->id}}">{{$kategoris->kategori}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col" style="margin-top:40px;">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input wire:model="search" class="form-control" style="max-width: 250px;" type="search" placeholder="Cari">
            </div>
        </div>
    </div>

    @foreach($aduan as $aduans)
    <div class="card mb-3">
        @if($aduans->status == 'Selesai')
        <div class="row">
            <div class="col-9">
                <div class="card-body">
                    @auth('userr')
                    <h4 class="card-title"><a type="button" href="{{route('aduan', $aduans->id)}}" style="text-decoration:none!important; box-shadow:none;">{{$aduans->judul}}</a></h4>
                    @endauth
                    @auth('pemerintah')
                    <h4 class="card-title"><a type="button" href="{{route('pemerintah-aduan', $aduans->id)}}" style="text-decoration:none!important; box-shadow:none;">{{$aduans->judul}}</a></h4>
                    @endauth
                    @auth('adm')
                    <h4 class="card-title"><a type="button" href="{{route('adm-aduan', $aduans->id)}}" style="text-decoration:none!important; box-shadow:none;">{{$aduans->judul}}</a></h4>
                    @endauth
                    <p class="card-text">{{Str::limit($aduans->aduan, 300)}}</p>
                    <div class="d-flex flex-row">
                        <div class="mt-2">
                            @if($aduans->hide_status == 0)
                            <h6 class="card-sub-title">{{$aduans->nama}}</h6>
                            @else
                            <h6 class="card-sub-title">Anonim</h6>
                            @endif

                        </div>
                        <livewire:like :id="$aduans->id" :wire:key="$aduans->id"></livewire:like>
                    </div>
                    <div class="mt-2">
                        <p class="card-text">{{$aduans->waktu}}</p>
                    </div>
                </div>
            </div>
            <div class="col-3 d-flex align-items-center">

                <div class="text-center">
                    <img class="" style="max-width:150px;" src="{{asset('general/images/selesai.jpg')}}">
                </div>
            </div>
        </div>
        @elseif($aduans->status == 'Menunggu')
        <div class="card-body">
            @auth('userr')
            <h4 class="card-title"><a type="button" href="{{route('aduan', $aduans->id)}}" style="text-decoration:none!important; box-shadow:none;">{{$aduans->judul}}</a></h4>
            @endauth
            @auth('pemerintah')
            <h4 class="card-title"><a type="button" href="{{route('pemerintah-aduan', $aduans->id)}}" style="text-decoration:none!important; box-shadow:none;">{{$aduans->judul}}</a></h4>
            @endauth
            @auth('adm')
            <h4 class="card-title"><a type="button" href="{{route('adm-aduan', $aduans->id)}}" style="text-decoration:none!important; box-shadow:none;">{{$aduans->judul}}</a></h4>
            @endauth
            <p class="card-text">{{Str::limit($aduans->aduan, 300)}}</p>
            <div class="d-flex flex-row">
                <div class="mt-2">
                    @if($aduans->hide_status == 0)
                    <h6 class="card-sub-title">{{$aduans->nama}}</h6>
                    @else
                    <h6 class="card-sub-title">Anonim</h6>
                    @endif
                </div>
                <livewire:like :id="$aduans->id" :wire:key="$aduans->id"></livewire:like>
            </div>
            <div class="mt-2">
                <p class="card-text">{{$aduans->waktu}}</p>
            </div>
        </div>
        @endif
    </div>
    @endforeach
    <div>
        {{ $aduan->links() }}
    </div>
</div>