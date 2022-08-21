<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Trivia extends Model
{
    //
    protected $table = 'trivias';

    protected $fillable = [
        'title',
        'trivia',
        'tag_id',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function tag(){
        return $this->belongsTo(Tag::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }
}
