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
				SELECT title,img,rel,synopsis,month(rel) as mon,year(rel) as yor
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
		<img src="<?= $row['img'] ?>" alt="<?= $row['title'] ?>">
		<p>Directed by: <?= $row['director'] ?></p>
		<p>Cast: <?= $row['cast'] ?></p>
		<p>Relseased: <?= $row['mon'] ?> <?= $row['yor'] ?></p>
		<p><?= $row['synopsis'] ?></p>
 	</body>
</html>