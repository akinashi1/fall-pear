@extends("layout.app")
@section("contents")

<form class="card mt-5 container-sm" action="{{ route('edit_exe') }}" method="POST">
    @csrf
    
    <h5 class="card-header">投稿編集</h5>

    <div class="mb-3 mt-3 row">
        <label class="col-sm-2 col-form-label">タイトル</label>
        
        
        <div class="col-sm-10">
            <div class="text-danger">{{ $errors->first('title') }}</div>
            <input type="text" class="form-control" id="inputmail" name="title" value="{{ $datas -> title }}">
        </div>
    </div>

    <div class="mb-3 mt-3 row">
        <label class="col-sm-2 col-form-label">トリビア(36文字)</label>
        
        <div class="col-sm-10">
            <div class="text-danger">{{ $errors->first('trivia') }}</div>
            <textarea class="form-control" id="inputmail" name="trivia">{{ $datas -> trivia }}</textarea>
        </div>
    </div>

    <div class="mb-3 mt-3 row">
        <label  class="col-sm-2 col-form-label">タグ</label>
        <div class="col-sm-10">
            <div class="text-danger">{{ $errors->first('tag') }}</div>
            <input type="text" class="form-control" id="inputmail" name="tag" value="{{ $datas -> tag -> tag }}">
        </div>
    </div>



    <input type="hidden"  name="id" value="{{ $datas -> id }}">
    <input type="hidden"  name="tag_id" value="{{ $datas -> tag_id }}">
    


    <div class="text-center">
        <input type="submit" class="btn btn-primary center-bloc w-25 mb-3" value="編集">
    </div>
</form>
</main>
@endsection