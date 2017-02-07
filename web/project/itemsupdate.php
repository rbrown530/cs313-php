<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('conn.php');




$item = $_POST['item'];
$id = $_POST['id'];
$qty = $_POST['qty'];
$category = $_POST['category'];
$room = $_POST['room'];


$statement = $db->prepare("UPDATE items SET room_id=:room_id, category_id=:cat_id, qty=:qty, item_name=:item_name WHERE id=:id");
$statement->bindValue(":room_id", $room);
$statement->bindValue(":cat_id", $category);
$statement->bindValue(":qty", $qty);
$statement->bindValue(":item_name", $item);
$statement->bindValue(":id", $id);
$statement->execute();
$statement->closeCursor();



header("Location: main.php");




?>
