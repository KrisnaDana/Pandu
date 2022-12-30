@extends('layout.layout-login')

@section('title', 'Pandu | Login')

@section('body')
<div>
    <h5 class="login pt-5 pb-3 text-center">Login</h5>
    <!-- <h6 class="login mt-5 text-center">Login Dengan Media Sosial</h6>

    <div class="pb-5 text-center" style="margin-top:100px;">
        <a href="#"><img class="me-5" style="max-width:80px;" src="{{asset('general/images/twitter.png')}}"></a>
        <a href="#"><img class="me-5" style="max-width:80px;" src="{{asset('general/images/facebook.jpg')}}"></a>
        <a href="#"><img style="max-width:80px;" src="{{asset('general/images/google.png')}}"></a>
    </div> -->

    <h6 class="login mt-5 text-center">Login Dengan Email</h6>

    <div class="mt-5 mx-5">
        <form action="" method="post">
            @csrf
            <label class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholer="Masukkan Email" id="email" name="email" value="{{old('email')}}" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label class="form-label mt-3">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholer="Masukkan Password" id="password" name="password" value="{{old('password')}}" required>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <!-- <a href="#" class="lupa mt-3">Lupa Password?</a> -->

            <div class="text-center" style="margin-top:150px;">
                <button type="submit" class="btn btn-success px-5 mb-3">Login</button>
            </div>
        </form>
        @if ($message = Session::get('error'))
        <div class="alert alert-danger mt-3" role="alert">
            <strong>{{$message}}</strong>
        </div>
        @endif

        @if ($message = Session::get('warning'))
        <div class="alert alert-warning mt-3" role="alert">
            <strong>{{$message}}</strong>
        </div>
        @endif

        <hr>

        <h6 class="login mt-4 text-center">Belum Memiliki Akun?</h6>

        <div class="text-center">
            <label class="form-label mt-3">Daftar Sekarang</label>
        </div>

        <div class="text-center mt-2">
            <a type="button" href="#" class="btn btn-primary px-5 mt-4">Daftar</a>
        </div>
    </div>

    <br><br><br><br><br>
</div>
@endsection