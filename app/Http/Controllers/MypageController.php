<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trivia;
use App\Models\Like;
class MypageController extends Controller
{
    
    //私の投稿 管理者ページもあり
    public function mypost(){

        if(session("id") == 0){
            //管理
            $datas = trivia::with('tag','user','like')
            ->withCount('like')
            ->paginate(10);
        }elseif(session("id") != 0){
            //一般
            $datas = trivia::with('tag','user','like')
            ->withCount('like')
            ->where('user_id',session("id"))
            ->paginate(10);
        }

        $likes = like::where('user_id',session('id'))->get();
        $likes = $likes -> groupBy('trivia_id');

        return view('list',['datas' => $datas],['likes' => $likes]);
    }

    //お気に入り一覧
    public function likes(){
        $datas = trivia::with('tag','user','like')
        ->withCount('like')
        ->wherehas('like',function($query){
            $query->where('user_id', session('id'));
        })
        ->paginate(10);

        $likes = like::where('user_id',session('id'))->get();
        $likes = $likes -> groupBy('trivia_id');

        return view('likes',['datas' => $datas],['likes' => $likes]);
    }
}
