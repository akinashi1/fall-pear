<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	//
	protected $fillable = ['name','email','password'];

	public function like(){
		return $this->hasMany(Like::class);
	}

	//メルアドとパスワードが一致するものを探索します
	public function checkAuth($email, $password){
		

	}


}
