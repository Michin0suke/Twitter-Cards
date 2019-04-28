<?php
// PHPのエラーを表示するように設定
ini_set('display_errors',"On");
error_reporting(E_ALL);

function postGet($v){
	if(isset($_POST[$v])){
		$rt = $_POST[$v];
		echo "[$v]: $rt <br/>";
		return $rt;
	}else{
		exit;
	}
}

$title = postGet('title');
$description = postGet('description');
//$url = postGet('url');

// キャッシュ無効
header( 'Expires: Thu, 01 Jan 1970 00:00:00 GMT' );
header( 'Last-Modified: '.gmdate( 'D, d M Y H:i:s' ).' GMT' );
// HTTP/1.1
header( 'Cache-Control: no-store, no-cache, must-revalidate' );
header( 'Cache-Control: post-check=0, pre-check=0', FALSE );
// HTTP/1.0
header( 'Pragma: no-cache' );

try{
	if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
		move_uploaded_file($_FILES['upfile']['tmp_name'], 'uploaded-img/12345678.jpg');
	}
}catch(Exception $e) {
	echo 'エラー:', $e->getMessage().PHP_EOL;
}

echo '<img src="uploaded-img/12345678">';

print_r($_FILES['upfile']);