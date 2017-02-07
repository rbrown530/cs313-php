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
            <a class="navbar-brand" href="main.php">Inventory Manager</a>
        </div>
        <ul class="nav navbar-nav">

            <li><a href="main.php">Main</a></li>
            <li><a href="items.php">Items</a></li>
            <li><a href="manage.php">Manage</a></li>
        </ul>
        <form action="search.php" method="POST" class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search for item">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</nav>
<div class="container">
    <div class="jumbotron">
        <h1>Manage</h1>
    </div>
<div class="container">
    <div class="col-lg-6">
    <form action="categoryinsert.php" id="category" method="POST">
        <label for="category">Category</label>
        <input type="text" name="category" placeholder="Add Category"/><br>
        <input class="btn btn-primary" type="submit" name="submit"/><br>
    </form>
        <label for="name">Current Categories</label><br>

        <?php
        require 'conn.php';
        foreach ($db->query('SELECT * FROM categories') as $row)
        {
            echo ''.$row['category'].'<a href="edit.php?cat_id=' . trim($row['id']).'"> edit</a><br/>';

        }
        ?>


    </div>
    <div class="col-lg-6">

    <form action="roominsert.php" id="rooms" method="POST">
        <label for="room">Room</label>
        <input type="text" name="room" placeholder="Add Room"/><br>
        <input class="btn btn-primary" type="submit" name="submit"/><br>
    </form>
    <label for="name">Current Rooms</label><br>


        <?php

        foreach ($db->query('SELECT * FROM rooms') as $row)
        {
            echo ''.$row['room_name'].'<a href="edit.php?room_id=' . trim($row['id']).'"> edit</a><br/>';

        }
        ?>

    </div>
</div>


</body>
</html>