<?php
    require_once('bootstrap.php');
    $query = $_GET['search'];
    $search = new Post();
    $searchResult=$search->search($query);
   
    
    var_dump($searchResult);
    
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
    <link rel="stylesheet" href="css/cssgram.min.css">
</head>
<body>
<?php include_once('includes/nav.inc.php')?>
<h2>results</h2>
<?php
    foreach($searchResult as $key):
    
?>
<div>
<?php 
    echo "<figure class='".$key['filter']."'>";
    echo "<img src='miniimages/".$key['image']."'width='250px'>";
    echo "</figure>";
?>
<a href="search.details.php?search=<?php echo $key['id'];?>"><?php echo $key['titel']; ?></a>
</div>
<?php endforeach; ?>

</body>
</html>