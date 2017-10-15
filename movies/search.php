<html>
	<head>
		<title>Movie Search</title>
		<?php
			$m = new mysqli("localhost","scott","tiger","movie");
			if ($m->connect_errno){
				die("Database connection failed");
			}
			$m->set_charset("utf8");
			$title = 132689;
			$sql = "
				SELECT title, id
				FROM movie
				WHERE title LIKE '%$id%'";
			$result = $m->query($sql)
				or die($m->error);
			while ($r = $result->fetch_array()){
				echo "<a href='movie.php?id=$r[id]>$r[title]</a>";
			}
		?>

	</head>
	<body>
		<h1>Your Search</h1>
		<form action=search.php>
		<div>Search for movie: <input name='target'/> <input type=submit></div>
	</body>
</html>