<div>
    <div class="row">
        <div class="col-6">
            @auth('userr')
            <div class="ms-4 mt-2">
                @if($like == 0)
                <span type="button" wire:click="like_aduan" class="material-icons">
                    favorite_border
                </span>
                @else
                <span type="button" wire:click="like_aduan" class="material-icons text-danger">
                    favorite
                </span>
                @endif
            </div>
            @endauth
            @auth('pemerintah')
            <div class="ms-4 mt-2">
                <span class="material-icons">
                    favorite_border
                </span>
            </div>
            @endauth
            @auth('adm')
            <div class="ms-4 mt-2">
                <span class="material-icons">
                    favorite_border
                </span>
            </div>
            @endauth
        </div>
        <div class="col">
            <div class="mt-2">
                <h6 class="card-sub-title">{{$dukungan->dukungan}}</h6>
            </div>
        </div>
    </div>
</div>