<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('conn.php');




    $book = $_POST['item'];
    $chapter = $_POST['qty'];
    $verse = $_POST['room'];


    $statement = $db->prepare("INSERT INTO items (room_id,category_id,qty,item_name) VALUES(:room,:category,:qty,:item_name)");
    $statement->bindValue(":book", $book);
    $statement->bindValue(":chapter", $chapter);
    $statement->bindValue(":verse", $verse);
    $statement->bindValue(":content", $content);
    $statement->execute();
    $statement->closeCursor();

    $newId = $db->lastInsertId('scriptures_id_seq');
    echo $newId;

    $statement1 = $db->prepare("INSERT INTO link(topic_id, scripture_id) VALUES (:topic_id, :scripture_id)");
    $statement1->bindValue(":topic_id", $topic);
    $statement1->bindValue(":scripture_id", $newId);
    $statement1->execute();
    $statement1->closeCursor();




?>
