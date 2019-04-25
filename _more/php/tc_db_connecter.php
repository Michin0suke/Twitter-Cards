<?php

function db_connecter(){
  $hostname='mysql720.db.sakura.ne.jp'; // データベースサーバ名
  $dbname='sqroller_twitter_cards'; // データベース名
  $user='sqroller'; // データベースユーザ名
  $pass='patapon318'; // データベース接続時のパスワード
  // ローカル動作確認用
  // $hostname='localhost';
  // $dbname='local_db_1';
  // $user='root'
  // $pass='';
  try {
    $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname.';charset=utf8',$user,$pass);
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}