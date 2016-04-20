<!DOCTYPE>
<html lang="ja">
	<head>
		<meta charset="UTF-8" />
	</head>
	<title>アンケート</title>
<body>
	<?php
		try {
			//DB接続オブジェクトを作成 
			// $dbh = new PDO('mysql:dbname=phpkiso;host=localhost', 'root', '');
			// var_dump($dbh);
			//接続したDBオブジェクトで文字コードutf8を使うように指定
			// dbhオブジェクトの関数(query())を実行している
			// $dbh -> query('SET NAMES UTF8');
			
			require ('./dbconnect.php');
			$nickname = $_POST['nickname'];
			$mail = $_POST['mail'];
			$goiken = $_POST['goiken'];

			echo "$nickname 様 <br />";
			echo 'ご意見ありがとうございました。<br />';
			echo "いただいたご意見『 $goiken 』<br />";
			echo "$nickname にメールを送りましたのでご確認ください。";
			echo '<a href="./ichiran.php">登録一覧</a>';
			// Mail Server がないと送信不可.
			// $mail_sub = 'アンケートを受け付けました。';
			// $mail_body = $nickname. "様へ\nアンケートにご協力頂きありがとうございました。";
			// $mail_body = html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
			// $mail_head = 'From:cist.takahashi@gmail.com';
			// mb_language('japanese');
			// mb_internal_encoding("UTF-8");
			
			// if (mb_send_mail($mail, $mail_sub, $mail_body, $mail_head)) {
			// 	echo "送信に成功しました。";		
			// } else {
			// 	echo "送信に失敗しました。";
			// }

			$sql = 'INSERT INTO anketo(nickname, email, goiken) VALUES ("'.$nickname.'", "'.$mail.'", 
			"'.$goiken.'")';
			echo '<br />';
			var_dump($sql);
			$stmt = $dbh -> prepare($sql);
			// echo var_dump($stmt); //ok
			$stmt -> execute();
			$dbh = null;
		} catch (Exception $e) {
			echo 'ただいま障害により大変ご迷惑をおかけしております。';
			// echo $e;
		}
	?>
</body>
</html>