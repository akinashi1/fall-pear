<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//トップページ人気一覧
Route::get('/', 'TriviaController@popular');

Route::get('/popular', 'TriviaController@popular');

//トップページ最新一覧
Route::get('/new', 'TriviaController@new');

//トップページ今日のトピック
Route::get('/today', 'TriviaController@today');

//投稿ページ
Route::get('/post', function () {
    return view('post');
});

//新規投稿実行
Route::post('/post_exe', 'PostController@post');

//投稿完了画面
Route::get('/post_fin', function () {
    return view('post_fin');
});

//マイページ 自分の投稿
Route::get('/list', 'MypageController@mypost');

//お気に入り一覧
Route::get('/likes', 'MypageController@likes');

//管理画面
Route::get('/manege', function () {
    return view('manege');
});

//編集ページ
Route::get('/edit/{id}', 'PostController@edit')->name('edit');

//編集実行
Route::post('/editexe', 'PostController@editexe')->name('edit_exe');

//編集完了ページ
Route::get('/edit_fin', function () {
    return view('edit_fin');
});

//削除
Route::get('/delete/{id}', 'PostController@delete')->name('delete');


//検索ページ
Route::get('/search', function () {
    return view('search');
});

//検索実行
Route::post('/search_exe', 'TriviaController@search');

//ログインページ
Route::get('/login', function () {
    return view('login');
});

//ログイン
Route::post('/login_exe', 'UsersController@login');

//ユーザーデータ新規登録
Route::post('/new_account','UsersController@new_account');

//リセットフォーム
Route::get('/reset', function () {
    return view('reset');
});

//リセット実行
Route::post('/reset_exe','UsersController@reset');

//ログアウト
Route::get('/logout','UsersController@logout');


//ajaxルーティング
Route::post('/ajaxlike', 'TriviaController@ajaxlike');




