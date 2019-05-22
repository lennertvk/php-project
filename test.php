<?php

$conn= new PDO("mysql:host=ID280780_phpproject.db.webhosting.be;dbname=ID280780_phpproject;","ID280780_phpproject","admin1234", null);
  $statement = $conn->prepare("SELECT * FROM images WHERE minified = 1");
  $result = $statement->execute();  
  $result = $statement->fetchAll();

  var_dump($result);