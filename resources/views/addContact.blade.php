@extends('layout.nav')
@section('title','Dodawanie kontaktu do firmy')

@section('content')

    <div class="containter">

        <form style="padding-top:40px; margin:auto; width: 300px;" action="{{route('contact.add-submit')}}" method="post">
            @csrf
            <input type="hidden" name="companyId" value="{{$id}}">
            <div class="mb-3">
                <label for="companyName" class="form-label">Imie Nazwisko</label>
                <input type="text" class="form-control" name="name" id="companyName">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Numer Telefonu</label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Stanowisko</label>
                <input type="text" name="position" class="form-control" id="position">
            </div>

            <button type="submit" class="btn btn-primary">Dodaj kontakt</button>
            <a href="{{route('company.show',['id'=>$id])}}" class="btn btn-secondary">Wróć</a>
        </form>
    </div>
@endsection
