<?php

  $conn = mysqli_connect("mysql338.webhosting.be:3306", "ID280780_phpproject", "test1234", "ID280780_phpproject");
  $result = mysqli_query($conn, "SELECT * FROM images");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>
<body>
    <h1>this is the homepage</h1>
    <a href="upload.php">upload een foto</a>
    <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['text']."</p>";
      echo "</div>";
    }
  ?>
</body>
</html>