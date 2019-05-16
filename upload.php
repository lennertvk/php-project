<?php
require_once('bootstrap.php');
//require_once "classes/location.class.php";

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

//$conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
$conn = Db::getInstance();

  // Initialize message variable
  $msg = "";
	
  if (isset($_POST['upload'])) {

    // Get image name
		$image = $_FILES['image']['name'];
		
		// Get title
		$title = $_POST['title']; 
      
    // Get text
  	$desc = $_POST['desc'];

  	// image file directory
  	$target = "images/".basename($image);
  	$targetmini = "miniimages/mini".basename($image);

		//CURDATE EN CURTIME geven timestamp mee aan de upgeloade foto;
		$sql = "INSERT INTO images (image, text, datum, tijd, titel) VALUES ('$image', '$desc',CURDATE(), CURTIME(), '$title')";
		//$imagemininame = "mini" . $_FILES['image']['name']; 
		//$sqlmini = "INSERT INTO images (image, text, minified, datum,tijd) VALUES ('$imagemininame', '$desc', '1', CURDATE(), CURTIME())";
		
		
		// execute query
		$stmt = $conn->prepare($sql);
		$stmt->execute();

	//	$stmt = $conn->prepare($sqlmini);
		//$stmt->execute();

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
		}
	}

	//$result = mysqli_query($conn, "SELECT * FROM images");

	$result = $conn->prepare("SELECT * FROM images");
	$result = $result->execute();

    //$locaiton =  $_POST['location'];

  


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
   	width: 100%;
   	margin: 20px auto;
		border: 1px solid #fff;
		display: block;
		text-align: center;
   }
   form{
   	width: 100%;
		margin: 20px auto;
		display: inline-block;
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
   	width: 100%;
   	height: 140px;
	 }
	 textarea{
		 border: 1px solid #4CAF50;
		 border-radius: 10px;
		 outline: none;
		 width: 95%;
		font-size: 16px;
	 }
	 button{
		 width: 170px;
		 height: 40px;
		 background-color: #fff;
		 border: 3px solid #4CAF50;
		 border-radius: 40px;
		 font-size: 20px;
		 color: #4CAF50;
	 }
	 #cancel{
		 color: red;
		 text-decoration: none;
	 }
	 #title{
		 width: 95%;
		 border: 1px solid #4CAF50;
		 font-size: 23px;
		 margin-top: 5px;
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
		<input id="title"  type="text" name="title" placeholder= "A good title..."required>
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
  		<button type="submit" name="upload" onclick="getLocation()">POST</button>
  	</div>
  </form>
	<p id="demo"></p>

	<a href="index.php" id="cancel">cancel upload</a>
</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script src="javascript/getlocation.js"></script>
</body>
</html>