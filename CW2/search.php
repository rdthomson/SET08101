<!doctype html>
<?php
			$m = new mysqli("localhost","scott","tiger","courses");
			if ($m->connect_errno){
				die("Database connection failed");
			}
			$m->set_charset("utf8");
			if(isset($_GET['search'])){
				$search = $m->escape_string($_GET['search']);

				$query = $m->query("
					SELECT id, title, level, award, summary
					FROM course
					WHERE course.title LIKE '%{$search}%'
					ORDER BY title ASC
                    LIMIT 0, 10
				");
			}
		
			?>
<html>
	<head>
		<title>Courses</title>
		<link rel="stylesheet" typte="text/css" href="course.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="index.php"><img class="logo"src="NapierLogo.png" alt="Edinburgh Napier University Logo"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Courses</a></li>
                        <li><a href="http://www.napier.ac.uk/study-with-us">Study with us</a></li>
                        <li><a href="http://www.napier.ac.uk/global">Global</a></li> 
                        <li><a href="http://www.napier.ac.uk/research-and-innovation">Research and innovation</a></li>
                        <li><a href="http://www.napier.ac.uk/alumni">Alumni</a></li>
                        <li><a href="http://www.napier.ac.uk/about-us">About us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <h1>Courses</h1>
            <form action=search.php method="get">
                <input id="search" name="search" type="text" placeholder="Search for a course" />
                <input type="submit" value="Search"/>
            </form>

            <div class="result_count">
                Showing <?php echo $query->num_rows; ?> results.
            </div>
            <div class="searched">
                You searched for: <b><?php echo $search ?></b>
                <?php
                    if ($query->num_rows){
                        while($r = $query->fetch_object()){
                        ?>

                            <div class="result">
                                <div><h4><a href="course.php?id=<?php echo $r->id; ?>"><?php echo $r->award; ?> <?php echo $r->title; ?> - <?php echo $r->level; ?></a></h4></div>
                                <div><?php echo $r->summary; ?></div>
                            </div>

                        <?php
                        }
                    }
                ?>
                <div>Can't find what you're looking for? Try adding more detail to your search!</div>
            </div>
        </div>
	</body>
</html>