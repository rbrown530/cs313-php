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

<?php

if(isset($_POST['submit'])){

    $pollresults  = "blue.txt";
    $contents = file_get_contents($pollresults);
    $blue = $contents;
    $pollresults  = "orange.txt";
    $contents = file_get_contents($pollresults);
    $orange = $contents;
    $pollresults  = "red.txt";
    $contents = file_get_contents($pollresults);
    $red = $contents;
    $pollresults  = "green.txt";
    $contents = file_get_contents($pollresults);
    $green = $contents;

    if($_POST['answer1'] == 'blue'){
    $pollresults  = "blue.txt";
    $contents = file_get_contents($pollresults);
    $contents++;
    file_put_contents("blue.txt",$contents);
    $blue = $contents;


}elseif($_POST['answer1'] == 'orange'){
    $pollresults  = "orange.txt";
    $contents = file_get_contents($pollresults);
    $contents++;
    file_put_contents("orange.txt",$contents);
    $orange = $contents;

}elseif($_POST['answer1'] == 'red'){
    $pollresults  = "red.txt";
    $contents = file_get_contents($pollresults);
    $contents++;
    file_put_contents("red.txt",$contents);
    $red = $contents;

}elseif($_POST['answer1'] == 'green'){
    $pollresults  = "green.txt";
    $contents = file_get_contents($pollresults);
    $contents++;
    file_put_contents("green.txt",$contents);
    $green = $contents;

}


$total = $blue + $orange + $red + $green;

$bluePercent = ($blue / $total) * 100;
$orangePercent = ($orange / $total) * 100;
$redPercent = ($red / $total) * 100;
$greenPercent = ($green / $total) * 100;

  $bluePercent1 =  number_format((float)$bluePercent, 2, '.', '');
  $orangePercent1 = number_format((float)$orangePercent, 2, '.', '');
  $redPercent1 = number_format((float)$redPercent, 2, '.', '');
  $greenPercent1 =  number_format((float)$greenPercent, 2, '.', '');

echo "<a href='week3.php'>Back to Poll</a><div class='col-lg-4'> 

<div class='span6'>
  <h5>Poll: What is your least favorite color?</h5>
  <strong>Blue</strong><span class='pull-right'>$bluePercent1%</span>
  <div class='progress  active'>
      <div class='progress-bar' style='width: $bluePercent%;'>$blue</div>
  </div>
  <strong>Orange</strong><span class='pull-right'>$orangePercent1%</span>
  <div class='progress active'>
      <div class='progress-bar progress-bar-warning ' style='width: $orangePercent%;'>$orange</div>
  </div>
  <strong>Red</strong><span class='pull-right'>$redPercent1%</span>
  <div class='progress active'>
      <div class='progress-bar progress-bar-danger' style='width: $redPercent%;'>$red</div>
  </div>
  <strong>Green</strong><span class='pull-right'>$greenPercent1%</span>
  <div class='progress active'>
      <div class='progress-bar progress-bar-success'   style='width: $greenPercent%;'>$green</div>
  </div>
 
</div></div>";


    setcookie('has_voted', '1', mktime().time()+60*60*24*30);

}else{
    $pollresults  = "blue.txt";
    $contents = file_get_contents($pollresults);
    $blue = $contents;
    $pollresults  = "orange.txt";
    $contents = file_get_contents($pollresults);
    $orange = $contents;
    $pollresults  = "red.txt";
    $contents = file_get_contents($pollresults);
    $red = $contents;
    $pollresults  = "green.txt";
    $contents = file_get_contents($pollresults);
    $green = $contents;

    $total = $blue + $orange + $red + $green;

    $bluePercent = ($blue / $total) * 100;
    $orangePercent = ($orange / $total) * 100;
    $redPercent = ($red / $total) * 100;
    $greenPercent = ($green / $total) * 100;

    $bluePercent1 =  number_format((float)$bluePercent, 2, '.', '');
    $orangePercent1 = number_format((float)$orangePercent, 2, '.', '');
    $redPercent1 = number_format((float)$redPercent, 2, '.', '');
    $greenPercent1 =  number_format((float)$greenPercent, 2, '.', '');

    echo "<a href='week3.php'>Back to Poll</a><div class='col-lg-4'> 

<div class='span6'>
  <h5>Poll: What is your least favorite color?</h5>
  <strong>Blue</strong><span class='pull-right'>$bluePercent1%</span>
  <div class='progress  active'>
      <div class='progress-bar' style='width: $bluePercent%;'>$blue</div>
  </div>
  <strong>Orange</strong><span class='pull-right'>$orangePercent1%</span>
  <div class='progress active'>
      <div class='progress-bar progress-bar-warning ' style='width: $orangePercent%;'>$orange</div>
  </div>
  <strong>Red</strong><span class='pull-right'>$redPercent1%</span>
  <div class='progress active'>
      <div class='progress-bar progress-bar-danger' style='width: $redPercent%;'>$red</div>
  </div>
  <strong>Green</strong><span class='pull-right'>$greenPercent1%</span>
  <div class='progress active'>
      <div class='progress-bar progress-bar-success'   style='width: $greenPercent%;'>$green</div>
  </div>
 
</div></div>";
}
?>
</body>
</html>