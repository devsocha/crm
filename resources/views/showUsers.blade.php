@extends('layout.nav')
@section('title','Dodawanie użytkownika')

@section('content')

    <div class="containter">

        <form style="padding-top:40px; margin:auto; width: 300px;" action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" value="{{$user->login}}" name="login" id="login" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Imie</label>
                <input type="text" class="form-control" value="{{$user->name}}" name="name" id="name" disabled>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Nazwisko</label>
                <input type="text" class="form-control" value="{{$user->surname}}" name="surname" id="surname" disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" value="{{$user->email}}" class="form-control" id="email" disabled>
            </div>
            <a href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-danger">Usuń usera</a>
            <a href="{{route('users')}}" class="btn btn-secondary">Wróć</a>
        </form>
    </div>
@endsection
