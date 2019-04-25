<?php
 // require_once('like.php');
  require_once('ajax/like_add.php');

  $conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
  $statement = $conn->prepare("SELECT * FROM images WHERE minified = 1");
  $result = $statement->execute();  
  $result = $statement->fetchAll();


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
    foreach($result as $row) {
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