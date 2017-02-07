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
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</nav>
<div class="container">

    <?php
    if(isset($_GET['room_id'])) {
        $id = $_GET['room_id'];
        $stmt = $db->prepare('SELECT * FROM rooms WHERE rooms.id=:room_id ');
        $stmt->bindValue(':room_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
            echo'<form action="updateroom.php" method="POST">';
            echo '<input type="text" name="room" value="'.$row['room_name'].'"/><br>';
            echo '<input type="hidden" name="id" value="'.$row['id'].'"/>';
            echo '<input class="btn btn-primary" type="submit" name="submit" value="submit"/>';
            echo '</form>';
    }
    }elseif(isset($_GET['cat_id'])){
        $id = $_GET['cat_id'];
        $stmt = $db->prepare('SELECT * FROM categories WHERE categories.id=:cat_id ');
        $stmt->bindValue(':cat_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
            echo'<form action="updatecat.php" method="POST">';
            echo '<input type="text" name="category" value="'.$row['category'].'"/><br>';
            echo '<input type="hidden" name="id" value="'.$row['id'].'"/>';
            echo '<input class="btn btn-primary" type="submit" name="submit" value="submit"/>';

            echo '</form>';
        }
    }else {
        echo " why are You HerE?";
    }


    ?>

</div>
</body>
