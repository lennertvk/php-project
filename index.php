<?php
  require_once('like.php');
  require_once('ajax/like_add.php');

  $conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
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
    <h1>this is the homepage</h1>
    <a href="upload.php">upload een foto</a>
    <br>
    <a href="edit_profile.php">pas je profiel aan</a>

    <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='miniimages/".$row['image']."' >";
        echo "<p>".$row['text']."</p>";
        echo "<a href='#' data-id=" .  $row['id'] . " class='like' onclick='like_image(". $row['id'] .")'>Like</a> <span id='image_". $row['id'] ."_likes'>0</span> people like this ";
      echo "</div>";
    }
  ?>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script type="text/javascript" src="JS/like.js"></script>
</body>
</html>