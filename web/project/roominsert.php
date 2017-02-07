<?php
require('conn.php');


$room = $_POST['room'];

$statement = $db->prepare("INSERT INTO rooms (room_name) VALUES(:room)");
$statement->bindValue(":room", $room);

$statement->execute();
$statement->closeCursor();


header("Location: manage.php");