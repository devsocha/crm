@extends('layout.nav')
@section('title','contacts')

@section('content')

    <div class="row m-5">
        <input class="col-9 form-label" type="text" placeholder="Wpisz firmę">
        <input class="col-2 btn btn-primary m-2 p-2" type="submit" value="Wyszukaj">
    </div>

    <div class="row m-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th style="width:35%" scope="col">Imie Nazwisko</th>
                <th style="width:35%" scope="col">Email</th>
                <th style="width:20%" scope="col">Numer telefonu</th>
                <th style="width:10%"scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>

                    </td>
                    <td>
                    </td>
                    <td>
                        <a class="btn btn-success" href="#">Przejdź do firmy</a>
                    </td>
                </tr>


            </tbody>
        </table>

    </div>
    <div class="row m-5" >

    </div>
@endsection
