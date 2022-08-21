<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    //
    protected $table = 'tags';

    protected $datas = [
        'created_at',
        'updated_at'
    ];

    public function trivia(){
        return $this->hasMany(Trivia::class);
    }
}
