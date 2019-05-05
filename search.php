<?php
    
    require_once('bootstrap.php');
    $conn = Db::getInstance();
    $search = new Post();
    $searchResult=$search->search();
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h2>Resultaten</h2>
<?php
    foreach($searchResult as $key):
?>
<div>
<?php 
    echo "<img src='miniimages/".$key['image']."'width='150px'>";
?>
<a href="search.detail.php?search=<?php echo $key['id'];?>"><?php echo $key['text']; ?></a>
</div>
<?php endforeach; ?>
</body>
</html>