@extends('layout.nav')
@section('title','Użytkownicy')

@section('content')

    <div class="row m-5">
        <form action="{{route('users.find')}}" method="post">
            @csrf
            <input class="col-9 form-label" name="text" type="text" placeholder="Wpisz użytkownika">
            <input class="col-2 btn btn-primary m-2 p-2" type="submit" value="Wyszukaj">
        </form>
    </div>

    <div class="row m-5">
        <a class="btn btn-primary" href="{{route('users.add')}}" >Dodaj użytkownika</a>
    </div>

    <div class="row m-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Użytkownik</th>
                <th scope="col">Rola</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row" > {{$loop->iteration}}</th>
                    <td style="width: 30%">{{$user->name}} {{$user->surname}}</td>

                    <td style="width: 17%">
                        @if($user->role == 1)Admin @else User @endif
                    </td>
                    <td style="width: 50%">
                        <a class="btn btn-success" href="">Przejdź do usera</a>
                        @if($user->role == 1)<a class="btn btn-success" href="{{route('users.user',['id'=>$user->id])}}">Odbierz admina</a>@else <a class="btn btn-success" href="{{route('users.admin',['id'=>$user->id])}}">Nadaj admina</a>@endif
                    </td>
                </tr>
            @endforeach
            {!! $users->links() !!}

            </tbody>
        </table>

    </div>
    <div class="row m-5" >

    </div>
@endsection

