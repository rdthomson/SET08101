<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="course.css">
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
                    <input id="search" name="search" type="text" placeholder="Search for a course"/>
                    <input type="submit" value="Search"/>
                </form>      
	</div>
</body>
</html>