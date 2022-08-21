@extends("layout.app")
@section("contents")

<form class="card mt-5 container-sm" action="reset_exe" method="post">
    @csrf
    <h5 class="card-header">パスワードの変更</h5>

    <input type="hidden" class="form-control" id="inputmail" name="name" value="dammy">

    <div class="text-danger">{{ $errors->first('name') }}</div>
    <div class="text-danger">{{ $errors->first('password') }}</div>
    <div class="text-danger">{{ $errors->first('email') }}</div>
    <?php echo "<div class='text-danger'>".session('login_error')."</div>"; ?>

    <div class="mb-3 mt-3 row">
        <label for="inputmail" class="col-sm-2 col-form-label">メールアドレス</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputmail" name="email">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">パスワード</label>
        <div class="col-sm-10">
            <input type="password" class="form-control " id="inputPassword" name="password">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">パスワード確認用</label>
        <div class="col-sm-10">
            <input type="password" class="form-control " id="inputPassword" name="password_confirmation">
        </div>
    </div>

    <div class="text-center">
        <input type="submit" class="btn btn-primary center-bloc w-25" value="ログイン">
    </div>
    <a href="login">ログインはこちら</a>
</form>

 @endsection