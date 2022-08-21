@extends("layout.app")
@section("contents")
<div class="d-flex justify-content-center mt-5">
    <h2>今日のタグ「 <?= isset($tag['tag']) ? $tag['tag'] : ''; ?> 」</h2>
</div>
<main class="container-sm mt-5">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="/popular">人気一覧</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/new">最新一覧</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page">今日のタグ</a>
        </li>
    </ul>
    @include("layout.box")
</main>
    @endsection
