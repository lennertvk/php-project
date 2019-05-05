<?php
    require_once('bootstrap.php');
    $conn = Db::getInstance();
    $search = new Post();
    $searchResult=$search->search();
    
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search results</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include_once('includes/nav.inc.php')?>
<h2>results</h2>
<?php
    foreach($searchResult as $key):
?>
<div>
<?php 
    echo "<img src='miniimages/".$key['image']."'width='250px'>";
?>
<a href="search.details.php?search=<?php echo $key['id'];?>"><?php echo $key['text']; ?></a>
</div>
<?php endforeach; ?>
</body>
</html>