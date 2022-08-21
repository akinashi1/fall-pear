
@foreach($datas as $data)
<div class="container-sm mt-3 card">
    <div class="card-body">
        <div class="d-flex justify-content-between">

        <h5 class="card-title">{{ $data -> title }}</h5>

        <?php if(!session()->has('id')):?>
            {{-- ゲストユーザ --}}
        <?php elseif(session("id") == 0 && isset($box_status)):?>
            {{-- 管理者ユーザ --}}
            <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                メニュー
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/delete/{{ $data -> id }}" onclick="return confirm('本当に削除しますか（一度削除した投稿は戻せません）');">削除</a></li>
            </ul>
            </div>
        <?php elseif(session("id") != 0 && isset($box_status)):?>
            {{-- 一般ユーザ --}}
            <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                メニュー
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/delete/{{ $data -> id }}" onclick="return confirm('本当に削除しますか（一度削除した投稿は戻せません）');">削除</a></li>
                <li><a class="dropdown-item" href="/edit/{{ $data -> id }}">編集</a></li>
            </ul>
            </div>
        <?php endif;?>

        </div>
        <p class="card-text">{{ $data -> trivia }}</p>
    </div>
    <div class="d-flex justify-content-around">
        <div  class="d-flex justify-content-around" style="width:40%">
            <?php if($data['tag_id']):?>
                <div>{{ $data -> tag -> tag  }} </div>
            <?php endif; ?>
        </div>
        <div  class="d-flex justify-content-around" style="width:60%">

            <div class="d-flex justify-content-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-eyeglasses" viewBox="0 0 16 16">
                <path d="M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4zm2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A1.993 1.993 0 0 0 8 6c-.532 0-1.016.208-1.375.547zM14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                </svg>

                @if (!session()->has('id') || session("id") == 0)
                    {{-- ゲスト　管理者 --}}
                    <p class="balloon liked">
                        <a class="js-like-toggle" href="/ajaxlike" data-postid="{{ $data-> id }}"><i class="fas fa-heart"></i></a>
                        <span class="likesCount">{{ $data -> like_count }}</span>
                    </p>
                @else                
                    @if(isset($likes[$data['id']][0]['user_id']) ? $likes[$data['id']][0]['user_id'] : ""  == session('id'))
                        {{-- いいねされてる --}}
                        <p class="balloon favorite-marke liked" data-postid="{{ $data-> id }}">
                            <a class="js-like-toggle" href="" ><i class="fas fa-heart"></i></a>
                            <span class="likesCount">{{ $data -> like_count }}</span>
                        </p>
                    @else
                        {{-- いいねされてない --}}
                        <p class="balloon favorite-marke" data-postid="{{ $data-> id }}">
                            <a class="js-like-toggle" href="" ><i class="fas fa-heart"></i></a>
                            <span class="likesCount">{{ $data -> like_count }}</span>
                        </p>
                    @endif
                @endif
            </div>

            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="{{ $data -> trivia }}" data-lang="ja" data-show-count="false">Tweet</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>






            <div>{{ $data -> user -> name }}</div>
            <div><?= date('Y年m月d日' ,strtotime($data['created_at']))  ?></div>
        </div>
    </div>
</div>
@endforeach
<div class="d-flex justify-content-center mt-3">
    <div>{{ $datas->links() }}</div>
</div>

