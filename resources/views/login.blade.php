@extends("layout.app")
@section("contents")
<?php if(session('new_exe')){echo "<h4 class='text-danger mt-5 container-sm'>".session('new_exe')."</h4>";}; ?>

<form class="card mt-5 container-sm" action="login_exe" method="post">
    @csrf
    <h5 class="card-header">ログイン</h5>

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
            <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-primary center-bloc w-25" value="ログイン">
    </div>
    <a href="reset">パスワードを忘れました</a>
</form>

<form class="card mt-5 container-sm" action="new_account" method="post">
    @csrf
    <h5 class="card-header">新規登録</h5>

    <div class="mb-3 mt-3 row">
        <label for="inputmail" class="col-sm-2 col-form-label" >ユーザーネーム(20文字)</label>
        <div class="col-sm-10">
            <div class="text-danger">{{ $errors->first('name') }}</div>
            <input type="text" class="form-control" id="inputmail" name="name">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputmail" class="col-sm-2 col-form-label">メールアドレス</label>
        <div class="col-sm-10">

            <div class="text-danger">{{ $errors->first('email') }}</div>

            <?php echo "<div class='text-danger'>".session('email_error')."</div>"; ?>
            <div class="text-danger"></div>
            <div class="text-danger"></div>

            <input type="text" class="form-control" id="inputmail" name="email">
        </div>
    </div>

	<div class="mb-3 row">
		<label for="inputPassword" class="col-sm-2 col-form-label">パスワード</label>
		<div class="col-sm-10">
			<div class="text-danger">{{ $errors->first('password') }}</div>
			<input type="password" class="form-control " id="inputPassword" name="password">
		</div>
	</div>

	<div class="mb-3 row">
		<label for="inputPassword" class="col-sm-2 col-form-label">パスワード確認用</label>
		<div class="col-sm-10">
			<input type="password" class="form-control " id="inputPassword" name="password_confirmation">
		</div>
	</div>

	<div class="text-center pb-3">
		<input type="submit" class="btn btn-primary center-bloc w-25" value="新規作成">
	</div>
</form>

@endsection