<?php
include ('conn.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page - Ryan Brown</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php">Inventory Manager</a>
        </div>
        <ul class="nav navbar-nav">

            <li><a href="main.php">Main</a></li>
            <li><a href="items.php">Items</a></li>
            <li><a href="manage.php">Manage</a></li>
        </ul>
        <form action="search.php" method="post" class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search for item">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</nav>
<div class="container">

    <?php

$id = $_GET['id'];
$stmt = $db->prepare('SELECT items.id as item_id, * FROM rooms JOIN items on rooms.id = items.room_id join notes on items.id = notes.item_id WHERE rooms.id=:id GROUP BY rooms.id,items.id,notes.id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$title = '';
$i = 1;
$jumbo = false;
$header = 1;
foreach ($rows as $row){

    if($header == 1){
        echo ' <div class="jumbotron">
        <h1>' . $row['room_name'] . '</h1></div>';
        $header = 0;
    }

if($title != $row['item_name']) {
        $i=1;
        if($jumbo){
            echo'</div></div>';
        }
        $jumbo = true;
    echo ' <div class="panel panel-default">
  <div class="panel-heading">'.$row['item_name'].' <a href="edititems.php?item_id=' . trim($row['item_id']).'"> Edit</a> <a href="addnote.php?item_id=' . trim($row['item_id']).'">Add Note</a></div>
  <div class="panel-body">Note '.$i.': '.$row['note_text'].'

  ';
    $title = $row['item_name'];
    $i++;

}else {
    echo '</br> Note '.$i.': '.$row['note_text'];
    $i++;
}

}
?>


</div>
</body>
