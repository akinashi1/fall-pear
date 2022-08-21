<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Trivia;

class Like extends Model
{

    protected $fillable = [
        'trivia_id',
        'user_id'
    ];

    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function trivia(){

        return $this->belongsTo(Trivia::class);
        
    }


    public function like_exist($user_id, $trivia_id){
        
        //Likesテーブルのレコードにユーザーidと投稿idが一致するものを取得
        
        $exist = Like::where( 'user_id' , '=' , $user_id ) -> where( 'trivia_id' , '=', $trivia_id) -> get();

        // レコード（$exist）が存在するなら
        if (!$exist->isEmpty()) {
            return true;
        } else {
        // レコード（$exist）が存在しないなら
            return false;
        }
    }
}
