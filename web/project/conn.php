<?php
/////Local
//try
//{
//$user = 'postgres';
//$password = '';
//$db = new PDO('pgsql:host=localhost;dbname=postgres', $user, $password);
//}
//catch (PDOException $ex)
//{
//echo 'Error!: ' . $ex->getMessage();
//die();
//}
//Heroku
 //default Heroku Postgres configuration URL
$dbUrl = getenv('pg_dump postgres://geykwcflfainbt:926d0933a74d94512ae583b6cf23489b4812e1bdf2c9289c122c85fbf14eef6f@ec2-107-20-193-74.compute-1.amazonaws.com:5432/d2je6okqu4jjr');

if (empty($dbUrl)) {
    // example localhost configuration URL with postgres username and a database called cs313db
    $dbUrl = "postgres://postgres:@localhost:5432/postgres";
}

$dbopts = parse_url($dbUrl);

//print "<p>$dbUrl</p>\n\n";

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

//print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
    print "<p>error: $ex->getMessage() </p>\n\n";
    die();
}




?>


