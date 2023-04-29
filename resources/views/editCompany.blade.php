@extends('layout.nav')
@section('title','Dodawanie firmy')

@section('content')

    <div class="containter">
        <form style="padding-top:40px; margin:auto; width: 300px;" action="{{route('companies.edit-submit')}}" method="post">
            @csrf
            <input type="hidden"  value="{{$company->id}}" name="id">

            <div class="mb-3">
                <label for="companyName" class="form-label">Nazwa firmy</label>
                <input type="text" class="form-control" value="{{$company->name}}" name="name" id="companyName">
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" value="{{$company->nip}}" class="form-control" id="nip" >
            </div>
            <div class="mb-3">
                <label for="street" class="form-label">Ulica</label>
                <input type="text" name="street" value="{{$company->street}}" class="form-control" id="street" >
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Miasto</label>
                <input type="text" name="city" value="{{$company->city}}" class="form-control" id="city" >
            </div>
            <div class="mb-3">
                <label for="zipCode" class="form-label">Kod pocztowy</label>
                <div class="row">
                    <input type="text" name="zipCode" value="{{$company->zip_code}}" class="form-control col m-1" id="zipCode" >
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            <a href="{{route('companies')}}" class="btn btn-secondary">Wróć do firm</a>
        </form>
    </div>
@endsection
