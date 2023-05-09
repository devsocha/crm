@extends('layout.nav')
@section('title','Edycja informacji o projekcie')

@section('content')

    <div class="containter">
        <form style="padding-top:40px; margin:auto; width: 300px;" action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nazwa</label>
                <input type="text" class="form-control" value="{{$project->name}}" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="price_buy" class="form-label">Kwota netto zakupu</label>
                <input type=number class="form-control"  step=0.01 id="price_buy" value="{{$project->price_buy}}" name="price_buy">
            </div>
            <div class="mb-3">
                <label for="price_sell" class="form-label">Kwota netto sprzedaży</label>
                <input type=number class="form-control"  step=0.01 id="price_sell" value="{{$project->price_sell}}" name="price_sell">
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Planowana data startu</label>
                <input type="date" name="start_date"  value="{{$project->start_date}}" class="form-control" id="start_date">
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">Planowana data zakończenia</label>
                <input type="date" name="end_date" value="{{$project->end_date}}" class="form-control" id="end_date">
            </div>
            <button type="submit" class="btn btn-primary">Zatwierdź zmiany</button>
            <a href="{{route('company.show',['id'=>$project->company_id])}}" class="btn btn-secondary">Wróć</a>
        </form>
    </div>
@endsection
