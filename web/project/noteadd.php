<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'conn.php';


$note = $_POST['note_text'];
$id = $_POST['id'];
$date = date("Y-m-d H:i:00");


$statement = $db->prepare("INSERT INTO notes (item_id,date,note_text) VALUES(:item_id,:mydate,:note) ");
$statement->bindValue(":note", $note);
$statement->bindValue(":mydate", $date);
$statement->bindValue(":item_id", $id);

$statement->execute();
$statement->closeCursor();


header("Location: main.php");
