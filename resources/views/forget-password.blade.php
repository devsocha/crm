@include('layout.style')
@include('layout.script')
<div class="containter">

    <form style="padding-top:40px; margin:auto; width: 300px;" action="{{route('password.restart-submit')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <button type="submit" class="btn btn-primary">Resetuj hasło</button>
        <a href="{{route('login')}}" class="btn btn-secondary">Wróć</a>
    </form>

</div>
