@extends("layout.app")
@section("contents")

<form class="card mt-5 container-sm" action="post_exe" method="post">
    @csrf
    <h5 class="card-header">新規雑学投稿</h5>

    <?php echo "<div class='text-danger'>".session('login_error')."</div>"; ?>

    <div class="mb-3 mt-3 row">
        <label class="col-sm-2 col-form-label">タイトル</label>
        <div class="col-sm-10">
            <div class="text-danger">{{ $errors->first('title') }}</div>
            <input type="text" class="form-control" id="inputmail" name="title" placeholder="タイトルは大事らしいですぜ">
        </div>
    </div>

    <div class="mb-3 mt-3 row">
        <label class="col-sm-2 col-form-label">トリビア(100文字)</label>
        <div class="col-sm-10">
            <div class="text-danger">{{ $errors->first('trivia') }}</div>
            <textarea class="form-control" id="inputmail" name="trivia" placeholder="素晴らしいトリビアをお持ちで？"></textarea>
        </div>
    </div>

    <div class="mb-3 mt-3 row">
        <label  class="col-sm-2 col-form-label">タグ</label>
        <div class="col-sm-10">
            <div class="text-danger">{{ $errors->first('tag') }}</div>
            <input type="text" class="form-control" id="inputmail" name="tag" placeholder="素晴らしいタグセンス期待してます">
        </div>
    </div>

    <div class="text-center">
        <input type="submit" class="btn btn-primary center-bloc w-25 mb-3" value="新規投稿">
    </div>
</form>
</main>
@endsection