<?php

define("DB_DSN","mysql:dbname=sqroller_twitter_cards;host=mysql720.db.sakura.ne.jp;charset=utf8");
define("DB_USER","sqroller");
define("DB_PASSWORD","patapon318");

// PHPのエラーを表示するように設定
ini_set('display_errors',"On");
error_reporting(E_ALL);

$tcid = Func_CreateUniqueID();

echo "コレに決定!!" . $tcid . "<br/>";

$url = "http://google.com";
$title = "タイトル";
$description = "説明";
$pic = "jpg";
$added_date = "2019/4/28";
$added_time = "20:00:00";

Func_AddDatabase($tcid,$url,$title,$description,$pic,$added_date,$added_time);

function Func_CreateUniqueID(){
	try{
		$dbh = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		for($i=1;$i<=10;$i++){
			$rand_num=mt_rand();
			echo "発生させた乱数：$rand_num<br>";

			$sql="select * from tc where tcid = '$rand_num'";
			$res=$dbh->query($sql); //クエリ実行

			if($res->fetch(PDO::FETCH_ASSOC)){
				echo "重複する値が存在しますよ、もう一度ループします<br>";
			}else{
				echo "重複する値が無いですよ、ループを抜けます. break<br>";
				echo "ループ回数:$i<br>";
				return $rand_num;
				break;
			}
		} //for文終わり
	}catch(PDOException $e){
	var_dump($e->getMessage());
	}
}

function Func_AddDatabase($tcid,$url,$title,$description,$pic,$added_date,$added_time){
	try{
		$dbh = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = ("
		INSERT INTO tc (
		tcid,url,title,description,pic,added_date,added_time
		)VALUES(
		$tcid,'$url','$title','$description','$pic','$added_date','$added_time'
		);
		");

		$res = $dbh->query($sql);
		
		echo "挿入したぞ";
	}catch(PDOException $e){
		var_dump($e->getMessage());
	}
}

?>