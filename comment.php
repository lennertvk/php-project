<?php
    require_once("bootstrap.php");

    //comment class -> getAll
    $id = $_GET['id']; // komt uit url

    $conn = Db::getInstance();
    $statement = $conn->prepare("SELECT * FROM images WHERE id = :id");
    $statement->bindParam('id', $id);
    $result = $statement->execute();
    $result = $statement->fetch();

    //comment class -> setComment
    if(!empty($_POST)){
        try{
            $comment = new Comment();
            $comment->setText($_POST['comment']);
            $comment->Save();
        } catch (\Throwable $th) {

        }
    }
    $comments = Comment::getAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment</title>
</head>
<body>
    <div>
        <?php 
            echo "<p>". $result['text'] ."</p>";
            echo "<img src='miniimages/".$result['image']."' >";
        ?>
        <input type="text" placeholder="Leave a comment." id="commment" name="comment"/>
        <input id="btnSubmit" type="submit" value="Add comment" />

        <ul id="listupdates">
            <?php
                foreach($comment as $c) {
                    echo "<li>" . $c->getText() ."</li>";
                }
            ?>
        </ul>
    </div>

    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <script>
	$("#btnSubmit").on("click", function(e){
		var text = $("#comment").val();
		
		$.ajax({
			method: "POST",
			url: "ajax/postcomment.php",
			data: { text: text },
			dataType: 'json',
		})
		.done(function( res ) {
			if( res.status == 'success'){
				var li = "<li style='display:none;'>" + text + "</li>";
				$("#listupdates").append(li);
				$("#comment").val("").focus();
				$("#listupdates li").last().slideDown();
			}
		});
		
		e.preventDefault();
	});
</script>
</body>
</html>