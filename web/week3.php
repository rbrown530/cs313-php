<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page - Ryan Brown</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php">CS 313</a>
        </div>
        <ul class="nav navbar-nav">

            <li><a href="assignments.php">Assignments</a></li>
        </ul>
    </div>
</nav>
<div class="container">

<div class="row">
<?php

    if (!isset($_COOKIE['has_voted'])) {

        echo '<div class="col-lg-4">
<h1>What is your LEAST favorite color?</h1>
        <form action="week3form.php" method="post">
        <div class="form-group">
            <label for="amount">Blue</label>
            <input type="radio" class="form-control" value="blue" name="answer1" id="answer1" placeholder="">
        </div>
        <div class="form-group">
            <label for="amount">Orange</label>
            <input type="radio" class="form-control" value="orange" name="answer1" id="answer1" placeholder="">
        </div>
        <div class="form-group">
            <label for="amount">Red</label>
            <input type="radio" class="form-control" value="red" name="answer1" id="answer1" placeholder="">
        </div>
        <div class="form-group">
            <label for="amount">Green</label>
            <input type="radio" class="form-control" value="green" name="answer1" id="answer1" placeholder="">
        </div>
<a href="week3form.php">View Results</a><br>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
    </div>';

    }else{
        echo '<h1>You already voted, thank you.</h1>';
        header("refresh: 5; url=https://polar-wave-91217.herokuapp.com/week3form.php");
    }


?>




</div>
</div>


</body>
</html>