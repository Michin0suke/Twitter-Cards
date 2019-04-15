<?php
if(isset($_FILES)&& isset($_FILES['upfile']) && is_uploaded_file($_FILES['upfile']['tmp_name'])){
    if(!file_exists('upload')){
        mkdir('upload');
    }
    $a = 'upload/' . basename($_FILES['upfile']['name']);
    if(move_uploaded_file($_FILES['upfile']['tmp_name'], $a)){
        $msg = $a. 'のアップロードに成功しました';
    }else {
        $msg = 'アップロードに失敗しました';
    }
}
?>

<?php require 'header.php'; ?>
<h1>アルバム作成：画像アップロード</h1>
<p><form action="upload_top.php" method="post" enctype="multipart/form-data">
<input type="file" name="upfile">
<input type="submit" value="読み込み">
</form></p>

<?php
if(isset($msg) && $msg == true){
    echo '<p>'. $msg . '</p>';
}
?>
<a href="upload_top.php">戻る</a>
<?php
$h = apache_request_headers();
var_dump($h["Content-Type"]);
?>
<?php require 'footer.php';?>