@extends('layout.nav')
@section('title','Kontakty')

@section('content')

    <div class="containter">

    <form style="padding-top:40px; margin:auto; width: 300px;" action="" method="post">
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
            <label for="nip" class="form-label">Ulica</label>
            <input type="text" name="nip" class="form-control" id="nip">
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">Miasto</label>
            <input type="text" name="nip" class="form-control" id="nip">
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">Kod pocztowy</label>
            <div class="row">
                <input type="text" name="nip" class="form-control col m-1" id="nip">
                 -
                <input type="text" name="nip" class="form-control col m-1" id="nip">
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Dodaj firmę</button>
        <a href="" class="btn btn-secondary">Wróć</a>
    </form>
</div>
@endsection
