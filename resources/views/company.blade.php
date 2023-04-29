@extends('layout.nav')
@section('title','Firmy')

@section('content')

        <div class="row m-5">
            <a class="btn btn-primary" href="{{route('companies.add')}}" >Dodaj firmę</a>
        </div>

        <div class="row m-5">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th style="width:60%" scope="col">Nazwa Firmy</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$company->name}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('company.show',['id'=>$company->id])}}">Podgląd</a>
                            <a class="btn btn-secondary" href="{{route('company.edit',['id'=>$company->id])}}">Edytuj</a>
                            <a class="btn btn-danger" href="{{route('company.delete',['id'=>$company->id])}}">Usuń</a>

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

