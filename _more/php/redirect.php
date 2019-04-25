<!DOCTYPE html>
<html lang="ja">
	<head>
		<title>Maezawa</title>
		<meta charset="utf-8">
		
<?php

  if(isset($_GET['url'])) {
      $url = $_GET['url'];
  }else{
			$url = "";
	}
	
	switch($url){
		case "line":
			$title = "なんでLINE@に誘導しようとするのか";
			$description = "懸賞好きなら、一度は読んでおいたほうがいいです。ちょっと怖い話です。";
			$url = "tips/tips_line";
			$picture = "tips_line";
			break;
		case "prize":
			$title = "Maezawa | Twitter懸賞まとめ";
			$description = "1名様に500円が当たるプレゼント企画！4/15(月)まで開催！";
			$url = "index";
			$picture = "prize";
			break;
		case "info":
			$title = "Maezawa | ヘルプ";
			$description = "Maezawaの使い方を分かりやすくまとめています！";
			$picture = "info";
			break;
		case "black-list":
			$title = "Maezawa | 懸賞詐欺ブラックリスト";
			$description = "詐欺報告があったアカウントをまとめています！詐欺アカウントをブロックしましょう！";
			$picture = "black-list";
			break;
		default: 
			$title = "Maezawa | Twitter懸賞まとめ";
			$description = "Twitterの懸賞をまとめています！懸賞好きの方はぜひ遊びにきてください！";
			$url = "index";
			$picture = "index";
	}

?>

		
		
		<meta http-equiv="refresh" content="1; URL=<?php echo $url ?>">
		 <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" /> <!-- カード種類 -->
    <meta name="twitter:site" content="@MAEZAWA_" /> <!-- @ユーザー名 -->
    <meta property="og:url" content="http://maezawa.xyz" /> <!-- 記事のURL -->
    <meta property="og:title" content="<?php echo $title; ?>" /> <!-- 記事のタイトル -->
    <meta property="og:description" content="<?php echo $description; ?>" />
    <meta property="og:image" content="http://maezawa.xyz/img/<?php echo $picture; ?>-link" /> <!-- 画像のURL -->
		
		
		<style>

			html{
				background-color: white;
				font-family: 'Helvetica Neue','Helvetica','Arial',sans-serif;
			}

			.frame{
				display: block;
				width: 30vw;
				height: calc(30vw*80/100);
				margin: 10vh auto 0 auto;
				border: solid 0.8vw gray;
				border-radius: 13px;
				background-color: white;
				overflow: hidden;
				transform: rotate(3deg);
				box-shadow: 1vw 1vw 1vw rgba(50,50,50,0.3)
			}
			.picture-frame{
				display: block;
				width: 100% ;
				height: 70% ;
				margin: 0;
				box-sizing: border-box;
				border-bottom:solid 0.2vw gray;

				background: linear-gradient(45deg, #6cb8ff, #fff66c, #ffa36c) ;
				background-size: 600% 600% ;
				animation: AnimationName 8s ease infinite ;
				color: #fff7ee ;
			}
			@keyframes AnimationName {
				0%{background-position: 0% 50%}
				50%{background-position: 100% 50%}
				100%{background-position: 0% 50%}
			}

			.name{
				font-size: 2.3vw;
				color:dimgray;
				text-align: center;
			}

			.loading{
				margin-top:5vw;
				display: inline-block;
				width:100%;
				text-align: center;
			}
			.comma{
				font-weight: 600;
			}
			.comma.no1{
				animation: Comma 200ms 200ms linear both;
			}
			.comma.no2{
				animation: Comma 200ms 400ms linear both;
			}
			.comma.no3{
				animation: Comma 200ms 600ms linear both;
			}
			@keyframes Comma {
				0%{color:white}
				100%{color:black}
			}

			frame{
				position:absolute;
				left:-1000%;
			}

		</style>
		
	</head>
<body>
	<div class="frame">
		<div class="picture-frame">
		</div>
		<p class="name">Twitter-Cards.com</p>
	</div>
	
	<div class="loading">
		<span>LOADING</span>
		<span class="comma no1">.</span>
		<span class="comma no2">.</span>
		<span class="comma no3">.</span>
	</div>
</body>
</html>