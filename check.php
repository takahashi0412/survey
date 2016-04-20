<!DOCTYPE>
<html lang="ja">
	<head>
	
		<meta charset="UTF-8" />
	</head>
	<title>アンケート</title>
<body>
	<?php
		$nickname = htmlspecialchars($_POST['nickname']);
		$mail = htmlspecialchars($_POST['mail']);
		$goiken = htmlspecialchars($_POST['goiken']);
		// postで受け取る時の書き方 ... $_POST
		// echo $_GET['nickname'];
		// nicknameは、前のページのタグのnameを入れる.
		if ($nickname) {
			echo "Welcome! $nickname 様";
		} else {
			echo 'NO NAME!';
		}
		echo '<br />';
		if ($mail) {
			echo $mail;
		} else {
			echo 'NO MAIL!';
		}
		echo '<br />';
		if ($goiken) {
			echo $goiken;
		} else {
			echo 'NO GOIKEN!';
		}
		echo '<br />';
		echo '<form method="post" action="thanks.php">';
			echo '<table>';
				echo '<tr>';
					echo '<td>';
						echo '<input type="button" onclick="history.back()" value="戻る" />';
					echo '</td>';
					echo '<td>';
						if ($nickname && $mail && $goiken) {
							echo '<input name="nickname" type="hidden" value="'.$nickname.'" />';
							echo '<input name="mail" type="hidden" value="'.$mail.'" />';
							echo '<input name="goiken" type="hidden" value="'.$goiken.'" />';
							echo '<input type="submit" value="OK" />';
						}
					echo '</td>';
				echo '</tr>';
			echo '</table>';
		echo '</form>';

		//リファラの出力
		$referer = $_SERVER["HTTP_REFERER"];
		if ($referer == true) {
			echo "リファラ：". $referer;
		}
	?>
</body>
</html>