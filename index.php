<?php

  $conn = mysqli_connect("mysql338.webhosting.be:3306", "ID280780_phpproject", "test1234", "ID280780_phpproject");
  $result = mysqli_query($conn, "SELECT * FROM images WHERE minified = 1");



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
<form action="search.php" method="get">
    <label>search</label>
    <input type="text" name="search" />
    <input type="submit" value="Search" />
    </form>

    <h1>this is the homepage</h1>
    <a href="upload.php">upload een foto</a>
    <br>
    <a href="edit_profile.php">pas je profiel aan</a>

    <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='miniimages/".$row['image']."' >";
      	echo "<p>".$row['text']."</p>";
      echo "</div>";
    }
  ?>
</body>
</html>