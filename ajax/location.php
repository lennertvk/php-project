<?php

if(isset($_POST['location'])){
    $hoogte = $_POST['latitude'];
    $breedte = $_POST['longitude'];
    $city = $_POST['city'];

  $conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
 // $sql = "INSERT INTO test (latitude, longitude) VALUES ('$hoogte', '$breedte')";
  $sql = "INSERT INTO test (latitude, longitude, city) VALUES ('$hoogte', '$breedte', '$city')";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
  }