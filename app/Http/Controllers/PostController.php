<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Trivia;
use App\Models\Tag;
use App\Models\Like;
use Dotenv\Util\Regex;
use App\Services\Service;

class PostController extends Controller
{
    private $Service;

    public function __construct()
    {
        $this->Service = new Service();
    }

    //新規投稿
    public function post(PostRequest $request){

        $tag_id = $this->Service->tagCheck($request->get('tag'));

        $new_trivia = new Trivia;
        $new_trivia->create([
            'title'=> $request->get('title'),
            'trivia'=> $request->get('trivia'),
            'tag_id'=> $tag_id,
            'user_id'=> session('id')
        ]);
        return redirect('post_fin');
    }

    //編集画面
    public function edit($id){
        $datas = trivia::with('tag','user')
        ->find($id);
        return view('edit',['datas' => $datas]);
    }

    //編集確定 
    public function editexe(PostRequest $request){

        $tag_id = $this->Service->tagCheck($request->get('tag'));

        $update = trivia::find($request->get('id'));

        $update->fill([
            'title' => $request->get('title'),
            'trivia' => $request->get('trivia'),
            'tag_id' => $tag_id
        ]);
        $update->save(); 
        return redirect('edit_fin');
    }

    //投稿削除
    public function delete($id){
        trivia::destroy($id);
        like::where('user_id',$id)->delete();
        return redirect('list');
    }

}
