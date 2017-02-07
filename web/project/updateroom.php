
<?php

include ('conn.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$room = $_POST['room'];
$id = $_POST['id'];


$statement = $db->prepare("UPDATE rooms SET room_name =:room Where id =:id");
$statement->bindValue(":room", $room);
$statement->bindValue(":id", $id);
$statement->execute();
$statement->closeCursor();

header("Location: manage.php");
