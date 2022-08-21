@extends("layout.app")
@section("contents")
<?php $box_status = 1;?>

<?php if(session("id") == 0):?>
    {{-- 管理者ユーザ --}}

    <div class="container-fluid container-sm mt-4">
        <h4>管理者画面</h4>
    </div>

    <main class="container-sm mt-5">

        
        @include("layout.box")
    </main>
<?php elseif(session("id") != 0):?>
    {{-- 一般ユーザ --}}

    <div class="container-fluid container-sm mt-4">
        <h4><?= session("name")?>さんの投稿一覧</h4>
    </div>

    <main class="container-sm mt-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page">投稿一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/likes">へー一覧</a>
            </li>
        </ul>
        @include("layout.box")
    </main>
<?php endif; ?>



@endsection