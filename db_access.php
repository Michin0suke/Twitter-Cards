<?php

if(isset($_GET['i'])){
	$tcid = $_GET['i'];
}else{
	/* ?i~ がないときの処理 */
}

define("DB_DSN","mysql:dbname=sqroller_twitter_cards;host=mysql720.db.sakura.ne.jp;charset=utf8");
define("DB_USER","sqroller");
define("DB_PASSWORD","patapon318");

// 文字化け対策
//$options = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET 'utf8'");

// PHPのエラーを表示するように設定
error_reporting(E_ALL & ~E_NOTICE);

// データベースの接続
try{
	$dbh = new PDO(DB_DSN,DB_USER,DB_PASSWORD,$options);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

$sql = "SELECT * FROM tc WHERE tcid=".$i;
$stmt = $dbh->query($sql);

while($result = $stmt->fetch(PDO::FETCH_ASSOC))	{
	print('tcid: '.$result['tcid'].'<br/>');
	print('url: '.$result['url'].'<br/>');
	$url = $result['url'];
	print('title: '.$result['title'].'<br/>');
	print('description: '.$result['description'].'<br/>');
	print('pic: '.$result['pic'].'<br/>');
	print('added_date: '.$result['added_date'].'<br/>');
	print('added_time: '.$result['added_time'].'<br/>');
	print('access_counter: '.$result['access_counter'].'<br/>');
	print('last_access_date: '.$result['last_access_date'].'<br/>');
	print('last_access_time: '.$result['last_access_time'].'<br/><br/>');
	print('Twitter-Cards.com?i='.$result['tcid'].'<br/>');
}

?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="refresh" content="0;URL=<?=$url?>">
	</head>
</html>