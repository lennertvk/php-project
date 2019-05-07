<?php
 require_once('bootstrap.php');
 $query = $_GET['search'];
 $conn = Db::getInstance();
 $statement= $conn->prepare("SELECT * FROM images Where id like :query");
 $statement->bindValue(":query",'%'.$query.'%',PDO::PARAM_STR);
 $statement->execute();
 $searchResult = $statement -> fetchAll();
 
?>
<?php foreach ($searchResult as $key): ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $key['text']; ?></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include_once('includes/nav.inc.php')?>
<h2><?php echo $key['text']; ?></h2>
<div>
<?php 
    echo "<img src='miniimages/".$key['image']."'width='450px'>";
   echo $key['text'];
?>
</div>
</body>
</html>
<?php endforeach;?>