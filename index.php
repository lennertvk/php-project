<?php
require_once('bootstrap.php');
 // require_once('like.php');
  require_once 'classes/Checksession.class.php';
  session_start();
  //checken of session actief is
  $sessionemail = $_SESSION["email"];
  $checkSession = new CheckingSession();
  $isSession = $checkSession->checkSession($sessionemail);

  //var_dump($sessionemail);
  //session Id zoeken
  $id = new CheckingSession();
  $idResult = $id->searchId($sessionemail);
 
  foreach ($idResult as $i):
    //var_dump($i['id']);
    $_SESSION['userid'] =  $i['id'];
    endforeach;

  
  $conn = Db::getInstance();
  //$conn= new PDO("mysql:host=localhost;dbname=php-project;","root","root", null);
  $statement = $conn->prepare("SELECT * FROM images WHERE minified = 1");
  $result = $statement->execute();  
  $result = $statement->fetchAll();


  if(isset($_POST['liked'])){
    $postid = $_POST['postid'];
    $statement = $conn->prepare("SELECT * FROM images WHERE id = $postid");
    $result = $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC); 
    $n  = $result['image_likes'];
    $stmt = $conn->prepare("UPDATE images SET image_likes=$n + 1 WHERE id = $postid");
    $res = $stmt->execute();
    

    $stmt2 = $conn->prepare("INSERT INTO likes(user_id, id_image) VALUES(1, $postid)");
    $res2 = $stmt2->execute();
    exit();
 }

 if(isset($_POST['unliked'])){
  $postid = $_POST['postid'];
  $statement = $conn->prepare("SELECT * FROM images WHERE id = $postid");
  $result = $statement->execute();
  $result = $statement->fetch(PDO::FETCH_ASSOC); 
  $n = $result['image_likes'];
  var_dump($n);
  $stmt2 = $conn->prepare("DELETE FROM likes WHERE id_image = $postid AND user_id = 1");
  $res2 = $stmt2->execute();

  $stmt = $conn->prepare("UPDATE images SET image_likes=($n - 1) WHERE id = $postid");
  $res = $stmt->execute();
  
  exit();
}

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
    <link rel="stylesheet" href="css/cssgram.min.css">
</head>
<body>
  <?php include_once('includes/nav.inc.php')?>

  <form action="search.php" method="get" class="search">
    <input type="text" name="search" placeholder="Search" />
    <input type="submit" value="Search" />
  </form>
    
    <h1>this is the homepage</h1>
<div class="container">
    <span id="testloadmore"></span>
</div>
    <br>
    <button class="loadmore" id="loadmorebtn">Load more images</button>
    
      
</body>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script src="javascript/loadmore.js"></script>

<script src="javascript/like.js"></script>

<script src="javascript/inappropriate.js"></script>

<script>

let likeclick = function(e){
    let id = e.id + "id";
    let amlikes = document.getElementById(id).innerHTML;
    document.getElementById(id).innerHTML = parseInt(amlikes) + 1;

    e.classList.remove("like");
    e.classList.add("unlike");
 
   console.log('klik like');
    e.setAttribute( "onClick", "javascript: unlikeclick(this);" );
    e.innerHTML = "unlike";

    console.log(e);
    //AJAX CALL HIERIN ZETTEN???
}

let unlikeclick = function(e){
    let id = e.id + "id";
    console.log(e);
    console.log("klik unlike");
    let amlikes = document.getElementById(id).innerHTML;
    
    document.getElementById(id).innerHTML = parseInt(amlikes) - 1;
    e.classList.remove("unlike");
    e.classList.add("like");
    e.setAttribute( "onClick", "javascript: likeclick(this);" );

    e.innerHTML = "like";
    //AJAX CALL HIERIN ZETTEN???

}
</script>
</html>