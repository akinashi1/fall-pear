<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    /*
    *新規アカウント作成
    *
    *
    */
    public function new_account(LoginRequest $request){
        //重複メールアドレス確認
        $email = $request->input("email");
        $value = User::where("email", $email)->exists();
        if($value){
            session()->flash("email_error", "この既にメールアドレスは使われております");
            return redirect("login");
        }
        
        //新規アカウント入力
        User::create([
            'name' => $request->input("name"),
            'email' => $request->input("email"),
            'password' => Hash::make($request->input("password")),
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

        //ログインデータ引き出し
        $input = User::where('email', $request->input("email"))->first();

        //アカウント存在判定
        if(empty($input["email"])){
            session()->flash('login_error', "アカウントデータが存在しません");
            return redirect('login');
        }else if(!($input["email"] == $request->input("email") && hash::check($request->input("password"),$input["password"])))
        {
            session()->flash('login_error', "パスワードが一致しません");
            return redirect('login');
        }else{
            session(['id' =>$input["id"]]);
            session(['name' =>$input["name"]]);
            return redirect('popular');
        }
    }

    /*
    *リセット
    *
    *
    */
    public function reset(LoginRequest $request){

        //ログインデータ引き出し
        $input = User::where('email', $request->input("email"))->first();

        //アカウント存在判定
        if(empty($input)){
            session()->flash('login_error', "アカウントデータが存在しません");
            return redirect('reset');
        }

        //ログインデータ上書き
        $reset = User::find($input['id']);
        $reset -> password = Hash::make($request->input("password")) ;
        $reset ->save();
        session()->flash('login_error', "パスワードの変更が完了しました");
        return redirect('login');
    }

    /*
    *ログアウト
    *
    *
    */
    public function logout(){
        session()->flush();
        return redirect('login');
    }




}
