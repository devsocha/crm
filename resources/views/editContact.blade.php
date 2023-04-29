@extends('layout.nav')
@section('title','Dodawanie kontaktu do firmy')

@section('content')

    <div class="containter">

        <form style="padding-top:40px; margin:auto; width: 300px;" action="{{route('contact.edit-submit',['id'=>$contact->id])}}" method="post">
            @csrf

            <div class="mb-3">
                <label for="companyName" class="form-label">Imie Nazwisko</label>
                <input type="text" value="{{$contact->name}}" class="form-control" name="name" id="companyName">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" value="{{$contact->email}}" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Numer Telefonu</label>
                <input type="text" value="{{$contact->phone}}" name="phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Stanowisko</label>
                <input type="text" value="{{$contact->position}}" name="position" class="form-control" id="position" >
            </div>

            <input type="submit" value="Zapisz zmiany" class="btn btn-primary">
            <a href="{{route('company.show',['id'=>$contact->company_id])}}" class="btn btn-secondary">Wróć</a>
        </form>
    </div>
@endsection
