
<?php

include ('conn.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$category = $_POST['category'];
$id = $_POST['id'];


$statement = $db->prepare("UPDATE categories SET category =:category Where id =:id");
$statement->bindValue(":category", $category);
$statement->bindValue(":id", $id);
$statement->execute();
$statement->closeCursor();

header("Location: manage.php");
