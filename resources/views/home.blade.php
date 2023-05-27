@extends('layout.nav')
@section('title','Strona główna')

@section('content')
    <a class="form-control mt-2 text-center" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto"> TOP 3 Handlowców w ostatnie 30dni (marża netto) </a>

    <div class="row text-center mt-5" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto">
        <div class="col-4">
            @if(!isset($sales[0]))
             Brak handlowca<br>
                0 zł
            @else
            {{$sales[0]->users->name}} {{$sales[0]->users->surname}}<br>
                {{$sales[0]->kwota}} zł
            @endif
        </div>
        <div class="col-4">
            @if(!isset($sales['1']))
                Brak handlowca<br>
                0 zł
            @else
                {{$sales[1]->users->name}} {{$sales[1]->users->surname}}<br>
                {{$sales[1]->kwota}} zł
            @endif
        </div>
        <div class="col-4">
            @if(!isset($sales['2']))
                Brak handlowca<br>
                0 zł
            @else
                {{$sales[2]->users->name}} {{$sales[2]->users->surname}}<br>
                {{$sales[2]->kwota}} zł
            @endif
        </div>
    </div>

    <a class="form-control mt-5" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto"> Obrót przez ostatnie 30 dni(netto): </a>
    <a class="form-control mt-2" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto"> Ilość nowych firm 30 dni: </a>
    <a class="form-control mt-2" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto"> Ilość zamkniętych projektów 30 dni: </a>
    <a class="form-control mt-2" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto"> Ilość nowych projektów 30 dni: </a>



@endsection

