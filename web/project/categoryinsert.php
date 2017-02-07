<?php

require('conn.php');


$category = $_POST['category'];

$statement = $db->prepare("INSERT INTO categories (category) VALUES(:category)");
$statement->bindValue(":category", $category);

$statement->execute();
$statement->closeCursor();


header("Location: manage.php");