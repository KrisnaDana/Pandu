<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('/css/style.css')}}">
    <title>@yield('title')</title>
</head>

<body>
    <div class="x-font-rubik" style="display:block;">
        <nav class="navbar fixed-top navbar-light x-bg-dark-blue">
            <div class="container-fluid">
                <div>
                    <a class="ms-1 me-2" href="{{route('landing')}}"><img src="{{asset('general/images/Logo.jpg')}}" style="max-height:50px;"></a>
                    <a class="navbar-brand text-light ms-4" href="#"><u>Lihat Pengaduan</u></a>
                </div>
                <div>
                    <a class="navbar-brand text-light me-5" href="{{route('login')}}"><u>Masuk</u></a>
                    <a class="navbar-brand text-light" href="#"><u>Daftar</u></a>
                </div>
            </div>
        </nav>
    </div>
    <div class="container x-font-rubik" style="margin-top:120px;">
        @yield('body')
    </div>


</body>

</html>