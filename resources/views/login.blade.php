@include('layout.style')
@include('layout.script')
<div class="containter">

    <form style="padding-top:40px; margin:auto; width: 300px;" action="{{route('login-submit')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="Inputlogin" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" id="Inputlogin">
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Hasło</label>
            <input type="password" name="password" class="form-control" id="Password">
        </div>
        <button type="submit" class="btn btn-primary">Zaloguj się</button>
        <a href="" class="btn btn-primary">Resetuj hasło</a>
    </form>

</div>
