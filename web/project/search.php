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
            <a class="navbar-brand" href="main.php">Inventory Manager</a>
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
    <div class="jumbotron">
        <h1>Search Results</h1>
    </div>
<div class="container">




<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('conn.php');

$searchterm = $_POST['search'];

$stmt = $db->prepare('SELECT * FROM items WHERE item_name LIKE :item');
$stmt->bindValue(':item', '%' . $searchterm . '%');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(!empty($rows)) {

    foreach ($rows as $row) {
        echo '<h1><a href="edititems.php?item_id=' . trim($row['id']).'"> ' . $row['item_name'] . '</a></h1>';
    }
}else
{
echo'no results';
}
?>
</div>
</body>
</html>
