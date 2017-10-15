<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<?php
			$m = new mysqli("localhost","scott","tiger","movie");
			if ($m->connect_errno){
				die("Database connection failed");
			}
			$m->set_charset("utf8");
			$id = 132689;
			$sql = "
				SELECT title,img,rel,synopsis, year(rel) as yor
				FROM movie
				WHERE movie.id = $id";
			$result = $m->query($sql)
				or die($m->error);
			$row = $result->fetch_assoc();
			?>

		<title><?= $row['title'] ?></title>
	</head>
	<body>
		<h1><?= $row['title'] ?> (<?=$row['yor'] ?>)</h1>
		<p><?= $row['synopsis'] ?></p>
		<img src="<?= $row['img'] ?>" alt="$row['title'] ?>">
 	</body>
</html>