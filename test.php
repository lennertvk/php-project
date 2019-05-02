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
    /*
    if(isset($_POST['loadmore'])){
        var_dump($conn);
    }
    $statement = $conn->prepare("SELECT * FROM images WHERE minified = 1 LIMIT 2");
    $result = $statement->execute();  
    $result = $statement->fetchAll();

    foreach($result as $row) {
        echo "<div class='img_div'>";
      	echo "<img src='miniimages/".$row['image']."' >";
        echo "<p>".$row['text']."</p>";

        if(isset($_POST['liked'])){
            echo '<span><a href = "" class="unlike" id= "'.$row['id'].'">UNLIKE</a></span>';
        }elseif (isset($_POST['unliked'])) {
            echo '<span><a href = "" class="like"  id= "'.$row['id'].'">LIKE</a></span>';
        }else{

        $statement2 = $conn->prepare("SELECT COUNT(*) FROM likes WHERE user_id = 1 AND id_image =".$row['id']."");
        $result2 = $statement2->execute();  
        $result2 = $statement2->fetchColumn(); 
        var_dump($result2);
        
        if($result2 == 1){
            echo '<span><a href = "" class="unlike" id= "'.$row['id'].'">UNLIKE</a></span>';
        }else{
            echo '<span><a href = "" class="like"  id= "'.$row['id'].'">LIKE</a></span>';
        }
    }
        echo '<br>';

        echo '<span>Deze post heeft <span>'.$row['image_likes'].'</span> likes</span>';

        echo '<br>';

   //     var_dump($row);
        echo "</div>";
    }
    */
  ?>
    </div>
    <br>
    <span id="testloadmore"></span>
    <br>
    <button class="loadmore" id="loadmorebtn">Load more images</button>

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

        let start = 0;
        let limit = 2;

        function getData(){
            let ajax =  new XMLHttpRequest();
            ajax.open("GET", "Http.php?start=" + start + "&limit=" + limit, true);
            ajax.send();

            ajax.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    let data = JSON.parse(this.responseText);
                    let html = "";

                    for(let i = 0; i < data.length; i++){
                        html += "<p>";
                        html += data[i].text;
                        html += "</p>";
                        console.log(data);  
                    }
                   document.getElementById("testloadmore").innerHTML += html;
                   start = start + limit;
                }
            };
        };

        getData();

        $('#loadmorebtn').click(getData);
        

    });
</script>
  
</body>
</html>