@extends('public.layout.layout')

@section('title', 'Pandu | Pusat Bantuan')

@section('body')
<div>
    <h5 class="landing">Ajukan Pertanyaan</h5>

    <div style="margin-top:70px;">
        <label class="form-label help">Email Anda</label>
        <input type="email" class="form-control" placeholder="Masukkan Email Anda">
    </div>

    <div style="margin-top:20px;">
        <label class="form-label help">Pertanyaan</label>
        <textarea class="form-control" placeholder="Ajukan Pertanyaan Anda" rows="3"></textarea>
    </div>

    <div style="margin-top:28px;">
        <button type="submit" class="btn btn-primary">Kirim</button>
    </div>
</div>
<br><br><br><br><br>
@endsection