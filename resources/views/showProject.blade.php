@extends('layout.nav')
    @section('title','Informacje o projekcie')

@section('content')

    <div class="containter">
        <form style="padding-top:40px; margin:auto; width: 300px;" action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nazwa</label>
                <input type="text" class="form-control" value="{{$project->name}}" name="name" id="name" disabled>
            </div>
            <div class="mb-3">
                <label for="price_buy" class="form-label">Kwota netto zakupu</label>
                <input type=number class="form-control"  step=0.01 id="price_buy" value="{{$project->price_buy}}" name="price_buy" disabled>
            </div>
            <div class="mb-3">
                <label for="price_sell" class="form-label">Kwota netto sprzedaży</label>
                <input type=number class="form-control"  step=0.01 id="price_sell" value="{{$project->price_sell}}" name="price_sell" disabled>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Planowana data startu</label>
                <input type="text" name="start_date"  value="{{$project->start_date}}" class="form-control" id="start_date" disabled>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">Planowana data zakończenia</label>
                <input type="text" name="end_date" value="{{$project->end_date}}" class="form-control" id="end_date" disabled>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" name="end_date" value="{{$project->status}}" class="form-control" id="status" disabled>
            </div>
            <a href="{{route('project.edit',['id'=>$project->id])}}" class="btn btn-primary">Edytuj projekt</a>
            <a href="{{route('company.show',['id'=>$project->company_id])}}" class="btn btn-secondary">Wróć</a>
            <a href="{{route('project.delete',['id'=>$project->id])}}" class="btn btn-danger">Usuń</a>
            <br><br>
            @if($project->status == 'otwarte')
            <a href="{{route('project.edit-status-end',['id'=>$project->id])}}" class="btn btn-success">Zakończ</a>
            <a href="{{route('project.edit-status-stopped',['id'=>$project->id])}}" class="btn btn-secondary">Wstrzymaj</a>
            @else
                <a href="{{route('project.edit-status-open',['id'=>$project->id])}}" class="btn btn-secondary">Otwórz ponownie</a>
            @endif

        </form>
    </div>
@endsection
