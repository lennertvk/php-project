<?php
require_once("../bootstrap.php");
session_start();

$conn = Db::getInstance();


  if(isset($_POST['reported'])){
    $postid = (int)$_POST['reportid'];
    $email = $_SESSION["email"];

    $statement = $conn->prepare("SELECT * FROM users WHERE email = '$email'");
    $result = $statement->execute();
    $id = $statement->fetchAll();

    $id_user = $id[0]['id'];

    $statement3 = $conn->prepare("SELECT * FROM reported_images WHERE image_id = '$postid' AND user_id = '$id_user'");
    $result = $statement3->execute();
    $result = $statement3->fetchAll();

    if(empty($result)){
      $statement2 = $conn->prepare("INSERT INTO reported_images (image_id, user_id) VALUES ($postid, $id_user)");
      $result2 = $statement2->execute();
    }

    $statement4 = $conn->prepare("SELECT COUNT(*) FROM reported_images WHERE image_id = '$postid'");
    $result3 = $statement4->execute();
    $result3 = $statement4->fetchAll();
    $amountofreports = (int)$result3[0][0];

    if($amountofreports > 2){
      $statement2 = $conn->prepare("UPDATE images SET display = 0 WHERE id = $postid");
      $res2 = $statement2->execute();
    }
    /*
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