<?php
    echo 'test';
    function image_exists($image_id){
        $image_id = (int)$image_id;
        $conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
        $result = mysqli_query($conn, "SELECT count(*) FROM images WHERE id = $image_id");
        $row = mysqli_fetch_array($result);    
        if($row == true){
            return true;
        }else{
            return false;
        }
    }

    function previously_liked($image_id){
        $image_id = (int)$image_id;
        $conn = mysqli_connect("mysql338.webhosting.be:3306", "ID280780_phpproject", "test1234", "ID280780_phpproject");
        $result = mysqli_query($conn, "SELECT COUNT(id) FROM likes WHERE user_id = 1234 AND id_image = $image_id");
        $row = mysqli_fetch_array($result);    
        
        if($row[0] === true){
            return false;
        }else{
            return true;
        }
    }

    function like_count($image_id){
        $image_id = (int)$image_id;
        $conn = mysqli_connect("mysql338.webhosting.be:3306", "ID280780_phpproject", "test1234", "ID280780_phpproject");
        $result = mysqli_query($conn, "SELECT image_likes FROM images WHERE id = $image_id");
        $row = mysqli_fetch_array($result);    
        return $row['image_likes'];
    }

    function add_like($image_id){
        $image_id = (int)$image_id;
        $conn = mysqli_connect("mysql338.webhosting.be:3306", "ID280780_phpproject", "test1234", "ID280780_phpproject");
        $resultupdate = mysqli_query($conn, "UPDATE images SET image_likes = image_likes + 1 WHERE id = $image_id");
        $resultinsert = mysqli_query($conn, "INSERT INTO likes (user_id, id_image) VALUES (0000 , $image_id)");
    }
?>