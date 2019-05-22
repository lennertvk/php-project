<?php
require_once "classes/location.class.php";
require_once "classes/upload.class.php";
require_once "classes/Checksession.class.php";
require_once('bootstrap.php');

session_start();
$sessionemail = $_SESSION["email"];
$checkSession = new CheckingSession();
$isSession = $checkSession->checkSession($sessionemail);


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

  // Initialize message variable
  $msg = "";
	$userid = $_SESSION['userid'];
		//var_dump($userid);
  if (isset($_POST['upload'])) {
		
    // Get image name
		$image = $_FILES['image']['name'];
		$imagemininame = "mini" . $_FILES['image']['name']; 
		
		// Get text
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$place = $_POST['location'];
		$filter = $_POST["selectFi"];
		

		$upload = new Upload();
		$upload->setUserid($userid);
		$upload->setTitle($title);
		$upload->setImage($image);
		$upload->setDesc($desc);
		$upload->setImagemini($imagemininame);
		$upload->setLocation($place);
		$upload->setFilter($filter);
		$resultUploadBig = $upload->uploadBig();
		$resultUploadSmall = $upload->uploadSmall();
		
  	// image file directory
  	$target = "images/".basename($image);
  	$targetmini = "miniimages/mini".basename($image);

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
		header("Location: index.php");
	}


?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search results</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/cssgram.min.css">
<title>Image Upload</title>
</head>
<body>
<script type="text/javascript">
  function upload_img(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#output').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
	}
</script>
 <script>
            function filterGo(d1) {
                var d1 = document.getElementById(d1);
                var output = document.getElementById('output');

                if(d1.value == '_1997'){
                    output.className='_1997';
                }else if(d1.value == 'aden'){
                    output.className='aden';
                }else if(d1.value == 'brannan'){
                    output.className='brannan';
                }else if(d1.value == 'brooklyn'){
                    output.className='brooklyn';
                }else if(d1.value == 'clarendon'){
                    output.className='clarendon';
                }else if(d1.value == 'earlybird'){
                    output.className='earlybird';
                }else if(d1.value == 'gingham'){
                    output.className='gingham';
                }else if(d1.value == 'hudson'){
                    output.className='hudson';
                }else if(d1.value == 'inkwell'){
                    output.className='inkwell';
                }else if(d1.value == 'kelvin'){
                    output.className='kelvin';
                }else if(d1.value == 'lark'){
                    output.className='lark';
                }else if(d1.value == 'lofi'){
                    output.className='lofi';
                }else if(d1.value == 'maven'){
                    output.className='maven';
                }else if(d1.value == 'mayfair'){
                    output.className='mayfair';
                }else if(d1.value == 'moon'){
                    output.className='moon';
                }else if(d1.value == 'nashville'){
                    output.className='nashville';
                }else if(d1.value == 'perpetua'){
                    output.className='perpetua';
                }else if(d1.value == 'reyes'){
                    output.className='reyes';
                }else if(d1.value == 'rise'){
                    output.className='rise';
                }else if(d1.value == 'slumber'){
                    output.className='slumber';
                }else if(d1.value == 'stinson'){
                    output.className='stinson';
                }else if(d1.value == 'toaster'){
                    output.className='toaster';
                }else if(d1.value == 'valencia'){
                    output.className='valencia';
                }else if(d1.value == 'walden'){
                    output.className='walden';
                }else if(d1.value == 'willow'){
                    output.className='willow';
                }else if(d1.value == 'xpro2'){
                    output.className='xpro2';
                }else{
                    output.className='';
                }
            }
        </script>
<?php include_once('includes/nav.inc.php')?>
<div id="content">

  <form method="POST" action="upload.php" enctype="multipart/form-data">
  	<!--<input type="hidden" name="size" value="1000000">-->
  	<div>
  	  <input type="file" id ="imgInp" name="image" onchange="upload_img(this);" required>
			<figure class="">
				<img id="output" src="#" alt="your image" width="450px" height="auto" />
			</figure>
		</div>
		<div>
		<select id="selectFi" name="selectFi" onchange="filterGo(this.id)" required>
 						<div id="content">
                            <option value="0">Select Filter:</option>
                            <option value="_1997">1977</option>
                            <option value="aden">Aden</option>
                            <option value="brannan">Brannan</option>
                            <option value="brooklyn">Brooklyn</option>
                            <option value="clarendon">Clarendon</option>
                            <option value="earlybird">Earlybird</option>
                            <option value="gingham">Gingham</option>
                            <option value="hudson">Hudson</option>
                            <option value="inkwell">Inkwell</option>
                            <option value="kelvin">Kelvin</option>
                            <option value="lark">Lark</option>
                            <option value="lofi">Lofi</option>
                            <option value="maven">Maven</option>
                            <option value="mayfair">Mayfair</option>
                            <option value="moon">Moon</option>
                            <option value="nashville">Nashville</option>
                            <option value="perpetua">Perpetua</option>
                            <option value="reyes">Reyes</option>
                            <option value="rise">Rise</option>
                            <option value="slumber">Slumber</option>
                            <option value="stinson">Stinson</option>
                            <option value="toaster">Toaster</option>
                            <option value="valencia">Valencia</option>
                            <option value="walden">Walden</option>
                            <option value="willow">Willow</option>
                            <option value="xpro2">Xpro2</option>
						</div>
					</select>
		</div>
		<div>
		<input id="title"  type="text" name="title" placeholder= "A good title..."required>
		</div>
  	<div>
      <textarea 
      	id="uploadtext" 
      	cols="40" 
      	rows="4" 
      	name="desc" 
      	placeholder="Say something about this image..."
				required></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload" class="button">POST</button>
  	</div>
		<div class="hide">
	 		<input type="text" name="location" id="location">
		</div>
  </form>
	<p id="demo"></p>

	<a href="index.php" class="cancel">back to the homepage</a>
</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script src="javascript/getlocation.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script
</body>
</html>