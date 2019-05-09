<?php
require_once('bootstrap.php');
$query = $_GET['search'];
$profileId = new User();
$User=$profileId->profileId($query);

 
?>
<!DOCTYPE html>
<?php foreach ($User as $u): ?>
<?php $img= $u['image'];
 
 if(isset($img)){
     $pherror = false;
 }
 else
 $pherror = true;
 ?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $u['fullname']; ?></title>
</head>
<body>
<?php include_once('includes/nav.inc.php')?>

<img src="<?php echo $u['image']; ?>" width='200px'>
<label><?php echo $u['fullname']; ?></label>

<h3>foto's</h3>

</body>
</html>
<?php endforeach;?>