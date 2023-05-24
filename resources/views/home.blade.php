@extends('layout.nav')
@section('title','Strona główna')

@section('content')
    <a class="form-control mt-2 text-center" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto"> TOP 3 Handlowców miesiąca </a>

    <div class="row text-center mt-5" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto">
        <div class="col-4">
            @if(!isset($sales))
             Brak handlowca<br>
                0 zł
            @endif
        </div>
        <div class="col-4">
            @if(!isset($sales['1']))
                Brak handlowca<br>
                0 zł
            @endif
        </div>
        <div class="col-4">
            @if(!isset($sales['2']))
                Brak handlowca<br>
                0 zł
            @endif
        </div>
    </div>

    <a class="form-control mt-5" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto"> Obrót przez ostatnie 30 dni(netto): </a>
    <a class="form-control mt-2" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto"> Ilość nowych firm 30 dni: </a>
    <a class="form-control mt-2" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto"> Ilość zamkniętych projektów 30 dni: </a>
    <a class="form-control mt-2" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto"> Ilość nowych projektów 30 dni: </a>



@endsection

