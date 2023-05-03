<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - DevSocha.pl</title>
    @include('layout.style')
</head>
<body style="font-family: 'Rubik', sans-serif; ">
@include('layout.script')
<div class="row" style="width: 100%;height: 100%;position:absolute;">
    <div class="col-3" style="  background-color: dodgerblue;">
        <div class="row">
        </div>
        <div class="row m-3" >
            <a href="{{route('home')}}"class="btn btn-primary" >
                Strona główna
            </a>
        </div>
        <div class="row m-3" >
            <a href="{{route('companies')}}"class="btn btn-primary" >
                Firmy
            </a>
        </div>
        <div class="row m-3" >
            <a href="{{route('contacts')}}"class="btn btn-primary" >
                Wszystkie kontakty
            </a>
        </div>
        <div class="row m-3" >
            <a href="{{route('settings')}}"class="btn btn-primary" >
                Ustawienia
            </a>
        </div>
        <div class="row m-3" >
            <a href="#" class="btn btn-success" >
                Raporty
            </a>
        </div>
        <div class="row m-3" >
            <a href="#" class="btn btn-success" >
                Użytkownicy
            </a>
        </div>
        <div class="row m-3" >
            <a href="{{route('logout')}}" class="btn btn-danger" >
                Wyloguj
            </a>
        </div>
    </div>
    <div class="col-9">
        @yield('content')
    </div>
</div>
</body>
</html>
