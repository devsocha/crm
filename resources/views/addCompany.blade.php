@extends('layout.nav')
@section('title','Dodawanie firmy')

@section('content')

    <div class="containter">

    <form style="padding-top:40px; margin:auto; width: 300px;" action="{{route('companies.add-submit')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="companyName" class="form-label">Nazwa firmy</label>
            <input type="text" class="form-control" name="name" id="companyName">
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" name="nip" class="form-control" id="nip">
        </div>
        <div class="mb-3">
            <label for="street" class="form-label">Ulica</label>
            <input type="text" name="street" class="form-control" id="street">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Miasto</label>
            <input type="text" name="city" class="form-control" id="city">
        </div>
        <div class="mb-3">
            <label for="zipCode" class="form-label">Kod pocztowy</label>
            <div class="row">
                <input type="text" name="zipCode" class="form-control col m-1" id="zipCode">
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Dodaj firmę</button>
        <a href="{{route('companies')}}" class="btn btn-secondary">Wróć</a>
    </form>
</div>
@endsection
