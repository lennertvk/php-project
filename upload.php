<?php
function imagecreatefromfile( $filename ) {
	if (!file_exists($filename)) {
			throw new InvalidArgumentException('File "'.$filename.'" not found.');
	}
	switch ( strtolower( pathinfo( $filename, PATHINFO_EXTENSION ))) {
			case 'jpeg':
			case 'jpg':
					return imagecreatefromjpeg($filename);
			break;

			case 'png':
					return imagecreatefrompng($filename);
			break;

			case 'gif':
					return imagecreatefromgif($filename);
			break;

			default:
					throw new InvalidArgumentException('File "'.$filename.'" is not valid jpg, png or gif image.');
			break;
	}
}

// based on code : https://codewithawa.com/posts/image-upload-using-php-and-mysql-database

$conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);


  // Initialize message variable
  $msg = "";
	
  if (isset($_POST['upload'])) {

    // Get image name
  	$image = $_FILES['image']['name'];
      
    // Get text
  	$desc = $_POST['desc'];

  	// image file directory
  	$target = "images/".basename($image);
  	$targetmini = "miniimages/mini".basename($image);


		//CURDATE EN CURTIME geven timestamp mee aan de upgeloade foto;
		$sql = "INSERT INTO images (image, text, datum,tijd) VALUES ('$image', '$desc',CURDATE(), CURTIME())";
		$imagemininame = "mini" . $_FILES['image']['name']; 
		$sqlmini = "INSERT INTO images (image, text, minified) VALUES ('$imagemininame', '$desc', '1')";
		
		
		// execute query
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		$stmt = $conn->prepare($sqlmini);
		$stmt->execute();

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
		}

		//change image size -> komt van youtube video hoofdzakelijk
		
		$width = 600;
		$height = 600;

		list($width_orig, $height_orig) = getimagesize($target);

		$ratio_orig = $width_orig/$height_orig;

		if ($width/$height > $ratio_orig) {
			$width = $height*$ratio_orig;
	 } else {
			$height = $width/$ratio_orig;
	 }

	 	$image_p = imagecreatetruecolor($width, $height);
		$imagem = imagecreatefromfile($target);
		$miniimage = imagecopyresampled($image_p, $imagem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

		imagepng($image_p, $targetmini);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $targetmini)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
		}
	}

	//$result = mysqli_query($conn, "SELECT * FROM images");

	$result = $conn->prepare("SELECT * FROM images");
  $result = $result->execute();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search results</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
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
<?php include_once('includes/nav.inc.php')?>
<div id="content">

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
	<a href="index.php">back to the homepage</a>
</div>
</body>
</html>