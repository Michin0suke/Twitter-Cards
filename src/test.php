<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>test</title>
	</head>

	<body>
	
		<form action="test.php" method="post">
		
			<textarea type="text-box" name="text"></textarea>

			<input type="submit" name="submit">
		
		</form>

	<p><?php

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$text = nl2br(htmlspecialchars($_POST[text]));
			echo $text;
		}

		?>

		</p></body>

</html>
