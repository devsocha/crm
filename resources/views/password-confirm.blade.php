@include('layout.style')
@include('layout.script')
<div class="containter">

    <form style="padding-top:40px; margin:auto; width: 300px;" action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="pass" class="form-label">Wpisz hasło</label>
            <input type="text" class="form-control" name="password" id="pass">
        </div>
        <div class="mb-3">
            <label for="pass2" class="form-label">Wpisz ponownie hasło</label>
            <input type="text" class="form-control" name="reTypePassword" id="pass2">
        </div>
        <button type="submit" class="btn btn-primary">Zatwierdź</button>
    </form>
</div>
