@extends('layout.nav')
@section('title','Dodawanie użytkownika')

@section('content')

    <div class="containter">

        <form style="padding-top:40px; margin:auto; width: 300px;" action="{{route('users.add-submit')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" name="login" id="login">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Imie</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Nazwisko</label>
                <input type="text" class="form-control" name="surname" id="surname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Hasło</label>
                <input type="password" name="password" class="form-control" id="position">
            </div>

            <button type="submit" class="btn btn-primary">Dodaj usera</button>
            <a href="{{route('users')}}" class="btn btn-secondary">Wróć</a>
        </form>
    </div>
@endsection
