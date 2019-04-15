<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = nl2br($_POST['title']);
    $description = nl2br($_POST['description']);
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
	<title>test</title>
</head>
<body>
  <p><?php echo $title ?></p>
	<p><?php echo $description ?></p>
</body>
</html>