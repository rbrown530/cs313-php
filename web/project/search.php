<?php
include('conn.php');

$searchterm=$_POST['search'];

$stmt = $db->prepare('SELECT * FROM items WHERE item_name=:item ');
$stmt->bindValue(':item', $searchterm);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


foreach ($rows as $row)
{
    echo '<form action="content.php" method="post">'.
        '<input name="id" type="hidden" value="'.$row['id'].'"/>'.
        '<input name="book" type="hidden" value="'.$row['book'].'"/>'.
        '<input name="content" type="hidden" value="'.$row['content'].'"/>'.
        '<input name="chapter" type="hidden" value="'.$row['chapter'].'"/>'.
        '<input name="verse" type="hidden" value="'.$row['verse'].'"/>'.
        '<input type="submit" value="'.$row['book'].' '.$row['chapter'].':'.$row['verse'].'"/> ';
}