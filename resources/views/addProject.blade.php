@extends('layout.nav')
@section('title','Dodawanie projektu')

@section('content')

    <div class="containter">

        <form style="padding-top:40px; margin:auto; width: 300px;" action="{{route('project.add-submit',['id'=>$id])}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nazwa</label>
                <input type="text" class="form-control"  name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="price_buy" class="form-label">Kwota netto zakupu</label>
                <input type=number class="form-control"  step=0.01 id="price_buy" name="price_buy">
            </div>
            <div class="mb-3">
                <label for="price_sell" class="form-label">Kwota netto sprzedaży</label>
                <input type=number class="form-control"  step=0.01 id="price_sell" name="price_sell">
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Planowana data startu</label>
                <input type="date" name="start_date" data-date-format="DD.MM.YYYY" class="form-control" id="start_date">
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">Planowana data zakończenia</label>
                <input type="date" name="end_date" data-date-format="DD.MM.YYYY" class="form-control" id="end_date">
            </div>
            <button type="submit" class="btn btn-primary">Dodaj projekt</button>
            <a href="" class="btn btn-secondary">Wróć</a>
        </form>
    </div>
@endsection
