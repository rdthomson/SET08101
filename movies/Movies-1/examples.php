<?php
header("Content-Type:text/plain");
$mysqli = new mysqli("localhost","scott","tiger","movie");
if ($mysqli->connect_errno){
	die("Database connection failed");
}

echo "List the latest 5 movies containing sky\n";
$target="sky";
$sql="
	SELECT id, title, rel
	FROM movie
	WHERE title LIKE '%$target%'
	ORDER BY rel DESC
	LIMIT 5";

echo "$sql\n";
$result = $mysqli->query($sql)
	or die($mysqli->error);
while ($row = $result->fetch_assoc()){
	echo json_encode($row)."\n";
}

echo"\nList the top 6 actors in movie with id 4941\n";

$id=4941;
$sql = "
	SELECT ord,actor.id,name
	FROM casting JOIN actor ON (actorid=actor.id)
	WHERE movieid=$id
	ORDER BY ord
	LIMIT 7";

echo $sql;
$result = $mysqli->query($sql)
 or die($mysqli->error);
while ($row = $result->fetch_assoc()) {
 echo json_encode($row)."\n";
}

echo "\nList 5 movies of 28054 (Judi Dench) starting from number 20 by relese date\n";
$id=28054;
$sql = "
	SELECT rel title
	FROM casting JOIN movie ON (movieid=movie.id)
	WHERE	actorid=$id
	ORDER BY rel DESC
	LIMIT 20, 5";

echo $sql;
$result = $mysqli->query($sql)
	or die($mysqli->error);

while ($row = $result->fetch_assoc()){
	echo json_encode($row)."\n";
}

echo "\nSame as above - but print it nicely\n";
$id = 28054;
$sql = "
 SELECT title, year(rel) AS yr, monthname(rel) AS mnth
 FROM casting JOIN movie ON (movieid=movie.id)
 WHERE actorid=$id
 ORDER BY rel DESC
 LIMIT 20, 5";

echo $sql;
$result = $mysqli->query($sql)
 or die($mysqli->error);
while ($row = $result->fetch_assoc()) {
 echo "Dame Judy Dench was in \"$row[title]\" release in
$row[mnth] $row[yr]\n";
}