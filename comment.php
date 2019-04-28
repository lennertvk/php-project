<?php
    require_once("bootstrap.php");
    $id = $_GET['id']; // komt uit url

    $conn = Db::getInstance();
    $statement = $conn->prepare("SELECT * FROM images WHERE id = :id");
    $statement->bindParam('id', $id);
    $result = $statement->execute();
    $result = $statement->fetch();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        echo "<img src='miniimages/".$result['image']."' >";
    ?>
</body>
</html>