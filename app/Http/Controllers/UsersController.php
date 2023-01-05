<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller{

	public function __construct(){
		$this->User = new User();
	}

	/*
	*新規アカウント作成
	*
	*
	*/
	public function new_account(LoginRequest $request){
		
		$email = $request->input("email");
		$name = $request->input("name");
		$password = Hash::make($request->input("password"));

		//重複メールアドレス確認
		if(User::where("email", $email)->exists()){
			session()->flash("email_error", "この既にメールアドレスは使われております");
			return redirect("login");
		}

		//新規アカウント入力
		User::create([
			'name'     => $name,
			'email'    => $email,
			'password' => $password,
		]);

		session()->flash("new_exe", "登録完了！！");
		return redirect("login");
	}


	/*
	*ログイン
	*
	*
	*/
	public function login(Request $request){
		$email = $request->input("email");
		$password = $request->input("password");
		

		//モデル移動

			//ログインデータ引き出し
			$input = User::where('email', $email)->first();

			//ログイン実行
			if(empty($input["email"])){
				//存在判定
				session()->flash('login_error', "アカウントデータが存在しません");
				return redirect('login');
			}else if(!($input["email"] == $email && hash::check($password, $input["password"]))){
				//パスワード一致判定
				session()->flash('login_error', "パスワードが一致しません");
				return redirect('login');
			}else{

		//モデル移動

		

			session(['id' =>$input["id"]]);
			session(['name' =>$input["name"]]);
			return redirect('popular');
		}
	}

	/*
	*パスワードリセット
	*
	*
	*/
	public function reset(LoginRequest $request){

		$email = $request->input("email");
		$password = $request->input("password");

		//ログインデータ引き出し
		$input = User::where('email', $email)->first();

		//アカウント存在判定
		if(empty($input)){
			session()->flash('login_error', "アカウントデータが存在しません");
			return redirect('reset');
		}

		//ログインデータ上書き
		$reset = User::find($input['id']);
		$reset -> password = Hash::make($password);
		$reset ->save();
		session()->flash('login_error', "パスワードの変更が完了しました");
		return redirect('login');
	}

	/*
	*ログアウト
	*/
	public function logout(){
		session()->flush();
		return redirect('login');
	}
}
