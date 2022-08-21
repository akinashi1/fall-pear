# 雑学産業
PHP自作

## 概要

管理人　ログインユーザ　ゲストユーザに分け利用可能です

## 使い方
主催者ユーザ

管理アカウント：投稿削除
ページからアカウント作成後　phpmyadminから手動でuser テーブルのID をゼロに変更してください

一般アカウント：投稿　いいね　削除　編集

メールアドレス→tesu@tesu1

パスワード→ryouyama1

# 環境
xamp/MySQL/PHP

# データベース
データベース名：trivia

テーブル

お使いのphpMyAdminに上の "trivia" データベースを作り、マイグレーションしてください　" $ php artisan migrate "
