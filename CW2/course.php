<!doctype html>
<?php
			$m = new mysqli("localhost","scott","tiger","courses");
			if ($m->connect_errno){
				die("Database connection failed");
			}
			$m->set_charset("utf8");
			$id = $_GET['id'];
			$sql = "
				SELECT *
				FROM course
				WHERE id = '$id' ";
			$result = $m->query($sql)
				or die($m->error);
			$row = $result->fetch_assoc();
			?>

<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $row['title']; ?></title>
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
             <h1><?php echo $row['award']; ?> <?php echo $row['title']; ?> - <?php echo $row['level']; ?></h1>
            <h4>Department: <?php echo $row['dept'] ?></h4>
             <ul class="nav nav-pills red">
                 <li class="active"><a data-toggle="pill" href="#intro">Course Introduction</a></li>
                 <li><a data-toggle="pill" href="#wyl">What You'll Learn</a></li>
                 <li><a data-toggle="pill" href="#careers">Careers</a></li>
             </ul>

             <div class="tab-content">
                  <div id="intro" class="tab-pane fade in active">
                      <?php echo $row['overview']; ?>
                  </div>
                  <div id="wyl" class="tab-pane fade">
                      <h3>What You'll Learn</h3>
                      <?php echo $row['wyl']; ?>
                  </div>
                  <div id="careers" class="tab-pane fade">
                      <h3>Careers</h3>
                      <?php echo $row['careers']; ?>
                  </div>
             </div>
        </div>
        
	</body>
</html>