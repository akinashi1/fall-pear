<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>雑学産業</title>

    </head>
    <body style="display:flex; flex-direction:column; min-height:100vh;">

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid container-sm">
                <a class="navbar-brand" href="popular">雑学産業</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php if(!session()->has('id')):?>
                {{-- ゲストユーザ --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <div class="d-flex">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="nav-item">
                                <a class="nav-link" href="login">投稿</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login">マイページ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="search">検索</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login">ログイン</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <?php elseif(session("id") == 0):?>
                {{-- 管理者ユーザ --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <div class="d-flex">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="list">管理画面</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="search">検索</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout">ログアウト</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php elseif(session("id") != 0):?>
                {{-- 一般ユーザ --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <div class="d-flex">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="list"><?= session("name");?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="post">投稿</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="search">検索</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout">ログアウト</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
                </div>
            </nav>
        </header>

        @yield('contents')

        <div style="height:20px;"></div>
        <footer class=" bg-dark p-3" style="margin-top:auto;">
            <div class="container text-center">
                <p class="text-muted">©︎<?php $year = date('Y'); echo $year;?> Jpanese-ear-factory</p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    <script src="{{ asset('js/ajaxlike.js') }}"></script>
</html>
