@extends("layout.app")
@section("contents")

<main class="container-sm mt-5">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="/list">投稿一覧</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page">へー一覧</a>
        </li>
    </ul>
    @include("layout.box")


</main>
@endsection