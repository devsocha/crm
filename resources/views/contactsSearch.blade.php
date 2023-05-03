@extends('layout.nav')
@section('title','Kontakty')

@section('content')

    <div class="row m-5">
        <form action="{{route('contactsBySearch')}}" method="post">
            @csrf
            <input class="col-9 form-label" name="text" type="text" placeholder="Wpisz firmę">
            <input class="col-2 btn btn-primary m-2 p-2" type="submit" value="Wyszukaj">
        </form>
    </div>

    <div class="row m-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th style="width:30%" scope="col">Imie Nazwisko</th>
                <th style="width:30%" scope="col">Email</th>
                <th style="width:20%" scope="col">Numer telefonu</th>
                <th style="width:20%"scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>

            @foreach($companies as $company)

                @foreach($company->contacts as $contact)
                <tr>
                    <th scope="row"></th>
                    <td>{{$contact->name}}</td>
                    <td>
                        {{$contact->email}}
                    </td>
                    <td>
                        {{$contact->phone}}
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{route('company.show',['id'=>$company->id])}}">Przejdź do firmy</a>
                    </td>
                </tr>
                @endforeach
            @endforeach

            </tbody>
        </table>

    </div>
    <div class="row m-5" >

    </div>
@endsection
