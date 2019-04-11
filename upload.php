<?php
// based on code : https://codewithawa.com/posts/image-upload-using-php-and-mysql-database

  $conn = mysqli_connect("mysql338.webhosting.be:3306", "ID280780_phpproject", "test1234", "ID280780_phpproject");

  // Initialize message variable
  $msg = "";
	
  if (isset($_POST['upload'])) {

    // Get image name
  	$image = $_FILES['image']['name'];
      
    // Get text
  	$desc = mysqli_real_escape_string($conn, $_POST['desc']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, text) VALUES ('$image', '$desc')";
  	// execute query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
	}

  $result = mysqli_query($conn, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['text']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="upload.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image" required>
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="desc" 
      	placeholder="Say something about this image..."
				required></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>

<!-- this is how i tried
    <?php
/*
	require_once("classes\images.class.php");

	  if(!empty($_POST)){
/*
            $image = new Image();
            $image->setImage($_POST['image']);
            $image->setText($_POST['text']);

            $imageee = $_POST['image'];
            $text = $_POST['text'];
           
           // var_dump($image);
            $result = $image->register();

            */
/*
            var_dump($_POST['image']);
		}
	

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>image upload</title>
</head>

<body>
	<div class="netflixLogin netflixLogin--register">
		<div class="form form--login">
			<form action="" method="post">
				<h2 form__title>Upload image</h2>

                <div class="form__field">
					<label for="image">image</label>
					<input type="file" id="image" name="image">
				</div>
                <br>

				<div class="form__field">
					<label for="text">text</label>
					<input type="text" id="text" name="text">
				</div>

				<div class="form__field">
					<input type="submit" value="upload" class="btn btn--primary">	
				</div>
			</form>
		</div>
	</div>
</body>
</html>