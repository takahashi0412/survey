<?php
	if (isset($_GET['nickname'])) {
		//GET送信されてきたら
		if ($_GET['nickname'] == false) {
			echo 'ニックネームが入力されていません。';
		} else {
			//ニックネームが入力されているので検索結果ページへ移動する
			//phpでのredirect処理
			header('Location: search.php?nickname='.$_GET['nickname']);
		}
	}
?>

<!DOCTYPE>
<html lang="ja">
	<head>
		<meta charset="UTF-8" >
		<title>アンケート</title>
	</head>
<body>
	<form>
		<input type="text" name="nickname"/>
		<input type="submit" value="送信" />
	</form>
</body>
</html>