@extends("layout.app")
@section("contents")

<main class="container-sm mt-5">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page">人気一覧</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/new">最新一覧</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/today">今日のタグ</a>
        </li>
    </ul>
    @include("layout.box")


</main>
@endsection