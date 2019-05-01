<?php

 $conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);

 if(isset($_POST['liked'])){
    $postid = $_POST['postid'];
    $statement = $conn->prepare("SELECT * FROM images WHERE id = $postid");
    $result = $statement->execute();
    $result = $statement->fetchAll(); 
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
    $result = $statement->fetchAll(); 
    $n = $result['image_likes'];
    
    $stmt2 = $conn->prepare("DELETE FROM likes WHERE id_image = $postid AND user_id = 1");
    $res2 = $stmt2->execute();

    $stmt = $conn->prepare("UPDATE images SET image_likes=($n - 1)+1 WHERE id = $postid");
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
    <title>like test</title>
</head>
<body>
    <div class="content">
    <?php
    $statement = $conn->prepare("SELECT * FROM images WHERE minified = 1");
    $result = $statement->execute();  
    $result = $statement->fetchAll();

        foreach($result as $row) {
        echo "<div class='img_div'>";
      	echo "<img src='miniimages/".$row['image']."' >";
        echo "<p>".$row['text']."</p>";

        $statement2 = $conn->prepare("SELECT COUNT(*) FROM likes WHERE user_id = 1 AND id_image =".$row['id']."");
        $result2 = $statement2->execute();  
        $result2 = $statement2->fetchColumn(); 
        
        
        if($result2 == 1){
            echo '<span><a href = "" class="unlike" id= "'.$row['id'].'">UNLIKE</a></span>';
        }else{
            echo '<span><a href = "" class="like"  id= "'.$row['id'].'">LIKE</a></span>';
        }
        
        echo '<br>';

        echo '<span>Deze post heeft <span>'.$row['image_likes'].'</span> likes</span>';

        echo '<br>';

   //     var_dump($row);
        echo "</div>";
    }
    
  ?>
    </div>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){

        /////LIKE
        $('.like').click(function(){
            let postid = $(this).attr('id');

            $.ajax({
                url: 'test.php',
                type: 'post',
                async: 'false',
                data: {
                    'liked': 1,
                    'postid': postid
                },
                succes: function(){}
            });
        });
        /////unlike

        $('.unlike').click(function(){
            let postid = $(this).attr('id');

            $.ajax({
                url: 'test.php',
                type: 'post',
                async: 'false',
                data: {
                    'unliked': 1,
                    'postid': postid
                },
                succes: function(){}
            });
        });



    });
</script>
  
</body>
</html>