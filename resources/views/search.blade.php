@extends("layout.app")
@section("contents")
<form action="search_exe" method="POST">
    @csrf
    <div class="container-sm d-flex justify-content-center mt-5">
        <div class="input-group mb-3 ">
            <input type="text" class="form-control" placeholder="どんなタグのトリビアをお探しかね" aria-label="Recipient's username" aria-describedby="button-addon2" name="tag">
            <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2">タグ検索</button>
        </div>
    </div>
</form>
@if(!isset($datas))
    <div class="container-sm d-flex justify-content-center mt-5">
    <h2>見たいタグを検索を探そうじゃないか！</h2>
    </div>
@elseif($datas == 'noData')
<div class="container-sm d-flex justify-content-center mt-5">
    <h2>おっと！そのタグはトリビアが存在しないみたいだ！</br></br><span class="container-sm d-flex justify-content-center mt-5"><a href="post">投稿してくれるって？</a></span></h2>
    
</div>

@else
    @include('layout.box')
@endif

@endsection