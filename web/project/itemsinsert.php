<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('conn.php');




    $item = $_POST['item'];
    $qty = $_POST['qty'];
    $category = $_POST['category'];
    $room = $_POST['room'];
    $note = $_POST['notes'];


    $statement = $db->prepare("INSERT INTO items (room_id,category_id,qty,item_name) VALUES(:room,:category,:qty,:item_name)");
    $statement->bindValue(":room", $room);
    $statement->bindValue(":category", $category);
    $statement->bindValue(":qty", $qty);
    $statement->bindValue(":item_name", $item);
    $statement->execute();
    $statement->closeCursor();

    $newId = $db->lastInsertId('items_id_seq');

    $date = date("Y-m-d H:i:00");

if(isset($_POST['notes'])){

        $statement = $db->prepare("INSERT INTO notes (item_id,date,note_text) VALUES(:item_id,:dateNow,:note)");
        $statement->bindValue(":item_id", $newId);
        $statement->bindValue(":dateNow", $date);
        $statement->bindValue(":note", $note);
        $statement->execute();
        $statement->closeCursor();

    }
header("Location: items.php");




?>
