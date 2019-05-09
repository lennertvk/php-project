<?php 
	include_once("bootstrap.php");
	
	$id = $_GET['id']; // komt uit url

    $conn = Db::getInstance();
    $statement = $conn->prepare("SELECT * FROM images WHERE id = :id");
    $statement->bindParam('id', $id);
    $result = $statement->execute();
    $result = $statement->fetch();

	//controleer of er een update wordt verzonden
	if(!empty($_POST))
	{
		try {
			$comment = new Comment();
            $comment->setText($_POST['comment']);
			$comment->Save();
		} catch (\Throwable $th) {
			//throw $th;
		}
	}
    $comments = Comment::getAll();
    
	
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>IMDBook</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript">

	</script>
</head>
<body>
<div>
	<div class="errors"></div>
		<?php 
            echo "<p>". $result['text'] ."</p>";
            echo "<img src='miniimages/".$result['image']."' >";
        ?>
	
	<form method="post" action="">
		
		<input type="text" placeholder="What's on your mind?" id="comment" name="comment" />
		<input id="btnSubmit" type="submit" value="Add comment" data-imgid="<?php echo $id ?>" />
		
		<ul id="listupdates">
		<?php 
			foreach($comments as $c) {
					echo "<li>". $c->getText() ."</li>";
			}
		?>
		</ul>
		</div>
	</form>	
</div>	

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script>
	$("#btnSubmit").on("click", function(e){
        var text = $("#comment").val();
        var id = $(this).data("imgid");
		
		$.ajax({
			method: "POST",
			url: "ajax/postcomment.php",
			data: { text: text, id: id },
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