@extends('layout.nav')
@section('title','Informacje o kontakcie')

@section('content')

    <div class="containter">

        <form style="padding-top:40px; margin:auto; width: 300px;">
            @csrf

            <div class="mb-3">
                <label for="companyName" class="form-label">Imie Nazwisko</label>
                <input type="text" value="{{$contact->name}}" class="form-control" name="name" id="companyName"disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" value="{{$contact->email}}" name="email" class="form-control" id="email"disabled>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Numer Telefonu</label>
                <input type="text" value="{{$contact->phone}}" name="phone" class="form-control" id="phone"disabled>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Stanowisko</label>
                <input type="text" value="{{$contact->position}}" name="position" class="form-control" id="position" disabled>
            </div>

            <a href="{{route('contact.edit',['id'=>$contact->id])}}" class="btn btn-primary">Edytuj kontakt</a>
            <a href="{{route('company.show',['id'=>$contact->company_id])}}" class="btn btn-secondary">Wróć</a>
            <a href="{{route('contact.delete',['id'=>$contact->id])}}" class="btn btn-danger" >Usuń</a>
        </form>
    </div>
@endsection
