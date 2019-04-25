<?php
    $id = $_GET[id]; // komt uit url

    $conn= new PDO('mysql:host=localhost; dbname=amuser', 'root', 'root', null);
    $statement = $conn->prepare("SELECT * FROM `posts` WHERE `id` = :id");
    $statement->bindParam('id', $id);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>