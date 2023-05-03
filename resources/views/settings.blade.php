@extends('layout.nav')
@section('title','Ustawienia usera')

@section('content')

    <div class="containter">

        <form style="padding-top:40px; margin:auto; width: 300px;" action="{{route('settings.update')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Login </label>
                <input type="text" class="form-control" value="{{$user->login}}" name="login" id="login">
            </div>
            <div class="mb-3">
                <label for="Name" class="form-label">Imię </label>
                <input type="text" class="form-control" value="{{$user->name}}" name="name" id="Name">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Nazwisko</label>
                <input type="text" name="surname" value="{{$user->surname}}" class="form-control" id="surname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" value="{{$user->email}}" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Hasło</label>
                <input type="password" name="password" class="form-control" id="pass">
            </div>
            <div class="mb-3">
                <label for="reTypePassword" class="form-label">Powtórz hasło</label>
                <div class="row">
                    <input type="password" name="reTypePassword" class="form-control col m-1" id="reTypePassword">
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
    </div>
@endsection
