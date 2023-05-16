@extends('layout.nav')
@section('title','Dodawanie firmy')

@section('content')
    <div class="containter">
        <form style="padding-top:40px; margin:auto; width: 300px;" action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="companyName" class="form-label">Nazwa firmy</label>
                <input type="text" class="form-control" value="{{$company->name}}" name="name" id="companyName" disabled>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" value="{{$company->nip}}" class="form-control" id="nip" disabled>
            </div>
            <div class="mb-3">
                <label for="street" class="form-label">Ulica</label>
                <input type="text" name="street" value="{{$company->street}}"class="form-control" id="street" disabled>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Miasto</label>
                <input type="text" name="city" value="{{$company->city}}" class="form-control" id="city" disabled>
            </div>
            <div class="mb-3">
                <label for="zipCode" class="form-label">Kod pocztowy</label>
                <div class="row">
                    <input type="text" name="zipCode" value="{{$company->zip_code}}" class="form-control col m-1" id="zipCode" disabled>
                </div>

            </div>
            <a href="{{route('company.edit',['id'=>$company->id])}}" type="submit" class="btn btn-primary">Edytuj</a>
            <a href="{{route('companies')}}" class="btn btn-secondary">Wróć do firm</a>
        </form>
    </div>
    <div class="row mt-5 p-3">
        <div class="col text-center">
            <div>
                <a class="btn btn-primary" href="{{route('conctact.add',['id'=>$company->id])}}">Dodaj kontakt</a>
            </div>
            @foreach($company->contacts as $contact)
            <div>
                <a href="{{route('contact.show',['id'=>$contact->id])}}" class="form-control mt-2" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto"href="">{{$contact->name}}</a>
            </div>
            @endforeach

        </div>
        <div class="col text-center">
            <div class="row">
                <form method="post" action="{{route('add-file-in-company')}}" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control col" style="width: 100%" type="text" name="name" placeholder="Wpisz nazwe pliku">

                    <input  type="hidden" name="company_id" value="{{$company->id}}">
                    <input class="col mt-2" style="width: 40%" type="file" name="file">
                    <button  type="submit" class="col btn btn-primary" >Dodaj dokument</button>

                </form>
            </div>
            @foreach($company->files as $file)
                <div class=" form-control mt-3">

                    <div class="row">

                            <div class="row" style="text-align: left; width: 100%; margin-left: 1px;margin-right: 1px;">
                                {{$file->name}}
                            </div>
                            <div class="row">
                                <a href="{{route('download-file',['id'=>$file->id])}}" class="btn btn-success" style="width: 20%; margin-left: 30%">
                                    Pobierz
                                </a>
                                <a href="{{route('delete-file-from-company',['id'=>$file->id])}}" class="btn btn-danger" style="width: 20%; margin-left: 10px">
                                    Usuń
                                </a>
                            </div>
                    </div>
                </div>
            @endforeach


        </div>
        <div class="col text-center">
            <div>
                <a class="btn btn-primary" href="{{route('project.add',['id'=>$company->id])}}">Dodaj projekt</a>
            </div>
            @foreach($company->projects as $project)
            <div>
                <a class="form-control mt-2" style="text-decoration:none;width: 80%;margin-left: auto;margin-right: auto"href="{{route('project.show',['id'=>$project->id])}}">{{$project->name}}</a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
