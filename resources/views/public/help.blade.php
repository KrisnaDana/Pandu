@extends('public.layout.layout')

@section('title', 'Pandu | Pusat Bantuan')

@section('body')
<h5 class="landing" style="margin-bottom:70px;">Pusat Bantuan</h5>

@foreach($help as $helps)
<div class="card mt-4">
    <div class="card-body">
        <div class="text-start mb-3" style="width:500px">
            <h5 class="card-title">{{$helps->pertanyaan}}</h5>
        </div>
        <div class="text-start" style="width:500px; margin-left:570px;">
            <p class="card-text">{{$helps->jawaban}}</p>
        </div>
    </div>
</div>
{{$help->links()}}
@endforeach

@endsection