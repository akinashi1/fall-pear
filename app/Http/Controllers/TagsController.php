<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Trivia;


class TagsController extends Controller
{
    //
    //最新一覧
    public function new(){

        $tags = Tag::all();
        dd($tags);

        $datas = Trivia::select("*")
        ->orderBy("created_at","desc")
        ->get();

        return view('index/new',['datas' => $datas]);
    }
}
