<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trivia;
use App\Models\Tag;
use App\Models\Like;
use App\Services\Service;

class TriviaController extends Controller
{
    private $rand;

    public function __construct()
    {
        $this->rand = new Service();
    }

    //人気一覧
    public function popular(){
        $datas = trivia::with('tag','user','like')
        ->withCount('like')
        ->orderBy("like_count","desc")
        ->paginate(10);
        $likes = like::where('user_id',session('id'))->get();
        $likes = $likes -> groupBy('trivia_id');


        return view('index/popular',['datas' => $datas],['likes' => $likes]);
    }

    //最新一覧
    public function new(){
        $datas = trivia::with('tag','user','like')
        ->withCount('like')
        ->orderBy("created_at","desc")
        ->paginate(10);

        $likes = like::where('user_id',session('id'))->get();
        $likes = $likes -> groupBy('trivia_id');
        
        return view('index/new',['datas' => $datas],['likes' => $likes]);
    }
    
    //今日のトピック
    public function today(){
        $today = $this->rand-> randToday();
        $datas = trivia::with('tag','user','like')
        ->withCount('like')
        ->where('tag_id',  $today)
        ->paginate(10);

        $likes = like::where('user_id',session('id'))->get();
        $likes = $likes -> groupBy('trivia_id');
        
        $tag = tag::find($today);
        
        return view('index/today',['datas' => $datas],['tag' => $tag],['likes' => $likes]);
    }

    //検索一覧表示
    public function search(Request $request){
        if(tag::where( 'tag' , $request->get('tag'))->exists()){
            $tag_id = tag::where( 'tag' , $request->get('tag'))->first() ;

            $datas = trivia::with('tag','user','like')
            ->withCount('like')
            ->where('tag_id', $tag_id['id'] )
            ->paginate(10);
        }else{
            $datas = 'noData';
        }

        
        return view('search',['datas' => $datas]);
    }


    //いいね機能
    public function ajaxlike(Request $request){
        $user_id = session('id');
        $trivia_id = $request -> post_id;
        $data = trivia::findOrFail($trivia_id);


        if(like::where('user_id', $user_id)->where('trivia_id', $trivia_id)->exists()){
            //likesテーブルのレコードを削除
            like::where('user_id', $user_id)->where('trivia_id', $trivia_id)->delete();
        } else {
            $trivia = new Like;
            $trivia->create([
                'trivia_id'=> $trivia_id,
                'user_id'=> $user_id
            ]); 
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $data->loadCount('like')->like_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }
}
