<?php
require_once("../bootstrap.php");

$conn = Db::getInstance();


  if(isset($_POST['reported'])){
    $postid = $_POST['reportid'];

    $statement = $conn->prepare("SELECT * FROM images WHERE id = $postid");
    $result = $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC); 
    $n  = $result['reported'];

    $stmt = $conn->prepare("UPDATE images SET reported =$n + 1 WHERE id = $postid");
    $res = $stmt->execute();
    
    if($result['reported'] > 1){
        $statement2 = $conn->prepare("UPDATE images SET display = 0 WHERE id = $postid");
        $res2 = $statement2->execute();
    }
    
    /*********zorgen dat de afbeelding ook live verdwijnt*******/

    exit();
  }