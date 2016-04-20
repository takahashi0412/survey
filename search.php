<!DOCTYPE>
<html lang="ja">
	<head>
		<meta charset="UTF-8" />
		<title>アンケート</title>
	</head>
<body>
	<?php
		// var_dump($nickname);
		require ('./dbconnect.php');
		$sql = 'select * from anketo where nickname like ? ' ;
		$stmt = $dbh -> prepare($sql);
		$stmt -> execute(array("%$_GET[nickname]%"));
		// var_dump($stmt -> execute($data));
		$i = 0;
		echo '<table>';
			while (true) {
				$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
				//結果がなかった場合
				if (!$rec) {
					//1回目から検索結果がなかった場合
					if ($i === 0) {
						echo '検索結果がありませんでした。';
						break;
					}
					break;
				}
				echo '<tr>';
					echo '<td>';
						echo $rec['code'];
					echo '</td>';
					echo '<td>';
						echo $rec['nickname'];
					echo '</td>';
					echo '<td>';
						echo $rec['email'];
					echo '</td>';
					echo '<td>';
						echo $rec['goiken'];
					echo '</td>';
				echo '</tr>';
				$i++;
			}
		echo '</table>';
		echo '<br />';

		echo '<a href="./searchform.php" onclick="history.back()">検索ページに戻る</a>';
		$dbh = null;
	?>
</body>
</html>