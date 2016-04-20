<!DOCTYPE>
<html lang="ja">
	<head>
		<meta charset="UTF-8" >
		<title>アンケート</title>
	</head>
<body>
	<?php
		$code = $_GET['code'];
		// var_dump($code);
		// $dbh = new PDO('mysql:dbname=phpkiso;host=localhost', 'root', '');
		// // var_dump($dbh);
		// $dbh -> query('SET NAMES UTF8');
		
		require ('./dbconnect.php');
		$sql = 'select * from anketo where code = ?';
		// var_dump($sql);
		$stmt = $dbh -> prepare($sql);
		$data[] = $code;
		$stmt -> execute($data); 

		echo '<table>';
			$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
			if (!$rec) {
				echo '検索結果がありませんでした。';
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
		echo '</table>';
		echo '<br />';
		echo '<a href="./kensaku.html" onclick="history.back()">検索ページに戻る</a>';
		$dbh = null;
	?>
</body>
</html>