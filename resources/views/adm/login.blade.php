@extends('layout.layout-login')

@section('title', 'Pandu | Admin')

@section('body')
<div>
    <h5 class="login pt-5 pb-3 text-center">Login</h5>
    <h6 class="login mt-5 text-center">Login Dengan Email</h6>

    <div class="mt-5 mx-5">
        <form action="{{route('adm-login-auth')}}" method="post">
            @csrf
            <label class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" id="email" name="email" value="{{old('email')}}" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label class="form-label mt-3">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password" id="password" name="password" value="{{old('password')}}" required>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="text-center" style="margin-top:150px;">
                <button type="submit" class="btn btn-success px-5 mb-3">Login</button>
            </div>
        </form>

        @if ($message = Session::get('error'))
        <div class="alert alert-danger mt-3" role="alert">
            <strong>{{$message}}</strong>
        </div>
        @endif
    </div>

    <br><br><br><br><br>
</div>
@endsection