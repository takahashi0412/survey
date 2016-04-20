<!DOCTYPE>
<html lang="ja">
	<head>
		<meta charset="UTF-8" />
	</head>
	<title>アンケート</title>
<body>
	<?php
		try {
			// $dbh = new PDO('mysql:dbname=phpkiso;host=localhost', 'root', '');
			// $dbh -> query('SET NAMES UTF8');
			
			require ('./dbconnect.php');
			$sql = 'select * from anketo';
			$stmt = $dbh -> prepare($sql);
			$stmt -> execute();
			//var_dump($stmt);
			$i = 0;
			echo '<table>';
				while(true) {
					$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
					if (!$rec) {
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
				}
			echo '</table>';
			$dbh = null;
			echo '<br />';
			echo '<a href="./menu.html">メニューページに戻る</a>';
		} catch (Exception $e) {
			echo 'ただいま障害により大変ご迷惑をおかけしております。';
			echo '<br />';
			echo '<a href="./menu.html">メニューページに戻る</a>';
		}
	?>
</body>
</html>