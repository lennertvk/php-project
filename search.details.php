<?php
 require_once('bootstrap.php');
 $query = $_GET['search'];
 $photoId = new Post();
 $photoId = $photoId->photoId($query);
?>
<?php foreach ($photoId as $key): ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $key['titel']; ?></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include_once('includes/nav.inc.php')?>
<h2><?php echo $key['titel']; ?></h2>
<div>
<?php 
    echo "<img src='miniimages/".$key['image']."'width='450px'>";
    echo "<br>";
    echo "<label>gepost op: ".$key['datum']." ".$key['tijd']."</label>";
    echo "<br>";
    echo $key['text'];
?>
</div>
</body>
</html>
<?php endforeach;?>