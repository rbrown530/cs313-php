<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
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
        </ul>
        <form action="search.php" action="POST" class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search for item">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</nav>
<div class="container">
<form action="itemsinsert.php" id="items" method="POST">
    <label for="item">Item</label>
    <input type="text" name="item" /><br>
    <label for="qty">Quantity</label>
    <input type="text" name="qty" /><br>
    <br>
    <label for="name">Category</label><br>

    <?php
    require 'conn.php';
    foreach ($db->query('SELECT * FROM categories') as $row)
    {
        echo '<input type="radio" name="category" value="'.$row['id'].'" >'.$row['category'].'<br/>';

    }
    ?>
    <label for="name">Rooms</label><br>


    <?php

    foreach ($db->query('SELECT * FROM rooms') as $row)
    {
        echo '<input type="radio" name="room" value="'.$row['id'].'" >'.$row['room_name'].'<br/>';

    }
    ?>

    <input class="btn btn-primary" type="submit" name="submit"/>
</form>
</div>


</body>
</html>