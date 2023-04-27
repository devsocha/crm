@extends('layout.nav')
@section('title','companies')

@section('content')

        <div class="row m-5">
            <a class="btn btn-primary" href="" >Dodaj firmę</a>
        </div>

        <div class="row m-5">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th style="width:70%" scope="col">Nazwa Firmy</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$company->name}}</td>
                        <td>
                            <a class="btn btn-danger" href="#">Usuń</a>
                            <a class="btn btn-secondary" href="#">Edytuj</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div class="row m-5" >
            {!! $companies->links() !!}
        </div>
@endsection

