@extends('public.layout.layout')

@section('title','Pandu')

@section('body')
<div>
    <div class="row">
        <div class="col" style="max-width:480px;">
            <h5 class="landing">Pengaduan dan Pelaporan Terpadu</h5>
            <p class="landing">PANDU bertujuan untuk memudahkan pemerintah setempat untuk mendapatkan informasi yang tepat guna, langsung dari para penduduk melalui internet.</p>

        </div>
        <div class="col">
            <img style="margin-left:200px; margin-top:40px; max-width:400px;" src="{{asset('general/images/landing_image_1.jpg')}}">
        </div>
    </div>
    <a href="{{route('help')}}" type="button" class="btn btn-primary text-light" style="margin-top:100px;">Pusat Bantuan <span class="material-icons text-light ps-1" style="font-size:28px; vertical-align: middle;"=>help_outline</span></a>
</div>
<br><br><br><br><br>
@endsection