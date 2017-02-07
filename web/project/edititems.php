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
            <li><a href="manage.php">Manage</a></li>
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
    <h1>Edit Items</h1>
    <form action="itemsupdate.php" id="items" method="POST">
        <?php
        require 'conn.php';

$id = $_GET['item_id'];
$stmt = $db->prepare('SELECT * FROM items WHERE items.id=:id ');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);



        foreach($rows as $row)
        {
            echo '<label for="item">Item</label>
        <input type="text" name="item" value="'.$row['item_name'].'"/><br>
        <input type="hidden" name="id" value="'.$row['id'].'"/><br>
        <label for="qty">Quantity</label>
        <input type="text" name="qty" value="'.$row['qty'].'"/><br>
        <br>
        <label for="name">Category</label><br>
        <select name="category">';
            foreach ($db->query('SELECT * FROM categories') as $rowcat)
            {
                if($row['category_id'] == $rowcat['id']){
                    echo '<option selected="selected"  value="'.$rowcat['id'].'" > '.$rowcat['category'].'<br/>';

                }else{

                    echo '<option value="'.$rowcat['id'].'" > '.$rowcat['category'].'<br/>';

                }

            }
            echo '</select><br>';

            echo '        <label for="name">Rooms</label><br><select class="form-control" name="room">';
            foreach ($db->query('SELECT * FROM rooms') as $rowroom)
            {
                if($row['room_id'] == $rowroom['id']){
                    echo '<option selected="selected"  value="'.$rowroom['id'].'" > '.$rowroom['room_name'].'<br/>';

                }else{

                    echo '<option value="'.$rowroom['id'].'" > '.$rowroom['room_name'].'<br/>';

                }

            }
            echo '</select><br>';
        }
        ?>

        <input class="btn btn-primary" type="submit" name="submit"/>
    </form>
</div>


</body>
</html>