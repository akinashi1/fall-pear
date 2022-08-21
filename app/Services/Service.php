<?php
namespace App\Services;
use App\Models\Tag;
use Illuminate\Http\Request;

class Service{

    /**
    * 日替わりランダム変数作成
    */
    public function randToday(){
        $tags = tag::count();
        $today = date("d");
        mt_srand($today);


        $today = mt_rand(tag::min('id'),tag::min('id')+ 20);
        return $today;
    }

    /**
     * 重複タグを検索
     *
     * @param  $request
     * @return int
     */
    public function tagCheck($tag){
        if(tag::where('tag', $tag)->exists()){
            $tag_id = tag::where('tag', $tag)->first(['id']);
            $tag_id = $tag_id['id'];
        }elseif($tag == null) {
            $tag_id = NULL;
        }else{
            $tag_id = tag::insertGetId(['tag'=> $tag]);
        }
        return($tag_id);
    }

}