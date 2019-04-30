<?php
  require_once('bootstrap.php');
 // require_once('like.php');
  require_once('ajax/like_add.php');

  $conn = Db::getInstance();
  //$conn= new PDO("mysql:host=localhost;dbname=php-project;","root","root", null);
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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include_once('includes/nav.inc.php')?>

  <form action="search.php" method="get" class="search">
    <input type="text" name="search" placeholder="Search" />
    <input type="submit" value="Search" />
  </form>
    

    <h1>this is the homepage</h1>
    <a href="upload.php">upload een foto</a>
    <br>
    <a href="edit_profile.php">pas je profiel aan</a>
<div class="container">
    <?php
    foreach($result as $row) {
      echo "<div id='img_div'>";
      	echo "<img src='miniimages/".$row['image']."' >";
        echo "<p class='beschrijving'>".$row['text']."</p>";
        echo "<a href='#' data-id=" .  $row['id'] . " class='like' onclick='like_image(". $row['id'] .")'>Like</a> <span id='image_". $row['id'] ."_likes'>0</span> people like this ";
        echo "<a href='comment.php?id=" . $row['id'] . "'class='comment'>Comment</a>";
      echo "</div>";
    }
    
  ?>
</div>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script type="text/javascript" src="JS/like.js"></script>
</body>
</html>